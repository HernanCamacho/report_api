<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'latitude', 'longitude', 'evidence', 'comments', 'department_id', 'user_id', 'status_id'
    ];

    public function rpAttended(){
        return $this->hasOne(ReportAttended::class);
    }

}
