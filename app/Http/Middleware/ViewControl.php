<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\SiteInfo;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $hasMessages = 0;

        if(Auth::check()){
        $rooms = User::find(Auth::id())->rooms()->get();


        foreach ($rooms as $room) {
            if ($room->messages()->whereNotIn('user_id', [Auth::id()])->where('viewed', false)->get()->count() > 0) {
                $hasMessages++;
            }
        }
    }


        View::share(compact('categories', 'headerCategories', 'siteinfo', 'footerCategories', 'hasMessages'));
        return $next($request);
    }
}
