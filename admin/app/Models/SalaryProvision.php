<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class SalaryProvision extends Model
{
    use HasFactory;
    protected $collection = 'salaryprovision';

    protected $fillable = [
        'id', 'basic', 'hra', 'other', 'educational', 'pf', 'advance'
    ];
}
