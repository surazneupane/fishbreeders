<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller {
    public function index() {
        $questions = Question::latest()->paginate(10);
        return view('dashboard.forums.index', compact('questions'));
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
