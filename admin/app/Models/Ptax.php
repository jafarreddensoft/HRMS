<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Ptax extends Model
{
    use HasFactory;
    protected $collection = 'ptax';

    protected $fillable = [
        'id', 'fromsalary', 'tosalary', 'type', 'amount'
    ];
}
