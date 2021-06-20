<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ForumCategory;

class ForumController extends Controller {
    public function index(Request $request) {

        $questions = Question::latest();
        if(isset($request['year']) && !empty($request['year']) && $request['year']!=0)
        {
            $questions = $questions->whereYear('created_at',$request['year']);
            
        }

        if(isset($request['month']) && !empty($request['month']) && $request['month']!=0)
        {
            $questions = $questions->whereMonth('created_at',$request['month']);
        }
        if(isset($request['status']) && !empty($request->status))
        {
            $questions = $questions->whereIn('status',$request['status']);
        }

        if(isset($request['category'])&& !empty($request['category']))
        {
            $questions  = $questions->whereHas('categories',function($q) use ($request){
                $q->whereIn('slug',$request['category']);
             });
        }


        if(isset($request['subcategory']) && !empty($request['subcategory']))
        {
            $questions  = $questions->whereHas('categories',function($q) use ($request){
                $q->whereIn('slug',$request['subcategory']);
             });
        }

        $questions=$questions->paginate(10);
        $forumCategories = ForumCategory::all()->where('status',1);
        $forumMainCat = $forumCategories->where('parent_id',0);
        $forumSubCat  = $forumCategories->where('parent_id','>',0);

        $searchedCategory = isset($request['category']) ? $request['category'] : [];
        $searchedSubCategory = isset($request['subcategory']) ? $request['subcategory'] : [];
        $searchedYear = isset($request['year']) ? $request['year'] : null;
        $searchedMonth = isset($request['month']) ? $request['month'] : null;

        $selectedStatus = isset($request['status']) ? $request['status'] :[];


 
         return view('dashboard.forums.index', compact('questions','forumMainCat','forumSubCat','searchedCategory','searchedSubCategory','searchedYear','searchedMonth','selectedStatus'));
    }


    public function bulkDelete(Request $request)
    {
        try{
        DB::beginTransaction();

       $ids = explode(',',$request->ids);
       foreach($ids as $id){
        $question = Question::findOrFail($id);
        $question -> categories()->detach();
        $question->notifications()->delete();
        $question->answers()->delete();
        $question -> delete();
       }
       DB::commit();
       return response()->json(['success'=>"Questions Deleted successfully."]);
        }
        catch(Exception $e){
            DB::rollBack();
            return response()->json(['error'=>$e->getMessage()]);
        }
    }


    public function  bulkDeleteDate(Request $request)
    {
        try{
            DB::beginTransaction();
            $questions = Question::whereBetween('created_at',[$request->from,$request->to])->get();
            foreach ($questions as $question) {
                $question -> categories()->detach();
                $question->notifications()->delete();
                $question->answers()->delete();
                $question -> delete();
            }
            DB::commit();

            return redirect()->back()->with('success','All Deleted Form:'.$request->from.' to:'.$request->to.' And Total Data Deleted : '.count($questions));

        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error','Opps Error Occured');
        }
    }
}
