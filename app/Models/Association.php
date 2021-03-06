<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Association extends Model {
    
    protected $fillable = [
        'airport_id', 'airline_id'
    ];

    protected $hidden = [];
}