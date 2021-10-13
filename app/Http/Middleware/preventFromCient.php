<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class preventFromCient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::get('_previous')['url'] === route('client.login') || Session::get('_previous')['url'] === route('client.home')) {
            return redirect()->route('client.login');
        }
        else return $next($request);
    }
}
