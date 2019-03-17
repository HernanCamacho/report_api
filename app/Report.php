<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'latitude', 'longitude', 'evidence', 'comments', 'department_id', 'user_id'
    ];
}
