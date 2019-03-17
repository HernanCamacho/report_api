<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityCouncil extends Model
{
    protected $fillable = [
        'name', 'state_id'
    ];
}
