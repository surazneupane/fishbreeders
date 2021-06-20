<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $user = Auth::user();
        if($user->roles->contains(1))
        {

        $posts = Post::latest();

        if(isset($request['year']) && !empty($request['year']) && $request['year']!=0)
        {
            $posts = $posts->whereYear('created_at',$request['year']);
            
        }

        if(isset($request['month']) && !empty($request['month']) && $request['month']!=0)
        {
            $posts = $posts->whereMonth('created_at',$request['month']);
        }
        if(isset($request['status']) && !empty($request['status']))
        {
            $posts = $posts->whereIn('status',$request['status']);
        }

        if(isset($request['category'])&& !empty($request['category']))
        {
            $posts  = $posts->whereHas('categories',function($q) use ($request){
                $q->whereIn('slug',$request['category']);
             });
        }


        if(isset($request['subcategory']) && !empty($request['subcategory']))
        {
            $posts  = $posts->whereHas('categories',function($q) use ($request){
                $q->whereIn('slug',$request['subcategory']);
             });
        }


        $posts =  $posts->paginate(10);
        $categories = Category::all()->where('status',1);
        $mainCategory = $categories->where('parent_id',0);
        $subCategory  = $categories->where('parent_id','>',0);


        $searchedCategory = isset($request['category']) ? $request['category'] : [];
        $searchedSubCategory = isset($request['subcategory']) ? $request['subcategory'] : [];
        $searchedYear = isset($request['year']) ? $request['year'] : null;
        $searchedMonth = isset($request['month']) ? $request['month'] : null;

        $selectedStatus = isset($request['status']) ? $request['status'] :[];


        return view('dashboard.posts.index', compact('posts','mainCategory','subCategory','searchedCategory','searchedSubCategory','searchedYear','searchedMonth','selectedStatus'));

        }
        else{
           $posts = $user->posts()->paginate(10);
         return view('dashboard.posts.index', compact('posts'));

        }
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


    public function bulkDelete(Request $request)
    {
        try{
            DB::beginTransaction();
    
           $ids = explode(',',$request->ids);
           foreach($ids as $id){
            $post = Post::findOrFail($id);
            $post->categories()->detach();
            $post->delete();
           }
           DB::commit();
           return response()->json(['success'=>"Post Deleted successfully."]);
            }
            catch(Exception $e){
                DB::rollBack();
                return response()->json(['error'=>$e->getMessage()]);
            }
    }


    public function bulkDeleteDate(Request $request)
    {   
        try{
            DB::beginTransaction();
            $posts = Post::whereBetween('created_at',[$request->from,$request->to])->get();
            foreach ($posts as $post) {
                $post->categories()->detach();
                     $post->delete();
            }
            DB::commit();

            return redirect()->back()->with('success','All Deleted Form:'.$request->from.' to:'.$request->to.' And Total Data Deleted : '.count($posts));

        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error','Opps Error Occured');
        }

    }
}
