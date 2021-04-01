<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model {
    
    protected $fillable = [
        'code', 'name', 'latitude', 'longitude', 'country_code'
    ];

    protected $hidden = [];
}