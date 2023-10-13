<?php

namespace App\Http\Controllers;
use App\Models\Designation;
use App\Models\Department;
use MongoDB\BSON\ObjectId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Mail;


class CompanyDesignationController extends Controller
{

    public function getDesignationList2(Request $req){
        // Retrieve designations with a specific status
        $designations = Designation::where('company_id', $req->company_id)->where('status', 'A')->get();
        $designationList = [];
        foreach ($designations as $designation) {
            $departmentData = Department::find($designation->departmentId);
            if ($departmentData) {
                $designation->department = $departmentData;
                $designationList[] = $designation;
            }
        }

        $response = [
            'success'           => 'success',
            // 'message'           => $req->message,
            'designationList'   => $designationList
        ];

        return response()->json($response);
    }

    public function addDesignation(Request $req){
        
        $designationArray         = $req->designationArray;
        
        if($designationArray>0){
            foreach ($designationArray as $key => $value) {
                if($value['designationName']!=''){
                    $insert              = new Designation;
                    $insert->company_id  = $req->company_id;
                    $insert->departmentId= $value['departmentId'];
                    $insert->departmentName= $this->getDepartmentIdByName($value['departmentId']);
                    $insert->name        = $value['designationName'];
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
            //'data'       => $req->designationArray
        ];

        return response()->json($response);
    }

    public function editDesignation(Request $req){
        $updatedData    = Designation::where(['_id'=>$req->id])->update([
            'departmentId'  => $req->departmentId,
            'departmentName'  => $this->getDepartmentIdByName($req->departmentId),
            'name'          => $req->designationName
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

    public function deleteDesignation(Request $req){
        $deletedData    = Designation::where(['_id'=>$req->id])->update([
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

    public function getDepartmentIdByName($departmentId){
        $designationList = Department::where('_id', $departmentId)->where('status', 'A')->get();
        
        return $designationList[0]->name;
    }
    public function getDepartmentWiseDesignationList(Request $req){

        $designationList = Designation::where('departmentId', $req->code)->where('status', 'A')->get();
        $response = [
            'success'           => 'success',
            // 'message'           => $req->message,
            'designationList'   => $designationList
        ];

        return response()->json($response);
    }

    public function insertDesignation(Request $req){
        $filePathDesignation = storage_path('designation.json');
        
        if (File::exists($filePathDesignation)) {
            $jsonContent = File::get($filePathDesignation);
            $designations = json_decode($jsonContent, true);
            //return response()->json(['data'=>$dataArray]);
        }

       
        $departmentAray = Department::where("company_id",$req->company_id)->where("status","A")->get();
        $count = 0;
        $data = array();
        $departmentId = '';
        $departmentName = '';
        foreach ($departmentAray as $key=> $department) {
            $departmentId = $department['_id'];
            $departmentName = $department['name'];
            foreach ($designations as $key2=> $designationData) {

                if($departmentName==$designationData['departmentName']){
                    $data[] = Designation::create([
                        'company_id' => $req->company_id,
                        'departmentId' => $departmentId,
                        'departmentName' => $departmentName,
                        'name' => $designationData['name'],
                        'status' => $designationData['status'],
                        'session' => $designationData['session'],
                        'ip_address' => $req->iPAddress
                    ]);
                    $count++;
                }
            }
        }

        $response = [
            'success'           => 'success',
            'dddddLLL'   => $designations,
            'dddddLLL2'   => $count,
            'data'   => $departmentAray,
            'data2'   => $data,
        ];

        return response()->json($response);
    }

    //function

}
