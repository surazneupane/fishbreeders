<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\SiteInfo;
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

        $headerCategories = Category::where('show_in_header', "1")->where('status', '1')->where('parent_id', null)->orderBy('order')->get();
        $footerCategories = Category::where('show_in_footer', "1")->where('status', '1')->where('parent_id', null)->orderBy('order')->get();
        $categories       = Category::where('status', '1')->orderBy('order')->get();

        $siteinfo = SiteInfo::find(1);
        if (!$siteinfo) {
            $siteinfo = new SiteInfo();
        }

        View::share(compact('categories', 'headerCategories', 'siteinfo', 'footerCategories'));
        return $next($request);
    }
}
