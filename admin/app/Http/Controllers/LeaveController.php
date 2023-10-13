<?php

namespace App\Http\Controllers;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;


class LeaveController extends Controller
{

    public function addLeaveManagementDetails(Request $req){
    	$leaveDetails = Leave::where('company_id', $req->companyId)->where('leaveName',$req->leaveName)->first();
    	if(!$leaveDetails){

	        $insert              		= new Leave;
	        $insert->company_id  		= $req->companyId;
			$insert->leaveName 			= $req->leaveName;

			$imagePath = public_path('media/leaveIcon');
	        if(!empty($req->file('leaveIcon'))){                        
	            $file 					= $req->file('leaveIcon');
	            $leaveIcon 				= time().$file->getClientOriginalName();
	            $file->move($imagePath, $leaveIcon);
	            $insert->leaveIcon 		= $leaveIcon;
	        }

			$insert->paidLeave 			= $req->paidLeave;
			$insert->effectiveAfter 	= $req->effectiveAfter;
			$insert->effectiveAfterDate = $req->effectiveAfterDate;
			$insert->leaveSpanFromDate 	= $req->leaveSpanFromDate;
			$insert->leaveSpanToDate 	= $req->leaveSpanToDate;
			$insert->leaveFinancialYear = $req->leaveFinancialYear;
			$insert->leaveCarry 		= $req->leaveCarry;
			$insert->leaveCurryFwdLimit = $req->leaveCurryFwdLimit;
			$insert->leaveCncashment 	= $req->leaveCncashment;
			$insert->leaveCncashmentLimit = $req->leaveCncashmentLimit;
			$insert->leaveApplicable 	= $req->leaveApplicable;
			$insert->leaveApplicableData= $req->leaveApplicableData;
			$insert->MaritalStatus 		= $req->MaritalStatus;
			$insert->MaritalStatusData 	= $req->MaritalStatusData;
			$insert->leaveDepartment 	= $req->leaveDepartment;
			$insert->location 			= $req->location;
			$insert->leaveDesignation 	= $req->leaveDesignation;
			$insert->leaveSandwitch 	= $req->leaveSandwitch;
			$insert->leaveDuration 		= $req->leaveDuration;
	        $insert->status      		= 'A';
	        $insert->session     		= '';
	        $insert->ip_address  		= $req->ipAddress;
	        $insertedData        		= $insert->save();
	        
	        if($insertedData){
	            $success    = 'success';
	            $messages   = 'Leave added successfully';
	        } else {
	            $success    = 'failed';
	            $messages   = 'somthing went wrong';
	        }
	    } else {
	    	$imagePath = public_path('media/leaveIcon');
	        if(!empty($req->file('leaveIcon'))){                        
	            $file 					= $req->file('leaveIcon');
	            $leaveIcon 				= time().$file->getClientOriginalName();
	            $file->move($imagePath, $leaveIcon);
	            $leaveIcon;
	        }

	    	$updatedData    = Leave::where(['_id'=>$leaveDetails->_id])->update([

            	'leaveName'  			=> $req->leaveName,
            	'leaveIcon'  			=> $leaveIcon,
				'paidLeave'  			=> $req->paidLeave,
				'effectiveAfter'  		=> $req->effectiveAfter,
				'effectiveAfterDate'  	=> $req->effectiveAfterDate,
				'leaveSpanFromDate'  	=> $req->leaveSpanFromDate,
				'leaveSpanToDate'  		=> $req->leaveSpanToDate,
				'leaveCarry'  			=> $req->leaveCarry,
				'leaveFinancialYear'  	=> $req->leaveFinancialYear,
				'leaveCurryFwdLimit'  	=> $req->leaveCurryFwdLimit,
				'leaveCncashment'  		=> $req->leaveCncashment,
				'leaveCncashmentLimit'  => $req->leaveCncashmentLimit,
				'leaveApplicable'  		=> $req->leaveApplicable,
				'leaveApplicableData' 	=> $req->leaveApplicableData,
				'MaritalStatus'  		=> $req->MaritalStatus,
				'MaritalStatusData'  	=> $req->MaritalStatusData,
				'leaveDepartment'  		=> $req->leaveDepartment,
				'location'  			=> $req->location,
				'leaveDesignation'  	=> $req->leaveDesignation,
				'leaveSandwitch'  		=> $req->leaveSandwitch,
				'leaveDuration'  		=> $req->leaveDuration
        	]);
        	if($updatedData){
	            $success    = 'success';
	            $messages   = 'Leave updated successfully';
	        } else {
	            $success    = 'failed';
	            $messages   = 'somthing went wrong';
	        }
	    }

        $response = [
            'success'       => $success,
            'message'       => $messages
        ];

        return response()->json($response);
	}

    public function getLeaveList(Request $req){

        $leaveList = Leave::where('company_id', $req->companyId)->where('status', 'A')->get();
        if($leaveList){
            $success    = 'success';
            $leaveList  = $leaveList;
        } else {
            $success    = 'success';
            $leaveList  = array();
        }
        $response  = [
            'success'     => 'success',
            'leaveList'   => $leaveList
        ];

        return response()->json($response);
    }

    public function deleteLeave(Request $req){
        $deletedData    = Leave::where(['_id'=>$req->id])->update([
            'status' => 'D',
        ]);

        if($deletedData){
            $success    = 'success';
            $messages   = 'Deleted successfully';
        } else {
            $success    = 'failed';
            $messages   = 'somthing went wrong';
        }

        $response = [
            'success'       => $success,
            'message'       => $messages
        ];

        return response()->json($response);
    }

    //function

}
