<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;


class CompanyDepartmentController extends Controller
{

    public function getDepartmentList2(Request $req){

        $departmentList = Department::where('company_id', $req->company_id)->where('status', 'A')->get();
        $response = [
            'success'           => 'success',
            // 'message'           => $req->message,
            'departmentList'   => $departmentList
        ];

        return response()->json($response);
    }

    public function addDepartment(Request $req){
        
        $departmentArray         = $req->departmentArray;
        
        if($departmentArray>0){
            foreach ($departmentArray as $key => $value) {
                if($value['departmentName']!=''){
                    $insert              = new Department;
                    $insert->company_id  = $req->company_id;
                    $insert->name        = $value['departmentName'];
                    $insert->status      = 'A';
                    $insert->session     = '';
                    $insert->ip_address  = $req->ipAddress;
                    $insertedData        = $insert->save();
                } else {
                    $insertedData = false;
                }
            }
        }
        
        if($insertedData){
            $success    = 'success';
            $messages   = 'Created successfully';
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

    public function editDepartment(Request $req){
        $updatedData    = Department::where(['_id'=>$req->id])->update([
            'name' => $req->departmentName,
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

    public function deleteDepartment(Request $req){
        $deletedData    = Department::where(['_id'=>$req->id])->update([
            'status' => 'D',
        ]);
        $deletedData    = Designation::where(['departmentId'=>$req->id])->update([
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
            //'data'       => $req->departmentArray
        ];

        return response()->json($response);
    }

    //function

}
