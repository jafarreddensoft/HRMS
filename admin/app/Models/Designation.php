<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class Designation extends Model
{
    use HasFactory;
    protected $collection = 'designation';

    protected $fillable = [
        'id', 'company_id', 'departmentId', 'departmentName','name', 'status', 'ip_address', 'session'
    ];

    public function getDepartmentId()
    {
        return $this->embedsOne('\App\Models\Department','departmentId');
    }
}
