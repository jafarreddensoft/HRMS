<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\LoginAuthentication;
use App\Models\EmployeeSettingMaster;
use App\Models\SetOTP;
use App\Models\Employeedetail;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Leave;
use App\Models\AttendanceSetting;
use App\Models\AttendanceShift;
use App\Models\AttendanceRoster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Mail;



class CompanyController extends Controller
{
    public function signup(Request $req){
        $prev_reg_details = Company::where('email',$req->email)->first();

        if ($prev_reg_details) {
            $success        = 'warning';
            $messages       = 'This email already exists. Please try a new one.';
            $emailStatus    = '';
            
        } else {

            $alphabet   = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass       = array();
            $alphaLength= strlen($alphabet) - 1;
            for ($i = 0; $i < 8; $i++) {
                $n      = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            $verifcationtoken   = implode($pass);

            $registration                       = new Company;
            $registration->uname                = $req->uname;
            $registration->orgname              = $req->orgname;
            $registration->email                = $req->email;
            $registration->phone                = $req->phone;
            $registration->country              = $req->country;
            $registration->timezone             = $req->timezone;
            $registration->dateformat           = $req->dateformat;
            $registration->verifcationtoken     = $verifcationtoken;
            $registration->verificationstatus   = 'no';
            $registration->status               = 'A';
            $registration->ip_address           = $req->ipAddress;
            $registration->session              = '';
            $insertedData                       = $registration->save();

            if($insertedData){
                //authentication

                $loginAuth              = new LoginAuthentication;
                $loginAuth->company_id  = $registration->_id;
                $loginAuth->uname       = $req->uname;
                $loginAuth->email       = $req->email;
                $loginAuth->password    = $req->password;
                $loginAuth->status      = 'A';
                $loginAuth->session     = '';
                $loginAuth->ip_address  = $req->ipAddress;
                $loginAuth->save();

                //email
                $data       = array('name'=>$req->uname,'password'=>$verifcationtoken);
                $tomail     = $req->email;
                $adminmail  = 'kuntal.dev@reddensoft.com';
                $from_mail  = env('MAIL_FROM_ADDRESS');
                $fname      = $req->uname;

                $mail = Mail::send('email_templates.sendwelcomeuser', $data, function ($message) use ($tomail,$fname){
                    $message->from(env('MAIL_FROM_ADDRESS'), $name = 'Reddensoft Employee Portal');
                    $message->subject("Welcome to HRMS", $name = $fname);
                    $message->to($tomail, $name);
                });

                $success    = 'success';
                $messages   = 'Your sign-up was successful. Please verify your email to continue';
                $emailStatus= $mail;
            } else {
                $success    = 'failed';
                $messages   = 'Somthing went wrong';
                $emailStatus= 'failed';
            }
        }
        $this->departmentAndDesignationData($registration->_id,$req->ipAddress);
        $this->leaveData($registration->_id,$req->ipAddress);

        $response = [
            'success'       => $success,
            'message'       => $messages,
            'emailStatus'   => ($emailStatus)? $emailStatus:''
        ];

        return response()->json($response);
    }

    public function signin(Request $req){
        $emailCompanyCheck  = '';
        $emailEmployeeCheck = '';
        $emailCheck         = LoginAuthentication::where('email',$req->email)->first();
        
        if (!$emailCheck ) {
            $msg        = 'This email does not exist. Please try another one.';
            $success    = 'danger';
            $type       =  '1';
        } else {

            //$userDetails= LoginAuthentication::where('company_id',$emailCheck->_id)->first();
            $password   = $emailCheck->password;
            //$password   = $userDetails->password;
            
            if($emailCheck->type == 'user'){
                $emailEmployeeCheck = Employeedetail::where('email',$req->email)->first();
                $type= 'user';
            } else {
                $emailCompanyCheck = Company::where('email',$req->email)->first();
                $type= 'company';
            }

            if ($password == $req->password) {
                $msg        = 'Your have successfully signed in';
                $success    = 'success';
            } else {
                $msg        = 'Password does not match!';
                $success    = 'danger';
            }
            
        }

        $response = [
            'success' => $success,
            'message' => $msg,
            'companyDetails' => ($emailCompanyCheck)?$emailCompanyCheck:'',
            'employeeDetails' => ($emailEmployeeCheck)?$emailEmployeeCheck:'',
            'type' => $type
        ];

        return response()->json($response);
    }

    public function check_email(Request $req){
        $emailCheck = Company::where('email',$req->email)->first();
        if (!$emailCheck) {
            $msg        = 'This email does not exist. Please try another one.';
            $success    = 'danger';
        } else {
            $otp        = rand(000000,999999);
            $data       = array('email'=>$req->email,'otp'=>$otp);
            $tomail     = $req->email;
            $adminmail  = 'kuntal.dev@reddensoft.com';
            $from_mail  = env('MAIL_FROM_ADDRESS');
            $fname      = $emailCheck->uname;

            $mail = Mail::send('email_templates.sendotptouser', $data, function ($message) use ($tomail,$fname){
                $message->from(env('MAIL_FROM_ADDRESS'), $name = 'Reddensoft Employee Portal');
                $message->subject("Welcome to HRMS", $name = $fname);
                $message->to($tomail, $name);
            });

            $sendOTP                       = new SetOTP;
            $sendOTP->email                = $req->email;
            $sendOTP->otp                  = $otp;
            $sendOTP->status               = 'A';
            $sendOTP->ip_address           = $req->ipAddress;
            $sendOTP->session              = '';
            $insertedOTPData               = $sendOTP->save();

            if($insertedOTPData){
                $msg        = 'OTP Sent Successfully to your email inbox';
                $success    = 'success';
            } else {
                $msg        = 'Someting went wrong';
                $success    = 'danger';
            }
        }

        $response = [
            'success' => $success,
            'message' => $msg,
            // 'details' => $prev_reg_details->_id
        ];

        return response()->json($response);
    }

    public function verifymail(Request $req){
        $prev_reg_details = Company::where(['verifcationtoken'=>$req->token,'verificationstatus'=>'no'])->first();
        // dd('test');
        if ($prev_reg_details) {
            $updateverificationstatus = Company::where(['verifcationtoken'=>$req->token,'verificationstatus'=>'no'])->update([
                'verificationstatus' => 'yes',
             ]);
             $success = 'success';
             $msg = 'Email verified successfully.';

        }
        else
        {
            $success = 'success';
            $msg = 'Email verified successfully.';
        }

        $response = [
            'success' => $success,
            'message' => $msg,
        ];

        return response()->json($response);
    }

    public function otp_change_password(Request $req){

        $emailCheck = SetOTP::where('email',$req->email)->orderBy('_id', 'desc')->first();
        if (!$emailCheck) {

            $msg        = 'This email does not exist. Please try again.';
            $success    = 'danger';
        } else {
            if($req->otp === $emailCheck->otp){
                //$emailCheck = SetOTP::where('email',$req->email)->order_by('email', 'desc')->first();

                $updatePassword = LoginAuthentication::where(['email'=>$req->email])->update([
                    'password' => $req->confirmPassword,
                 ]);

                if($updatePassword){
                    $msg        = 'Password Change Successfully';
                    $success    = 'success';
                } else {
                    $msg        = 'Someting went wrong';
                    $success    = 'danger';
                }
            } else {
                $msg        = 'OTP not match';
                $success    = 'danger';
            }
        }

        $response = [
            'success' => $success,
            'message' => $msg,
            'message2' => $req->otp,
            'message3' => $emailCheck->otp,
            // 'details' => $prev_reg_details->_id
        ];

        return response()->json($response);
    }

    public function addemployeemasterdetails(Request $req){
        $checkprev = EmployeeSettingMaster::where('companyid', $req->company_id)->first();

        if ($checkprev) {
            $updateemp = EmployeeSettingMaster::where('companyid', $req->company_id)->update([
                'addempdeatils' => $req->info,
            ]);
            // $message = 'Details updated successfully';
        } else {
            $addemp = new EmployeeSettingMaster;
            $addemp->addempdeatils = $req->info;
            $addemp->companyid = $req->company_id;
            $addemp->save();
        }

        $newempdata = EmployeeSettingMaster::where('companyid', $req->company_id)->first();
        $response = [
            'success' => 'success',
            'newempdata' => $newempdata,
            'message' => $req->message
        ];
        return response()->json($response);
    }

    public function fetchemployeemasterdetails(Request $req){
        $empdata = EmployeeSettingMaster::where('companyid', $req->company_id)->first();
        if ($empdata) {
            $formdetails = $empdata->addempdeatils;
        } else {
            $formdetails = false;
        }
        $response = [
            'success' => 'success',
            'formdetails' => $formdetails,
        ];
        return response()->json($response);
    }

    public function addempdetails(Request $req){
        $prev_reg_details = Employeedetail::where('email',$req->email)->first();

        if ($prev_reg_details) {
            $success        = 'warning';
            $messages       = 'This email already exists. Please try a new one.';
            
        } else {

            $addemp                     = new Employeedetail;
            $addemp->fname              = $req->fname;
            $addemp->lname              = $req->lname;
            $addemp->email              = $req->email;
            $addemp->gender             = $req->gender;
            $addemp->dob                = $req->dob;
            $addemp->country            = $req->country;
            $addemp->married            = $req->married;
            $addemp->empid              = $req->empid;
            $addemp->doj                = $req->doj;
            $addemp->jobtitle           = $req->jobtitle;
            $addemp->dept               = $req->dept;
            $addemp->reporting_manager  = $req->reporting_manager;
            $addemp->gross_salary       = $req->gross_salary;
            $addemp->acc_number         = $req->acc_number;
            $addemp->pan                = $req->pan;
            // $addemp->benifitdoc         = $req->benifitdoc;
            $imagePath = public_path('media/benifitDocument');
            if(!empty($req->file('benifitdoc'))){                        
                $file                   = $req->file('benifitdoc');
                $benifitdoc             = time().$file->getClientOriginalName();
                $file->move($imagePath, $benifitdoc);
                $addemp->benifitdoc     = $benifitdoc;
            }

            $addemp->edu_level          = $req->edu_level;
            $addemp->edu_institue       = $req->edu_institue;
            // $addemp->edu_certificate    = $req->edu_certificate;
            $imagePath = public_path('media/educationCertificate');
            if(!empty($req->file('edu_certificate'))){                        
                $file                   = $req->file('edu_certificate');
                $edu_certificate        = time().$file->getClientOriginalName();
                $file->move($imagePath, $edu_certificate);
                $addemp->edu_certificate= $edu_certificate;
            }

            $addemp->prev_employer      = $req->prev_employer;
            $addemp->emp_skills         = $req->emp_skills;
            // $addemp->experience_certificate = $req->experience_certificate;

            $imagePath = public_path('media/experienceCertificate');
            if(!empty($req->file('experience_certificate'))){                        
                $file                   = $req->file('experience_certificate');
                $experience_certificate = time().$file->getClientOriginalName();
                $file->move($imagePath, $experience_certificate);
                $addemp->experience_certificate = $experience_certificate;
            }
            $addemp->jobexperience      = $req->jobexperience;
            $imagePath = public_path('media/cv');
            if(!empty($req->file('emp_cv'))){                        
                $file                   = $req->file('emp_cv');
                $emp_cv                 = time().$file->getClientOriginalName();
                $file->move($imagePath, $emp_cv);
                $addemp->emp_cv         = $emp_cv;
            }
            // $addemp->emp_id_doc         = $req->emp_id_doc;

            $imagePath = public_path('media/idProof');
            if(!empty($req->file('emp_id_doc'))){                        
                $file                   = $req->file('emp_id_doc');
                $emp_id_doc             = time().$file->getClientOriginalName();
                $file->move($imagePath, $emp_id_doc);
                $addemp->emp_id_doc     = $emp_id_doc;
            }

            $insertedData               = $addemp->save();

            if($insertedData){
                //authentication

                $loginAuth              = new LoginAuthentication;
                $loginAuth->company_id  = $req->company_id;
                $loginAuth->uname       = $req->fname;
                $loginAuth->email       = $req->email;
                $loginAuth->password    = '12341234';
                $loginAuth->type        = 'user';
                $loginAuth->status      = 'A';
                $loginAuth->session     = '';
                $loginAuth->ip_address  = $req->ipAddress;
                $loginAuth->save();

                //email
                
                $tomail     = $req->email;
                $adminmail  = 'kuntal.dev@reddensoft.com';
                $from_mail  = env('MAIL_FROM_ADDRESS');
                $fname      = $req->fname;
                $email      = $req->email;
                $password   = '12341234';
                $data       = array('name'=>$fname,'password'=>$password,'email'=>$email);

                $mail = Mail::send('email_templates.sendwelcomeuserdetails', $data, function ($message) use ($tomail,$fname){
                    $message->from(env('MAIL_FROM_ADDRESS'), $name = 'Reddensoft Employee Portal');
                    $message->subject("Welcome to HRMS", $name=$fname);
                    $message->to($tomail, $name);
                });

                $success    = 'success';
                $messages   = 'Your sign-up was successful. Please check you user credentials detail to login';
                $emailStatus= $mail;
            } else {
                $success    = 'failed';
                $messages   = 'Somthing went wrong';
                $emailStatus= 'failed';
            }


            if($insertedData){
                $success                = 'success';
                $messages               = 'User Added Successfully';
            } else {
                $success                = 'failed';
                $messages               = 'Somthing went wrong';
            }
        }

        $response = [
            'success' => $success,
            'message' => $messages
        ];

        return response()->json($response);
    }


    public function companyDetailsSetAsDefault(Request $req){
        $step        = $req->step;
        $today       = Carbon::now();
        $currentDate = $today->format('Y-m-d');
        $endDate     = $this->addDaysFunction(30);
        $specifyDateGOneArray = [
            [
                'weekName' => 'All Week',
                'days' => [
                    ['name' => 'Sunday', 'val' => 'Non-Working'],
                    ['name' => 'Monday', 'val' => 'Full Day'],
                    ['name' => 'Tuesday', 'val' => 'Full Day'],
                    ['name' => 'Wednesday', 'val' => 'Full Day'],
                    ['name' => 'Thursday', 'val' => 'Full Day'],
                    ['name' => 'Friday', 'val' => 'Full Day'],
                    ['name' => 'Saturday', 'val' => 'Full Day']
                ]
            ]
        ];

        $specifyDateGArrays = json_encode($specifyDateGOneArray);
        //$specifyDateGArrays;


        //orgnizations
        //if($step == 'organization'){
        $updateverificationstatus = Company::where([   
        '_id'=>$req->companyId
        ])->update([
            'timezone'   => '24 Hours',
            'dateformat' => 'YYYY-MM-DD',
            'gmtOffsetName' => 'UTC+05:30',
            'financialYear'    => 'FY'
        ]);
        if ($updateverificationstatus) {
            $success    = 'success';
            $messages   = 'Update successfully.';
        }
        else
        {
            $success    = 'failed';
            $messages   = 'Somthing went wrong.';
        }
        //}

        //attendance
        //if($step == 'attendance' || $step == 'organization'){
        $AttendanceSetting = AttendanceSetting::where('company_id',$req->companyId)->where('status','A')->first();
        if(!$AttendanceSetting){

            $shiftArray = array('fullday','halfday');
            foreach ($shiftArray as $key => $value) {
                $shiftType                        = new AttendanceShift;
                $shiftType->company_id            = $req->companyId;
                $shiftType->shiftType             = 'general';
                $shiftType->shiftName             = $value;
                $shiftType->shiftFrom             = ($value=='fullday')? "09:00" : "14:30";
                $shiftType->shiftTo               = ($value=='fullday')? "14:00" : "18:00";
                $shiftType->status                = 'A';
                $shiftType->ip_address            = $req->ipAddress;
                $shiftType->session               = '';
                $insertedData                     = $shiftType->save();
            }
            $roaster                              = new AttendanceRoster;
            $roaster->company_id                  = $req->companyId;
            $roaster->shiftType                   = 'general';
            $roaster->rosterName                  = 'General';
            $roaster->effectiveFrom               = $currentDate;
            $roaster->effectiveTo                 = $endDate;
            $roaster->workingDaysVaryWeekly       = 'no';
            $roaster->allWeek                     = $specifyDateGArrays;
            $roaster->status                      = 'A';
            $roaster->ip_address                  = $req->ipAddress;
            $roaster->session                     = '';
            $insertedData                         = $roaster->save();

            if($insertedData){
                $aSetting                         = new AttendanceSetting;
                $aSetting->company_id             = $req->companyId;
                $aSetting->shiftType              = 'General';
                $aSetting->status                 = 'A';
                $aSetting->ip_address             = $req->ipAddress;
                $aSetting->session                = '';
                $insertedASData                     = $aSetting->save();
            }
            if($insertedASData){
                $success    = 'success';
                $messages   = 'Attendance Setting added successfully';
            } else {
                $success    = 'failed';
                $messages   = 'Somthing went wrong';
            }
        } else {
            $success    = 'failed';
            $messages   = 'Somthing went wrong';
        }
        //}

        $response = [
            'success'       => $success,
            'message'       => $messages
        ];

        return response()->json($response);
    }

    //function

    public function departmentAndDesignationData($compantId,$iPAddress){

        $filePathDepartment = storage_path('department.json');
        
        if (File::exists($filePathDepartment)) {
            $jsonContent = File::get($filePathDepartment);
            $departments = json_decode($jsonContent, true);
            //return response()->json(['data'=>$dataArray]);
        }

        $filePathDesignation = storage_path('designation.json');
        
        if (File::exists($filePathDesignation)) {
            $jsonContent = File::get($filePathDesignation);
            $designations = json_decode($jsonContent, true);
            //return response()->json(['data'=>$dataArray]);
        }

        //////////////////////

        // Import data into MongoDB
        foreach ($departments as $departmentData) {
            Department::create([
                'company_id' => $compantId,
                'name' => $departmentData['name'],
                'status' => $departmentData['status'],
                'session' => $departmentData['session'],
                'ip_address' => $iPAddress
            ]);
        }
        $departmentAray = Department::where("company_id",$compantId)->where("status","A")->get();
        foreach ($departmentAray as $key1=> $department) {

            $departmentId = $department['_id'];
            $departmentName = $department['name'];
            foreach ($designations as $key2=> $designationData) {

                if($departmentName==$designationData['departmentName']){
                    Designation::create([
                        'company_id' => $compantId,
                        'departmentId' => $departmentId,
                        'departmentName' => $departmentName,
                        'name' => $designationData['name'],
                        'status' => $designationData['status'],
                        'session' => $designationData['session'],
                        'ip_address' => $iPAddress
                    ]);
                    //$count++;
                }
            }
        }
    }

    public function leaveData($compantId,$iPAddress){
        
        $filePathLeave = storage_path('leave.json');
        
        if (File::exists($filePathLeave)) {
            $jsonContent = File::get($filePathLeave);
            $leavs = json_decode($jsonContent, true);
            //return response()->json(['data'=>$dataArray]);
        }

        // Import data into MongoDB
        foreach ($leavs as $leavePolicyData) {
            Leave::create([
                'company_id' => $compantId,
                'leaveName' => $leavePolicyData['leaveName'],
                'paidLeave' => $leavePolicyData['paidLeave'],
                'effectiveAfter' => $leavePolicyData['effectiveAfter'],
                'effectiveAfterDate' => $leavePolicyData['effectiveAfterDate'],
                'leaveSpanFromDate' => $leavePolicyData['leaveSpanFromDate'],
                'leaveSpanToDate' => $leavePolicyData['leaveSpanToDate'],
                'leaveFinancialYear' => $leavePolicyData['leaveFinancialYear'],
                'leaveCarry' => $leavePolicyData['leaveCarry'],
                'leaveCurryFwdLimit' => $leavePolicyData['leaveCurryFwdLimit'],
                'leaveCncashment' => $leavePolicyData['leaveCncashment'],
                'leaveCncashmentLimit' => $leavePolicyData['leaveCncashmentLimit'],
                'leaveApplicable' => $leavePolicyData['leaveApplicable'],
                'leaveApplicableData' => $leavePolicyData['leaveApplicableData'],
                'MaritalStatus' => $leavePolicyData['MaritalStatus'],
                'MaritalStatusData' => $leavePolicyData['MaritalStatusData'],
                'leaveDepartment' => $leavePolicyData['leaveDepartment'],
                'location' => $leavePolicyData['location'],
                'leaveDesignation' => $leavePolicyData['leaveDesignation'],
                'leaveSandwitch' => $leavePolicyData['leaveSandwitch'],
                'leaveDuration' => $leavePolicyData['leaveDuration'],
                'status' => $leavePolicyData['status'],
                'session' => $leavePolicyData['session'],
                'ip_address' => $iPAddress
            ]);
        }
    }

    public function addDaysFunction($days)
    {
        // Get the current date and time
        $currentDate = Carbon::now();

        // Add 30 days to the current date
        $newDate = $currentDate->addDays($days);

        // Format the new date as a string (optional, if you want to display it in a specific format)
        $formattedDate = $newDate->format('Y-m-d');

        return $formattedDate;
    }

}
