<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model {
    
    protected $fillable = [
        'code', 'name', 'country_code'
    ];

    protected $hidden = [];
}