<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Http\Response;

class ViewController extends Controller {
    public function index() {
        $posts          = Post::where('status', '1')->latest()->get();
        $popularPosts   = Post::orderByViews('asc', Period::pastDays(3))->where('status', '1')->get();
        $saltWaterPosts = Category::where('title', 'saltwater fish')->first()->posts()->where('status', '1')->get();
        $freshWaterPosts = Category::where('title', 'freshwater fish')->first()->posts()->where('status', '1')->get();
        return view('frontend.index', compact('posts', 'popularPosts', 'saltWaterPosts', 'freshWaterPosts'));
    }

    public function post($slug) {
        $post = Post::where('slug', $slug)->first();
        abort_if($post == null, Response::HTTP_NOT_FOUND, 'Page Not Found');
        abort_if($post->status == '0', Response::HTTP_NOT_FOUND, 'Page Not Found');

        $expiresAt = now()->addHours(1);

        views($post)
            ->cooldown($expiresAt)
            ->record();

        $post->views = views($post)->count();
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
