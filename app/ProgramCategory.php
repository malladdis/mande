<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramCategory extends Model
{
    //
  protected $guarded=[];

    function programs(){
       return $this->hasOne('App\Program','program_category_id');
    }
}
