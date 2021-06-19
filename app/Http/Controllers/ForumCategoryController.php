<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForumCategoryRequest;
use App\Models\ForumCategory;
use App\Http\Requests\UpdateForumCategoryRequest;
use App\Http\Requests\StoreForumSubCatRequest;
use App\Http\Requests\UpdateForumSubCatRequest;



class ForumCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $forumCategories = ForumCategory::where('parent_id',0)->orderBy('created_at','DESC')->paginate(10);
        return view('dashboard.forum_categories.index',compact('forumCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.forum_categories.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForumCategoryRequest $request)
    {
        //
        ForumCategory::create($request->except('_token'));
        return redirect()->route('forumcategory.index')->with('success','Category Added Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $forumCategory = ForumCategory::findOrFail($id);
        return view('dashboard.forum_categories.show',compact('forumCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $forumCategory = ForumCategory::findOrFail($id);
        return view('dashboard.forum_categories.edit',compact('forumCategory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForumCategoryRequest $request, $id)
    {
        //
        $forumCategory = ForumCategory::findOrFail($id);
        $forumCategory->title = $request->title;
        $forumCategory->status = $request->status;
        $forumCategory->slug = $request->slug;
        $forumCategory->update();
        return redirect()->back()->with('success','Category Edited Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $forumCategory = ForumCategory::findOrFail($id);
        $forumCategory->questions()->detach();

        $forumCategory->children()->delete();
        $forumCategory->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }


    public function createSubCategory($id)
    {
       $forumCategory = ForumCategory::findOrFail($id);
       return view('dashboard.forum_categories.sub.create',compact('forumCategory'));
    }

    public function storeSubCat(StoreForumSubCatRequest $request,$id)
    {
        $request['parent_id'] = $id;
        $result = ForumCategory::create($request->except('_token'));
         return redirect(route('forumcategory.show', $id));
    }

    public function editSubCategory($id)
    {
        $category = ForumCategory::findOrFail($id);
        return view('dashboard.forum_categories.sub.edit', compact('category'));

    }


    public function updateSubCategory(UpdateForumSubCatRequest $request,$id)
    {
        $category = ForumCategory::findOrFail($id);
        $category->title           = $request->title;
        $category->slug            = $request->slug;
        $category->status          = $request->status;
        $category->save();
        return redirect()->back()->with('success','Category Updated Sucessfully');
    }
}
