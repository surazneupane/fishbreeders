<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = Auth::user();
        if($user->roles->contains(1))
        {
        $posts = Post::latest()->paginate(10);
        }
        else{
           $posts = $user->posts()->paginate(10);
        }
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::where('parent_id',0)->get();
        $subCategories = Category::where('parent_id','>',0)->get();
        return view('dashboard.posts.create', compact('categories','subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request) {
        $image_name             = time() . "-" . $request->featured_image->getClientOriginalName();
        $images                 = $request->featured_image->storeAs('images', $image_name, 'public');
        $data                   = $request->except('category', '_token', 'featured_image');
        $data['featured_image'] = "/storage/" . $images;
        $data['user_id']        = Auth::user()->id;
        $data['sub_title']      = "";
        $post                   = Post::create($data);
        foreach ($request->category as $category) {
            $post->categories()->attach($category);
        }
        if(!empty($request->subcategory)){
        foreach ($request->subcategory as $sub) {
            $post->categories()->attach($sub);
        }
    }
        $message = Auth::user()->roles->contains(1) ? "Post Added Sucessfully" : "Thank You for posting! An Admin will review your post before it will be approved and published.";

        return redirect()->route('posts.index')->with('success',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        if(Auth::user()->roles->contains(1))
        {
        $categories = Category::where('parent_id',0)->get();
        $subCategories = Category::where('parent_id','>',0)->get();

        return view('dashboard.posts.edit', compact('post', 'categories','subCategories'));
        }
        else{
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post) {
        $data = $request->except('category', '_token', 'featured_image');
        if ($request->has('featured_image')) {
            $image_name             = time() . "-" . $request->featured_image->getClientOriginalName();
            $images                 = $request->featured_image->storeAs('images', $image_name, 'public');
            $data['featured_image'] = "/storage/" . $images;
            $data['user_id']        = Auth::user()->id;

        }
          $data['sub_title']   = "";
        $post->fill($data);
        $post->save();
        $post->categories()->detach();
        foreach ($request->category as $category) {
            $post->categories()->attach($category);
        }
        if(!empty($request->subcategory)){

        foreach ($request->subcategory as $sub) {
            $post->categories()->attach($sub);
        }
    }
        return redirect(route('posts.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        $post->categories()->detach();
        $post->delete();
        return redirect()->back();
    }
}
