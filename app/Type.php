<?php

namespace App;

use \Esensi\Model\Model;

class Type extends Model
{
	protected $rules = [
		'type' => ['required']
	];

    public function presentations() {
    	return $this->belongsToMany('App\Presentation', 'presentations_types');
    }
}
