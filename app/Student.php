<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable =[
        'lastName','firstName', 'middleName','extName','dob','sex',
        'age','religion','indigenous','mothertongue','lrnStatus',
        'lrnNo','psaNo','schoolYear1','schoolYear21','address','fatherName',
        'motherName','guardianName','parentCpNo','parentTpNo','lastGrade',
        'lastSchoolYear','lastSchoolId','lastSchool','lastSchoolAddress',
        'gradeLevel','semester','track','strand','status','	yearGraduate',
        'houseNumber','street','barangay','municipality','province','country','zip'

    ];

    public function level(){
        return $this->belongsTo('App\Level','gradeLevel');
    }

    public function getNameAttribute(){
        return $this->firstName . " " .$this->middleName . " " .$this->lastName . " " . $this->extName;
    }

    public function section()
    {
        return $this->belongsToMany('App\Section','section_student','student_id','section_id')->latest()->limit(1);
    }


    public function strand()
    {
        return $this->belongsTo('App\Strand','strand');
    }

}
