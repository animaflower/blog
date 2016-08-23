<?php

namespace App\Http\Middleware;

use Closure;

class VisitCount
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
        $response=$next($request);
        \App\Models\visit_count::create(['ip'=>$request->getClientIp()]);
        return $response;
    }
}
