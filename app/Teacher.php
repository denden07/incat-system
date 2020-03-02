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
        'sex','religion','mothertongue','expertise'
    ];

    public function getNameAttribute(){
        return $this->firstName . " " .$this->middleName . " " .$this->lastName . " " . $this->extensionName;
    }
}
