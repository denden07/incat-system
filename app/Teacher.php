<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'lastName', 'firstName', 'middleName', 'dob', 'age', 'address', 'contactNo',
        'course','yearGraduated', 'lastSchoolTeached', 'status','lastSchoolAttended',
        'award','extensionName','nso','transcript','let','prc','coe','certificates',
        'sex','religion','mothertongue','expertise','phil_health','vocational',
        'postGraduate','marital','position','employee_id','station_id','umid_id','phil_health','pag_ibig','gsis_id',
        'prc_id','date_appointed'
    ];

    public function getNameAttribute(){
        return $this->firstName . " " .$this->middleName . " " .$this->lastName . " " . $this->extensionName;
    }

    public function user()
    {
        return $this->hasOne('App\User','teacher_id');
    }
}
