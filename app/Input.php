<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $guarded = [];
    public function input_lists() {
        return $this->hasMany(InputList::class);
    }
}
