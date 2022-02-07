<?php

namespace App\Http\Middleware;

use Closure;

class VerifyIsAdmin
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
        //~Check if the user is admin or writer
        if((!auth()->user()->isAdmin()) && (!auth()->user()->isWriter())) {
            return redirect()->route('welcome');
        }
        return $next($request);
    }
}
