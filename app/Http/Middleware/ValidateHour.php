<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

class ValidateHour
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
        $date = Carbon::now('America/Mexico_City');
        $dateBlock = Carbon::parse('2021-03-05 20:20:20', 'America/Mexico_City');
        if($date->gte($dateBlock)) {
            return redirect()->route('coins.create');
        }
        return $next($request);
    }
}
