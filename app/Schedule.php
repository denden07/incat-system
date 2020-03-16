<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //

    protected $fillable = [
      'subject_id', 'teacher_id','section_id','schedule','status','year'
    ];

}
