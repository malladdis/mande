<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    //

    function project(){
        return $this->belongsTo('App\Project');
    }

    function outComeCategory(){
        return $this->belongsTo('App\OutcomeCategory');
    }
    function outcomeList(){
        return $this->hasMany('App\OutcomeList');
    }
}
