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

    ];
}
