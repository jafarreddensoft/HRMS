<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class LoginAuthentication extends Model
{
    use HasFactory;
    protected $collection = 'login_authentication';

    protected $fillable = [
        'id', 'company_id', 'uname', 'password', 'auth_token', 'session', 'status', 'ip_address'
    ];
}
