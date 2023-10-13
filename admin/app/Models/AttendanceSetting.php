<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class AttendanceSetting extends Model
{
    use HasFactory;
    protected $collection = 'attendance_setting';

    protected $fillable = [
        '_id', 'company_id', 'shiftType', 'shiftId', 'rosterId', 'status', 'ip_address', 'session'
    ];
}
