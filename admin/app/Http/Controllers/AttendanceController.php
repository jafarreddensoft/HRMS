<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\AttendanceSetting;
use App\Models\AttendanceShift;
use App\Models\AttendanceRoster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;


class AttendanceController extends Controller
{
    public function addAttendanceSetting(Request $req){
        $AttendanceSetting = AttendanceSetting::where('company_id',$req->companyId)->where('status','A')->first();
        if(!$AttendanceSetting){
            if($req->shiftType=='General'){
                $shiftArray = array('fullday','halfday');
                foreach ($shiftArray as $key => $value) {
                    $shiftType                        = new AttendanceShift;
                    $shiftType->company_id            = $req->companyId;
                    $shiftType->shiftType             = 'general';
                    $shiftType->shiftName             = $value;
                    $shiftType->shiftFrom             = ($value=='fullday')? $req->defineFullShiftFrom : $req->defineHalfShiftFrom;
                    $shiftType->shiftTo               = ($value=='fullday')? $req->defineFullShiftTo : $req->defineHalfShiftTo;
                    $shiftType->status                = 'A';
                    $shiftType->ip_address            = $req->ipAddress;
                    $shiftType->session               = '';
                    $insertedData                     = $shiftType->save();
                }
                $roaster                              = new AttendanceRoster;
                $roaster->company_id                  = $req->companyId;
                $roaster->shiftType                   = 'general';
                $roaster->rosterName                  = 'General';
                $roaster->effectiveFrom               = $req->effectiveFrom;
                $roaster->effectiveTo                 = $req->effectiveTo;
                $roaster->workingDaysVaryWeekly       = $req->everyWeekGen;
                $roaster->allWeek                     = ($req->everyWeekGen == 'yes')? $req->specifyDateGArrays:'';
                $roaster->weekly                      = ($req->everyWeekGen == 'no')? $req->specifyDateGOneArray:'';
                $roaster->status                      = 'A';
                $roaster->ip_address                  = $req->ipAddress;
                $roaster->session                     = '';
                $insertedData                         = $roaster->save();
            } else {
                //$this->addShiftFunction($req->shiftArray,$req->companyId,$req->ipAddress);
                //$this->addRosterFunction($req->rosterArray,$req->companyId,$req->ipAddress,$req->rosterName,$req->effectiveFrom,$req->effectiveTo,$req->everyWeekMen,$req->specifyDateMArrays,$req->specifyDateMOneArray)
                $attendance                   = new AttendanceShift;
                $attendance->company_id       = $req->companyId;
                $attendance->shiftType        = $req->shiftType;
                $attendance->shiftId          = $req->shiftId;
                $attendance->rosterId         = $req->rosterId;
                $attendance->status           = 'A';
                $attendance->ip_address       = $req->ipAddress;
                $attendance->session          = '';
                $insertedData                 = $attendance->save();

                // if($insertedData){
                //     $success    = 'success';
                //     $messages   = 'Attendance Setting added successfully';
                // } else {
                //     $success    = 'failed';
                //     $messages   = 'Somthing went wrong';
                // }
            }
            $aSetting                   = new AttendanceSetting;
            $aSetting->company_id       = $req->companyId;
            $aSetting->shiftType        = $req->shiftType;
            $aSetting->status           = 'A';
            $aSetting->ip_address       = $req->ipAddress;
            $aSetting->session          = '';
            $insertedData               = $aSetting->save();

             if($insertedData){
                $success    = 'success';
                $messages   = 'Attendance Setting added successfully';
            } else {
                $success    = 'failed';
                $messages   = 'Somthing went wrong';
            }
        } else {
            $updateAttendance = AttendanceSetting::where(['_id'=>$AttendanceSetting->_id])->update([
                'shiftType' => $req->shiftType
            ]);
            if($req->shiftType==='General'){
                $shiftArray = array('fullday','halfday');
                foreach ($shiftArray as $key => $value) {
                    $updateAttendance = AttendanceShift::where(['company_id'=>$req->companyId,'shiftType'=>'general','shiftName'=>$value])->update([
                        'shiftFrom' => ($value=='fullday')? $req->defineFullShiftFrom : $req->defineHalfShiftFrom,
                        'shiftTo'   => ($value=='fullday')? $req->defineFullShiftTo : $req->defineHalfShiftTo
                    ]);
                }
                $updateAttendance = AttendanceRoster::where(['company_id'=>$req->companyId,'shiftType'=>'general','rosterName'=>'General'])->update([
                    'effectiveFrom'         => $req->effectiveFrom,
                    'effectiveTo'           => $req->effectiveTo,
                    'workingDaysVaryWeekly' => $req->everyWeekGen,
                    'allWeek'               => ($req->everyWeekGen == 'yes')? $req->specifyDateGArrays:'',
                    'weekly'                => ($req->everyWeekGen == 'no')? $req->specifyDateGOneArray:''

                ]);
            }
            if($updateAttendance){
                $success    = 'success';
                $messages   = 'Attendance Setting updated successfully';
            } else {
                $success    = 'failed';
                $messages   = 'Somthing went wrong';
            }
        }
        $response = [
            'success'       => $success,
            'message'       => $messages
        ];

        return response()->json($response);
    }

