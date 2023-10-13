<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class testController extends Controller
{
    public function test($slug){
        $show = Post::all();
        return response()->json([
            'status'=> 200,
            'show'=>$show,

        ]);
    }

    public function signup(Request $req){



        $registration = new Post;
        $registration->uname = $req->uname;
        $registration->orgname = $req->orgname;
        $registration->email = $req->email;
        $registration->phone = $req->phone;
        $registration->country = $req->country;
        $registration->timezone = $req->timezone;
        $registration->dateformat = $req->dateformat;
        $registration->save();

    }
}
