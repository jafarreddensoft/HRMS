<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class Department extends Model
{
    use HasFactory;
    protected $collection = 'department';

    protected $fillable = [
        'id', 'company_id', 'name', 'status', 'ip_address', 'session'
    ];
}
