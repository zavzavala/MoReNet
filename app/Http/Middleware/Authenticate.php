<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\URL;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
           // return route('login');
           if($request->routeIs('autor.*')){

            session()->flash('fail', 'Precisa fazer o login antes.');
            
            return route('autor.login',['fail'=>true,'returnUrl'=>URL::current()]);

            //return route('autor.login');
           }
           
        }
    }
}
