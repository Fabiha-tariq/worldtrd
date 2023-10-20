<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class adminGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('email')){
            
            if(session()->get('role') == 3 || session()->get('role' == 4)){
                
                return $next($request);
            }
            else{
                return redirect('/dashboard');
            }
        }
        else{
            return redirect('/login');
        }

    }
}
