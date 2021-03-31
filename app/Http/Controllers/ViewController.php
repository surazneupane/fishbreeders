<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class ViewController extends Controller {
    public function index() {
        $posts = Post::where('status', '1')->orderBy('created_at', 'desc')->get();
        return view('frontend.index', compact('posts'));
    }

    public function post($slug) {
        $post = Post::where('slug', $slug)->first();
        $post->views++;
        $post->save();
        return view('frontend.post', compact('post'));
    }

    public function category($slug) {

        $category = Category::where('slug', $slug)->first();
        $posts    = $category->posts()->paginate(10);
        return view('frontend.category_post', compact('category', 'posts'));
    }
}
