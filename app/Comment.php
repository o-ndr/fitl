<?php

namespace App;

use \Esensi\Model\Model;

class Comment extends Model
{
    protected $rules = [
    	'presentation_id' => ['required'],
    	'comment_by_reviewer' => ['required']
    ];
}
