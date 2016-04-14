<?php

namespace App;

use \Esensi\Model\Model;

use Auth;

class Ratings extends Model
{
    protected $rules = [
    	'presentation_id' => ['required'],
    	'rating_by_reviewer' => ['required']
    ];

    public function user() {
		return $this->belongsTo('App\User');
	}

	public function presentation() {
		return $this->belongsTo('App\Presentation');
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
