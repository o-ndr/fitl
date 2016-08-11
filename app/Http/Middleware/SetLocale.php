<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            $locale = Session::get('locale', Config::get('app.locale'));
        } else {
            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

            if ($locale != 'fr' && $locale != 'en') {
                $locale = 'en';
            }
        }

        App::setLocale($locale);

        return $next($request);
    }
}


// Source of this middleware:
// http://www.glutendesign.com/posts/detect-and-change-language-on-the-fly-with-laravel
