<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 'description', 'type_of_department_id', 'city_council_id'
    ];
}
