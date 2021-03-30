<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ViewControl {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {

        $headerCategories = Category::where('show_in_header', "1")->where('status', '1')->orderBy('order')->get();
        $categories       = Category::where('status', '1')->orderBy('order')->get();

        View::share(compact('categories','headerCategories'));

        return $next($request);
    }
}
