<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\website;
use Closure;
use Illuminate\Http\Request;

class websiteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next ,website $website)
    {
        if(auth()->user()->id === $website->user_id){
            return $next($request);
        }else{
            return abort(401);
        }
    }
}
