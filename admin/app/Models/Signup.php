<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class Signup extends Model
{
    use HasFactory;
    protected $collection = 'signupdetails';

    protected $fillable = [
        'id', 'uname', 'orgname', 'email', 'phone', 'country', 'timezone','password'
    ];
}
