<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class SetOTP extends Model
{
    use HasFactory;
    protected $collection = 'set_otp';

    protected $fillable = [
        'id', 'email', 'otp', 'status', 'ip_address', 'session'
    ];
}
