<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class EducationMaster extends Model
{
    use HasFactory;
    protected $collection = 'education_master';

    protected $fillable = [
        'id', 'company_id', 'name', 'status', 'ip_address', 'session'
    ];
}
