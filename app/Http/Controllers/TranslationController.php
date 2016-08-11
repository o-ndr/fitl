<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;


class TranslationController extends Controller
{
    public function changeLocale(Request $request)
	{
	    $this->validate($request, ['locale' => 'required|in:fr,en']);

	    \Session::put('locale', $request->locale);

	    return redirect()->back();
	}
}

// Source of this language controller code: 
// ttp://www.glutendesign.com/posts/detect-and-change-language-on-the-fly-with-laravel

