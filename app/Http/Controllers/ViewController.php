<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserExternalRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Question;
use App\Models\User;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ViewController extends Controller {
    public function index() {
        $posts           = Post::where('status', '1')->latest()->get();
        $popularPosts    = Post::orderByViews('desc', Period::pastDays(3))->where('status', '1')->get();
        $saltWaterPosts  = Category::find(2)->posts()->where('status', '1')->get();
        $freshWaterPosts = Category::find(1)->posts()->where('status', '1')->get();
        $breedingPosts   = Category::find(3)->posts()->where('status', '1')->get();
        $questions       = Question::latest()->get()->take(3);

        return view('frontend.index', compact('posts', 'popularPosts', 'saltWaterPosts', 'freshWaterPosts', 'breedingPosts', 'questions'));
    }

    public function post($slug) {
        $post = Post::where('slug', $slug)->first();
        abort_if($post == null, Response::HTTP_NOT_FOUND, 'Page Not Found');
        abort_if($post->status == '0', Response::HTTP_NOT_FOUND, 'Page Not Found');

        $expiresAt = now()->addHours(1);

        views($post)->record();

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

    public function login() {
        if (Auth::user()) {
            return redirect()->route('home');
        }
        return view('frontend.login');
    }
    public function register() {
        if (Auth::user()) {
            return redirect()->route('home');
        }
        return view('frontend.register');
    }

    public function forum(Request $request) {

        if (isset($request->name)) {

            $forums = Category::where('slug', $request->name)->first()->questions;

        } else if ($request->query) {
            $forums = Question::where('title', 'like', '%' . $request['query'] . '%')->get();

        } else {
            $forums = Question::all();
        }

        return view('frontend.forums', compact('forums'));
    }

    public function registerUser(StoreUserExternalRequest $request) {
        if (Auth::user()) {
            return redirect()->route('home');
        }
        $data             = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user             = User::create($data);

        $user->roles()->attach(3);
        return redirect()->route('ext-login');
    }

    public function loginUser(Request $request) {
        if (Auth::user()) {
            return redirect()->route('home');
        }

        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if ($user->roles->contains(3) && Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'Invalid Email Or Password');
    }
}
