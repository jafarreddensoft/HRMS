<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\LoginAuthentication;
use App\Models\AddemployeeMaster;
use App\Models\SetOTP;
use App\Models\addemployeedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;


class OrganizationController extends Controller
{
    public function updateOrganization(Request $req){
        $updateverificationstatus = Company::where([   
            '_id'=>$req->companyId
        ])->update([
            'uname'      => $req->uname,
            'orgname'    => $req->orgname,
            'email'      => $req->email,
            'phone'      => $req->phone,
            'country'    => $req->country,
            'state'      => $req->state,
            'timezone'   => $req->timezone,
            'dateformat' => $req->dateformat,
            'gmtOffsetName' => $req->gmtOffsetName,
            'address'    => $req->address,
            'financialYear'    => $req->financialYear
        ]);
        if ($updateverificationstatus) {
            $success = 'success';
            $msg = 'Update successfully.';
        }
        else
        {
            $success = 'failed';
            $msg = 'Somthing went wrong.';
        }

        $response = [
            'success' => $success,
            'message' => $msg,
        ];

        return response()->json($response);
    }

    public function getOrganizationDetails(Request $req){
        $organizationstate = Company::where('_id', $req->companyId)->where('status', 'A')->first();
        $response = [
            'success'           => 'success',
            'organizationstate' => $organizationstate
        ];

        return response()->json($response);
    }
    //function

}
