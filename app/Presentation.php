<?php

namespace App;

use \Esensi\Model\Model;

class Presentation extends Model
{
	protected $rules = [
		'presentation_title' => ['required'],
		'synopsis' => ['required'],
		'conference_track' => ['required'],
	];
}