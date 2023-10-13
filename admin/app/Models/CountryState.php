<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class CountryState extends Model
{
    use HasFactory;
    protected $collection = 'country_state';

    protected $fillable = [
        '_id', 'name', 'iso2'
    ];
}