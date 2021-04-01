<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Response;

class ViewController extends Controller {
    public function index() {
        $posts = Post::where('status', '1')->latest()->get();
        return view('frontend.index', compact('posts'));
    }

    public function post($slug) {
        $post = Post::where('slug', $slug)->first();
        abort_if($post == null, Response::HTTP_NOT_FOUND, 'Page Not Found');
        abort_if($post->status == '0', Response::HTTP_NOT_FOUND, 'Page Not Found');
        $post->views++;
        $post->save();
        return view('frontend.post', compact('post'));
    }

    public function category($slug) {
        $category = Category::where('slug', $slug)->first();
        abort_if($category == null, Response::HTTP_NOT_FOUND, 'Page Not Found');
        abort_if($category->status == '0', Response::HTTP_NOT_FOUND, 'Page Not Found');
        $posts = $category->posts()->where('status', '1')->paginate(20);
        return view('frontend.category_post', compact('category', 'posts'));
    }
}
