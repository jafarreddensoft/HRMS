<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\AddemployeeMaster;
use App\Models\addemployeedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;


class signupcontroller extends Controller
{
    public function signup(Request $req){
        $prev_reg_details = Post::where('email',$req->email)->first();

        if ($prev_reg_details) {
            $msg = 'This email already exists. Please try a new one.';
            $success = 'warning';
        } else {

            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            $verifcationtoken = implode($pass);

            $registration = new Post;
            $registration->uname = $req->uname;
            $registration->orgname = $req->orgname;
            $registration->email = $req->email;
            $registration->phone = $req->phone;
            $registration->country = $req->country;
            $registration->timezone = $req->timezone;
            $registration->dateformat = $req->dateformat;
            $registration->password = $req->password;
            $registration->verifcationtoken = $verifcationtoken;
            $registration->verificationstatus = 'no';
            $registration->save();




            $data=array('name'=>$req->uname,'password'=>$verifcationtoken);
            // dd($data);
            $tomail=$req->email;
            $adminmail = 'kuntal.dev@reddensoft.com';
            $from_mail = env('MAIL_FROM_ADDRESS');
            $fname = $req->uname;
            // dd($from_mail);

            $mail = Mail::send('email_templates.sendwelcomeuser', $data, function ($message) use ($tomail,$fname){
                $message->from(env('MAIL_FROM_ADDRESS'), $name = 'Reddensoft Employee Portal');
                $message->subject("Welcome to HRMS", $name = $fname);
                $message->to($tomail, $name);
                });

                // dd($mail);

            // $mail = Mail::send('email_templates.sendwelcomeempadmin', $data, function ($message) use ($adminmail,$fname){
            //     $message->from(env('MAIL_FROM_ADDRESS'), $name = 'Reddensoft Employee Portal');
            //     $message->subject("New Employee Added", $name = $fname);
            //     $message->to($adminmail, $name);
            //     // $message->cc(['kallol@sohomwebmedia.com','info@reddensoft.com','dipak@reddensoft.com','sandip@reddensoft.com']);
            //     });

            $msg = 'Your sign-up was successful. Please verify your email to continue';
            $success = 'success';
        }

        $response = [
            'success' => $success,
            'message' => $msg,
        ];

        return response()->json($response);
    }

    public function signin(Request $req){
        $prev_reg_details = Post::where('email',$req->email)->first();
        // dd($prev_reg_details);
        if (!$prev_reg_details) {
            $msg = 'This email does not exist. Please try another one.';
            $success = 'danger';
        } else {
            $password = $prev_reg_details->password;
            if ($password == $req->password) {
                $msg = 'Your have successfully signed in';
                $success = 'success';

            } else {
                $msg = 'Password does not match!';
                $success = 'danger';
            }
        }

        $response = [
            'success' => $success,
            'message' => $msg,
            'details' => $prev_reg_details->_id
        ];

        return response()->json($response);
    }

    public function verifymail(Request $req){
        $prev_reg_details = Post::where(['verifcationtoken'=>$req->token,'verificationstatus'=>'no'])->first();
        // dd('test');
        if ($prev_reg_details) {
            $updateverificationstatus = Post::where(['verifcationtoken'=>$req->token,'verificationstatus'=>'no'])->update([
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

    public function addemployeemasterdetails(Request $req){

        $checkprev = AddemployeeMaster::where('companyid', $req->company_id)->first();

        if ($checkprev) {
            $updateemp = AddemployeeMaster::where('companyid', $req->company_id)->update([
                'addempdeatils' => $req->info,
            ]);

            // $message = 'Details updated successfully';
        } else {
            $addemp = new AddemployeeMaster;
            $addemp->addempdeatils = $req->info;
            $addemp->companyid = $req->company_id;
            $addemp->save();

            // $message = 'Details added successfully';

        }

        $newempdata = AddemployeeMaster::where('companyid', $req->company_id)->first();

        $response = [
            'success' => 'success',
            'newempdata' => $newempdata,
            'message' => $req->message
        ];

        return response()->json($response);


    }

    public function fetchemployeemasterdetails(Request $req){

        $empdata = AddemployeeMaster::where('companyid', $req->company_id)->first();

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
        $addemp = new addemployeedetail;
        $addemp->fname = $req->fname;
        $addemp->lname = $req->lname;
        $addemp->gender = $req->gender;
        $addemp->dob = $req->dob;
        $addemp->country = $req->country;
        $addemp->married = $req->married;
        $addemp->empid = $req->empid;
        $addemp->doj = $req->doj;
        $addemp->jobtitle = $req->jobtitle;
        $addemp->dept = $req->dept;
        $addemp->reporting_manager = $req->reporting_manager;
        $addemp->gross_salary = $req->gross_salary;
        $addemp->acc_number = $req->acc_number;
        $addemp->pan = $req->pan;
        $addemp->benifitdoc = $req->benifitdoc;
        $addemp->edu_level = $req->edu_level;
        $addemp->edu_institue = $req->edu_institue;
        $addemp->edu_certificate = $req->edu_certificate;
        $addemp->prev_employer = $req->prev_employer;
        $addemp->emp_skills = $req->emp_skills;
        $addemp->experience_certificate = $req->experience_certificate;
        $addemp->jobexperience = $req->jobexperience;
        $addemp->emp_cv = $req->emp_cv;
        $addemp->emp_id_doc = $req->emp_id_doc;
        $addemp->save();

        $response = [
            'success' => 'success',
            'message' => 'Employee added with success'
        ];

        return response()->json($response);
    }
}
