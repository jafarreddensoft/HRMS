<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class Country extends Model
{
    use HasFactory;
    protected $collection = 'country';

    protected $fillable = [
        '_id', 'name', 'code'
    ];
}
