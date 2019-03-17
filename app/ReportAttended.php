<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportAttended extends Model
{
    protected $fillable = [
        'evidence', 'comments', 'report_id', 'user_employee_id'
    ];
}