    public function addShiftDetails(Request $req){

        foreach ($req->shiftDetails as $key => $value) {
            $shiftType                        = new AttendanceShift;
            $shiftType->company_id            = $req->companyId;
            $shiftType->shiftType             = 'manual';
            $shiftType->shiftName             = $value['shiftName'];
            $shiftType->shiftFrom             = $value['from'];
            $shiftType->shiftTo               = $value['to'];
            $shiftType->status                = 'A';
            $shiftType->ip_address            = $req->ipAddress;
            $shiftType->session               = '';
            $insertedData                     = $shiftType->save();
        }

        //$shiftArra = $this->addShiftFunction($req->shiftArray);
        if($insertedData){
            $success    = 'success';
            $messages   = 'Shift added successfully';
        } else {
            $success    = 'failed';
            $messages   = 'Somthing went wrong';
        }
        $response = [
            'success'       => $success,
            'message'       => $messages
        ];

        return response()->json($response);
    }

    public function getShiftList(Request $req){
        $shiftList = AttendanceShift::where('company_id', $req->companyId)->where('status', 'A')->get();
        $response = [
            'success'           => 'success',
            'shiftList'         => $shiftList
        ];

        return response()->json($response);
    }

    public function addRosterDetails(Request $req){

        $roaster                              = new AttendanceRoster;
        $roaster->company_id                  = $req->companyId;
        $roaster->shiftType                   = $req->shiftType;
        $roaster->rosterName                  = $req->rosterName;
        $roaster->effectiveFrom               = $req->effectiveFrom;
        $roaster->effectiveTo                 = $req->effectiveTo;
        $roaster->workingDaysVaryWeekly       = $req->everyWeekMen;
        $roaster->allWeek                     = ($req->everyWeekMen == 'yes')? $req->specifyDateMArrays:'';
        $roaster->weekly                      = ($req->everyWeekMen == 'no')? $req->specifyDateMOneArray:'';
        $roaster->status                      = 'A';
        $roaster->ip_address                  = $req->ipAddress;
        $roaster->session                     = '';
        $insertedData                         = $roaster->save();

        //$shiftArra = $this->addShiftFunction($req->shiftArray);
        if($insertedData){
            $success    = 'success';
            $messages   = 'Roster added successfully';
        } else {
            $success    = 'failed';
            $messages   = 'Somthing went wrong';
        }
        $response = [
            'success'       => $success,
            'message'       => $messages
        ];

        return response()->json($response);
    }

