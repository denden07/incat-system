<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //


    protected $fillable = [
        'sy','sem','active','firstQ','secondQ','thirdQ','fourthQ','firstS','secondS','status'
    ];


}
