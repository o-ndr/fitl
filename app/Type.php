<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function presentations() {
    	return $this->belongsToMany('App\Presentation', 'presentations_types');
    }
}
