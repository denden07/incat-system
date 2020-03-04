<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //

    protected $fillable = [
        'subjCode','title','level_id','strand_id'
    ];

    public function level()
    {
        return $this->belongsTo('App\Level','level_id');
    }

    public function strand()
    {
        return $this->belongsTo('App\Strand','strand_id');
    }
}
