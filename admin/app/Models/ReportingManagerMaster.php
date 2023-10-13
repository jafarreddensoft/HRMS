<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class ReportingManagerMaster extends Model
{
    use HasFactory;
    protected $collection = 'reporting_manager_master';

    protected $fillable = [
        'id', 'company_id', 'name', 'status', 'ip_address', 'session'
    ];
}
