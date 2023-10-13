<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class Leave extends Model
{
    use HasFactory;
    protected $collection = 'leave';

    protected $fillable = [
        'id', 'company_id', 'companyId','ipAddress','leaveName','paidLeave','effectiveAfter','effectiveAfterDate','leaveSpanFromDate','leaveSpanToDate','leaveCarry','leaveCurryFwdLimit','leaveCncashment','leaveCncashmentLimit','leaveApplicable','leaveApplicableData','MaritalStatus','MaritalStatusData','leaveDepartment','location','leaveDesignation','leaveSandwitch','leaveDuration', 'status', 'ip_address', 'session'
    ];
}
