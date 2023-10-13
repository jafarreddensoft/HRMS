<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Userdetails extends Model
{
    use HasFactory;
    //protected $connection = 'mongodb';
    protected $connection = 'mongodb';

    protected $fillable = [
        'fname',
        'lname',
        'dob',
    ];
}
