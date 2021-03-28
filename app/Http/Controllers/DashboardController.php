<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class DashboardController extends Controller {
    public function index() {

        $posts      = Post::all()->count();
        $categories = Category::all()->count();
        $users      = User::all()->count();

        return view('dashboard', compact('posts', 'categories', 'users'));
    }
}
