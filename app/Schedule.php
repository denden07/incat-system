<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //

    protected $fillable = [
        'subject_id', 'teacher_id', 'section_id', 'schedule', 'status', 'year'
    ];


    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher','teacher_id');
    }

    public function section()
    {
        return $this->belongsTo('App\Section','section_id');
    }
}
