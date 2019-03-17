<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEmployee extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'worker_number', 'password', 'img_profile', 'checked', 'department_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
