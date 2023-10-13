<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class Company extends Model
{
    use HasFactory;
    protected $collection = 'company';

    protected $fillable = [
        'id', 'uname', 'orgname', 'email', 'phone', 'country', 'timezone', 'status', 'ip_address', 'session'
    ];
}
