<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Exception;

class NotAdmin
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

        if($user_rol == 'Admin') {
            return abort(403);
        }

        return $next($request);
    }
}
