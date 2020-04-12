<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //

    protected $fillable = [
        'first','second','third','fourth','final','student_id','subject_id','teacher_id','year','semester','sy','subject_related'
    ];

    public function student()
    {
        return $this->belongsTo('App\Student','student_id');
    }

    public function schedule()
    {
        return $this->belongsTo('App\Schedule','subject_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject','subject_id');
    }
}
