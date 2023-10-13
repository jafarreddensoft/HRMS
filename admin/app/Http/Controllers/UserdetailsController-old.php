<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userdetails;
use Illuminate\Support\Facades\DB;

class UserdetailsController extends Controller
{
    public function userdetails()
    {
       $userdetails = Userdetails::all();
       return response()->json(["result" => "ok","data"=>$userdetails], 201);
       //return response()->json(["result" => "ok"], 201);
    }
}
