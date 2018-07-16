<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutcomeList extends Model
{
    //

    function outcome(){
        return $this->belongsTo('App\Outcome');
    }
}
