<?php

namespace App\Http\Middleware;

use Session;
use Config;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CheckLocale
{
    protected $except = [
        //
        'adm', 'login', 'home'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (Session::has('locale')) {
            $locale = Session::get('locale', Config::get('app.locale'));
        } else {
            $locale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);

            if ($locale != 'en' && $locale != 'it') {
                $locale = 'es';
            }
        }

        App::setLocale($locale);

        return $next($request);

       // if(\App::getLocale() == 'es'){
        //    dd('normal');
        //}else{
         //   $set = $request->locale;
           // dd($set);
         //   \App::setLocale($set);
       // }

        //return $next($request);
    }
}
