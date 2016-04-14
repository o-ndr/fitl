<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Auth;

class ProfileController extends Controller
{
	public function __construct()
      {
        $this->middleware('auth');
      }   
	
	public function profile()
	{
		$user = Auth::user();
		$presentations = $user->presentations;
		$ratings = $user->ratings;

		return view('profile.profile',
			['presentations' => $presentations, 'ratings' => $ratings]);
	}

}
