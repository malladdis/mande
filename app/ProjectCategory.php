<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    //

    function project(){
        return $this->hasMany('App\Project');
    }
}
