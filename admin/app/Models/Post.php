<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\Model;
class Post extends Model
{
    use HasFactory;
    // protected $connection = 'hrms1';
	// protected $collection = 'collection1';
	protected $collection = 'signupdetails';

    protected $fillable = [
        'id', 'uname', 'orgname', 'email', 'phone', 'country', 'timezone', 'dateformat','timeformat','verifcationtoken','verificationstatus'
    ];
}
