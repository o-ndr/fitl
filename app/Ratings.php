<?php

namespace App;

use \Esensi\Model\Model;

class Ratings extends Model
{
    protected $rules = [
    	'presentation_id' => ['required'],
    	'rating_by_reviewer' => ['required']
    ];
}
