<?php

namespace App;

use \Esensi\Model\Model;

use Auth;

class Presentation extends Model
{
	protected $rules = [
		'presentation_title' => ['required'],
		'synopsis' => ['required'],
	];

	// access ratings, e.g., using $presentation->ratings
	// this is the Ratings relationship in the Presentation model...
	// ..meaning: this presentation has many ratings  
	public function ratings() {
		return $this->hasMany('App\Ratings')->orderBy('created_at', 'desc');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function types() {
		return $this->belongsToMany('App\Type', 'presentations_types');
	}

	public function canEdit()
	{
		if ( ! Auth::check() ) {
			return false;
		}

		// if this is the active user's object
		// they CAN edit it!
		if ( Auth::user()->id == $this->user_id) {
			return true;
		}

		// by default, can't edit
		return false;
	}
}