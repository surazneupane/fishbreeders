<?php

namespace App\Http\Controllers;

use App\Models\Post;

class ViewController extends Controller {
    public function index() {
        $posts = Post::where('status', '1')->orderBy('created_at', 'desc')->get();
        return view('frontend.index', compact('posts'));
    }

    public function post($slug) {
        $post = Post::where('slug', $slug)->first();
        return view('frontend.post', compact('post'));
    }
}
