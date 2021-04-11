<?php

namespace App\Http\Middleware;

use App\Models\SiteInfo;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CheckAuth {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {

        if (Auth::check()) {
            if ((Auth::user()->roles->contains(3))) {
                
                return redirect()->route('home');
            }
        }

      

        return $next($request);
    }
}
