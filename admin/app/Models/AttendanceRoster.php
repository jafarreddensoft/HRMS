<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class AttendanceRoster extends Model
{
    use HasFactory;
    protected $collection = 'attendance_roster';
    protected $fillable = [
        '_id', 'company_id', 'shiftType', 'rosterName', 'effectiveFrom', 'effectiveTo', 'workingDaysVaryWeekly', 'allWeek', 'weekly', 'status', 'ip_address', 'session'
    ];
}
