<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutcomeCategory extends Model
{
    //

    function outcome(){
        return $this->hasMany('App\Outcome');
    }
}
