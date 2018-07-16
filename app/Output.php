<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    //


    function outputCategory(){
        return $this->hasMany('App\OutputCategory');
    }
}
