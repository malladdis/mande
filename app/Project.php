<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    public function program(){
        return $this->belongsTo('App\Program');
    }

    function outcome(){
        return $this->hasMany('App\Outcome');
    }

    function projectCategory(){
        return $this->belongsTo('App\ProjectCategory');
    }
}
