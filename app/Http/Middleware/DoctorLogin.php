<?php

namespace App\Http\Middleware;

use Closure;

class DoctorLogin
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
        if(!session('doctor')){
            return redirect('doctor/login');
        }
        return $next($request);
    }
}
