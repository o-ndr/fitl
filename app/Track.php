<?php

namespace App;

use \Esensi\Model\Model;

class Track extends Model
{
	protected $rules = [
		'track' => ['required']
	];
	
    public function presentations() {
		return $this->belongsToMany('App\Presentation', 'presentations_tracks');
	}
}