    public function getRosterList(Request $req){
        $rosterList = AttendanceRoster::where('company_id', $req->companyId)->where('status', 'A')->get();
        $response = [
            'success'           => 'success',
            'rosterList'        => $rosterList
        ];

        return response()->json($response);
    }

    public function updateShiftDetails(Request $req){
        $updatedData    = AttendanceShift::where(['_id'=>$req->id])->update([
            'shiftName' => $req->shiftName,
        ]);

        if($updatedData){
            $success    = 'success';
            $messages   = 'Update successfully';
        } else {
            $success    = 'failed';
            $messages   = 'somthing went wrong';
        }

        $response = [
            'success'       => $success,
            'message'       => $messages
            //'data'       => $req->departmentArray
        ];

        return response()->json($response);
    }

    public function getAttendanceSettingDetails(Request $req){
        $attendanceSettingDetails   = AttendanceSetting::where('company_id', $req->companyId)->where('status', 'A')->get();
        $shiftDetails  = AttendanceShift::where('company_id', $req->companyId)->where('shiftType', 'general')->where('status', 'A')->get();
        $rosterDetails = AttendanceRoster::where('company_id', $req->companyId)->where('shiftType', 'general')->where('status', 'A')->get();
        if(count($attendanceSettingDetails)>0){
            $success        = 'success';
            //$shiftType      = $attendanceSettingDetails;
            $shiftType      = ($attendanceSettingDetails[0]->shiftType)?$attendanceSettingDetails[0]->shiftType:'General';
            $attenDetails   = $attendanceSettingDetails;
            $shiftDetails   = $shiftDetails;
            $rosterDetails  = $rosterDetails;
        } else {
            $success        = 'success';
            $shiftType      = 'General';
            $attenDetails   = '';
            $shiftDetails   = '';
            $rosterDetails  = '';
        }
        $response = [
            'success'       => 'success',
            'shiftType'     => $shiftType,
            'attenDetails'  => $attenDetails,
            'shiftDetails'  => $shiftDetails,
            'rosterDetails' => $rosterDetails
        ];

        return response()->json($response);
    }
    //function

    function addShiftFunction($shiftArray,$companyId,$ipAddress) {
        $shiftCount = 0;
        foreach ($shiftArray as $key => $value) {
            $shiftType                        = new AttendanceShift;
            $shiftType->company_id            = $companyId;
            $shiftType->shiftType             = 'manual';
            $shiftType->shiftName             = $value['shiftName'];
            $shiftType->shiftFrom             = $value['from'];
            $shiftType->shiftTo               = $value['to'];
            $shiftType->status                = 'A';
            $shiftType->ip_address            = $ipAddress;
            $shiftType->session               = '';
            $insertedData                     = $shiftType->save();
            if($insertedData){
                $shiftCount++;
            }
        }
        return $shiftCount;
    }

    function addRosterFunction($rosterArray,$companyId,$ipAddress,$rosterName,$effectiveFrom,$effectiveTo,$everyWeekMen,$specifyDateMArrays,$specifyDateMOneArray) {
        $rosterCount = 0;
        foreach ($rosterArray as $key => $value) {
            $roaster                              = new Attendance;
            $roaster->company_id                  = $companyId;
            $roaster->shiftType                   = 'manual';
            $roaster->rosterName                  = $rosterName;
            $roaster->effectiveFrom               = $effectiveFrom;
            $roaster->effectiveTo                 = $effectiveTo;
            $roaster->workingDaysVaryWeekly       = $everyWeekMen;
            $roaster->allWeek                     = ($everyWeekMen == 'yes')? $specifyDateMArrays:'';
            $roaster->weekly                      = ($everyWeekMen == 'no')? $specifyDateMOneArray:'';
            $roaster->status                      = 'A';
            $roaster->ip_address                  = $ipAddress;
            $roaster->session                     = '';
            $insertedData                         = $roaster->save();
            if($insertedData){
                $rosterCount++;
            }
        }
        return $rosterCount;
    }

}
