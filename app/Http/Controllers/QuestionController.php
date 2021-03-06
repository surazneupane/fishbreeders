<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Models\Category;
use App\Models\ForumCategory;

use App\Models\Question;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class QuestionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $forumCatgeoires = ForumCategory::all()->where('status',1);
        $subCategories = $forumCatgeoires->where('parent_id','>',0);
        $categories = $forumCatgeoires->where('parent_id',0);
        return view('dashboard.forums.questions.create', compact('categories','subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request) {
        //
      try{
        $data = $request->except('category','_token');
       $data['user_id'] = Auth::id();
       $question = Question::create($data);
       $tags = array();
        foreach($request->category as $category)
        {
            $tags[]=$category;
        }
        if(!empty($request->subcategory)){
        foreach($request->subcategory as $category)
        {
            $tags[]=$category;
        }
    }
        $question->categories()->sync($tags);
        return redirect()->route('forums.index')->with('success','Question Posted Sucessfully');
    }
    catch(Exception $e)
    {
        return redirect(route('forums.index'))->with('error',$e->getMessage());

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question) {
        //
        $answers = $question->answers()->get();
        return view('dashboard.forums.questions.show',compact('question','answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        $forumCatgeoires = ForumCategory::all()->where('status',1);
        $subCategories = $forumCatgeoires->where('parent_id','>',0);
        $categories = $forumCatgeoires->where('parent_id',0);
        $question = Question::findOrFail($id);
        return view('dashboard.forums.questions.edit',compact('question','categories','subCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuestionRequest $request, $id) {
        //
        $question = Question::findOrFail($id);
          try{
            $data = $request->except('category','_token');
            $question->update($data);
           
           $tags = array();
            foreach($request->category as $category)
            {
                $tags[]=$category;
            }

            if(!empty($request->subcategory))
            {
                foreach($request->subcategory as $category)
                {
                    $tags[]=$category;
                }
            }
            $question->categories()->sync($tags);
            return redirect()->route('forums.index')->with('success','Question Updated Sucessfully');
        }
        catch(Exception $e)
        {
            return redirect(route('forums.index'))->with('error',$e->getMessage());
    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        try{
        $question = Question::findOrFail($id);
        $question -> categories()->detach();
        $question->notifications()->delete();
        $question->answers()->delete();
        $question -> delete();
        return redirect()->back()->with('success','Question Deleted Sucessfully');
        
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
