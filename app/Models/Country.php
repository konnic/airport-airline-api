<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
    
    protected $fillable = [
        'code', 'name'
    ];

    protected $hidden = [];

    protected $primaryKey = 'code';
    public $incrementing = false;
}