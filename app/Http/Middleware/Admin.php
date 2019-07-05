<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;


class Admin
{

    public function handle($request, Closure $next)
    {

        if(!Auth::user()->admin)
        {
            Session::flash('info','You do not have enough permissions to perform this action');
            return redirect()->back();
        }
        return $next($request);

    }
}
