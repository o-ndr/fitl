<?php

namespace App;

use \Esensi\Model\Model;

class Presentation extends Model
{
	protected $rules = [
		'presentation_title' => ['required'],
		'synopsis' => ['required'],
	];

	// access ratings, e.g., using $presentation->ratings
	public function ratings() {
		return $this->hasMany('App\Ratings')->orderBy('created_at', 'desc');
	}
}