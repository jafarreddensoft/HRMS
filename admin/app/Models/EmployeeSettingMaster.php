<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class EmployeeSettingMaster extends Model
{
    use HasFactory;
    protected $collection = 'addemployeemaster';

    protected $fillable = [
        'id','companyid', 'addempdeatils'
    ];
}
