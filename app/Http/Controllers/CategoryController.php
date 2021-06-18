<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;


use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $categories = Category::where('parent_id',0)->paginate(10);

        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request) {

        Category::create($request->except('_token'));

        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category) {
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category) {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category) {
        $category->title           = $request->title;
        $category->slug            = $request->slug;
        $category->status          = $request->status;
        $category->show_in_header  = $request->show_in_header;
        $category->show_in_footer  = $request->show_in_footer;
        $category->order           = $request->order;
        $category->post_content = $request->post_content;
        $category->save();
        return redirect()->back()->with('success','Category Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category) {
        $category->posts()->detach();
        $category->delete();
        return redirect()->back();
    }

    public function createSubCategory($id) {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.sub.create', compact('category'));
    }

    public function storeSubCategory($id, StoreSubCategoryRequest $request) {
        $request['parent_id'] = $id;
       $result = Category::create($request->except('_token'));
        return redirect(route('category.show', $id));
    }

    public function editSubCategory($id)
    {   
        $category = Category::findOrFail($id);
        return view('dashboard.categories.sub.edit', compact('category'));
        
    }

    public function updateSubCategory(UpdateSubCategoryRequest $request,$id)
    {
        $category = Category::findOrFail($id);
        $category->title           = $request->title;
        $category->slug            = $request->slug;
        $category->status          = $request->status;
        $category->show_in_header  = $request->show_in_header;
        $category->show_in_footer  = $request->show_in_footer;
        $category->order           = $request->order;
        $category->save();
        return redirect()->back()->with('success','Category Updated Sucessfully');

    }
}
