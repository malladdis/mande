<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramDetail extends Model
{
    //

    function program(){
        return $this->belongsTo('App\Program');
    }
}
