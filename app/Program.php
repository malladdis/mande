<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //

    function programCategory(){
       return $this->belongsTo('App\ProgramCategory','id');
    }

    function programDetail(){
        return $this->hasOne('App\ProgramDetail');
    }

    public function project(){
        return $this->hasMany('App\Project');
    }
}
