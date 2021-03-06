<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Exception;

class NotGuest
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
        try {
            $user_rol = auth()->user()->role;
        }
        catch(Exception $e){
            $user_rol = null;
        }

        if($user_rol == null) {
            return redirect()->route('auth.register');
        }

        return $next($request);
    }
}
