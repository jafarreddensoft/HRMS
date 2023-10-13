<?php

namespace App\Http\Controllers;
use App\Models\Ptax;
use App\Models\SalaryProvision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class payrollController extends Controller
{
    public function addptax(Request $req){
        $addptax = new Ptax;
        $addptax->fromsalary = $req->fromsalary;
        $addptax->tosalary = $req->tosalary;
        $addptax->type = $req->type;
        $addptax->amount = $req->amount;
        $addptax->save();

        $ptaxdetails = Ptax::all();

        $response = [
            'success' => 200,
            'ptaxdetails'=>$ptaxdetails,
            'message' => 'P.Tax slab added.',
        ];



        return response()->json($response);
    }

    public function delptax(Request $req){
        Ptax::where('_id', $req->id)->delete(); 
        $ptaxdetails = Ptax::all();

        $response = [
            'success' => 200,
            'ptaxdetails'=>$ptaxdetails,
            'message' => 'P.Tax removed successfully.',
        ];



        return response()->json($response);

    }

    public function savesalaryprovision(Request $req){

        $previous_salaryprovision = SalaryProvision::all();
        // dd($previous_salaryprovision);
        if (!$previous_salaryprovision) {
            $salaryprovision = SalaryProvision::update([
                'basic' => $req->basic,
                'hra' => $req->hra,
                'other' => $req->other,
                'educational' => $req->educational,
                'pf' => $req->pf,
             ]);

            $message = 'Salary provisions updated';

        } else {
            $salaryprovision = new SalaryProvision;
            $salaryprovision->basic = $req->basic;
            $salaryprovision->hra = $req->hra;
            $salaryprovision->other = $req->other;
            $salaryprovision->educational = $req->educational;
            $salaryprovision->pf = $req->pf;
            $salaryprovision->save();

            $message = 'Salary provisions added';
        }
        


        // $salaryprovision = Ptax::all();

        $response = [
            'success' => 200,
            // 'ptaxdetails'=>$ptaxdetails,
            'message' => $message,
            'salaryprovision' => $salaryprovision
        ];

        return response()->json($response);

    }

    public function fetchsalarydata(Request $req){
        $salaryProvisiondetails = SalaryProvision::all();
        $ptaxdetails = Ptax::all();

        $response = [
            'success' => 200,
            'ptaxdetails'=>$ptaxdetails,
            'message' => 'Salary provisons fetched.',
            'salaryProvisiondetails' => $salaryProvisiondetails
        ];

        return response()->json($response);
    }
}
