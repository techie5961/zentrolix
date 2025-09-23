<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UsersAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        return  response()->view('maintenance');
        if(Auth::guard('users')->check()){
            if(Auth::guard('users')->user()->status == 'active'){
                return redirect('users/dashboard');
            }
        }
        return $next($request);
    }
}
