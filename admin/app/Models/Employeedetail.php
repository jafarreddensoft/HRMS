<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class Employeedetail extends Model
{
    use HasFactory;

    protected $collection = 'userdetails';

    protected $fillable = [
        'id', 'fname', 'lname', 'gender', 'dob', 'country', 'married','empid', 'doj', 'jobtitle', 'dept','reporting_manager','gross_salary',
        'acc_number', 'pan', 'benifitdoc', 'edu_level', 'edu_institue', 'edu_certificate', 'prev_employer','emp_skills','experience_certificate',
        'jobexperience','emp_cv','emp_id_doc'
    ];
}
