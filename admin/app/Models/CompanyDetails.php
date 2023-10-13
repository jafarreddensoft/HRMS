<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class CompanyDetails extends Model
{
    use HasFactory;
    protected $collection = 'company_details';

    protected $fillable = [
        'id', 'company_id', 'uname', 'orgname', 'email', 'phone', 'country', 'timezone','ip_address'
    ];
}
