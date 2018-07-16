<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutputCategory extends Model
{
    //

    function output(){
        return $this->hasMany('App\Output');
    }
}
