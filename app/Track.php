<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    public function presentations() {
    	return $this->belongsToMany('App\Presentation');
    }
}
