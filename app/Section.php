<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //

    protected $fillable = [
        'name','year','level_id','teacher_id','strand_id','status'
    ];

    public function level()
    {
        return $this->belongsTo('App\Level','level_id');
    }

    public function adviser()
    {
        return $this->belongsTo('App\Teacher','teacher_id');
    }

    public function strand()
    {
        return $this->belongsTo('App\Strand','strand_id');
    }



    public function students()
    {
        return $this->belongsToMany('App\Student','section_student','section_id','student_id');
    }

    public function studentsCount()
    {
        return $this->belongsToMany('App\Student','section_student','section_id','student_id')->limit(1);
    }

}
