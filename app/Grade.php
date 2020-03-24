<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //

    protected $fillable = [
        'first','second','third','fourth','final','student_id','subject_id','teacher_id'
    ];

    public function student()
    {
        return $this->belongsTo('App\Student','student_id');
    }
}
