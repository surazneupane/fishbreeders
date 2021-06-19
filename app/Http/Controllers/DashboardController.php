<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ForumCategory;
use App\Models\Question;
use App\Models\Answer;



use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller {
    public function index() {

        $authUserIsForum= auth()->user()->roles->contains(4);
        $forumCategories = ForumCategory::all();
        $categories= Category::all();
        $posts      = $authUserIsForum ? Question::all()->count():Post::where('status',1)->count();
        $categories = $authUserIsForum ? $forumCategories->count() :  $categories->count();
        $users      = User::all()->count();
        $views      = $authUserIsForum? Answer::all()->count() : Post::all()->sum('views');


        return view('dashboard', compact('posts', 'categories', 'users', 'views','authUserIsForum'));
    }
}
