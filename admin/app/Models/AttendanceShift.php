<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class AttendanceShift extends Model
{
    use HasFactory;
    protected $collection = 'attendance_shift';
    protected $fillable = [
        '_id', 'company_id', 'shiftType', 'shiftName', 'shiftFrom', 'shiftTo', 'status', 'ip_address', 'session'
    ];
}
