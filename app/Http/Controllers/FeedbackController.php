<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    //

    public function addFeedback(Request $request)
    {
        $data = $request->except('_token');
        if(Auth::check())
        {
        $data['user_id'] = Auth::id();
        }
        Feedback::create($data);
        return redirect()->back();
    }


    public function showFeedbacks()
    {
       $feedbacks = Feedback::all();
       return view('dashboard.feedbacks.index',compact('feedbacks'));
    }

   public function  showFeedback(Feedback $feedback)
   {
    return view('dashboard.feedbacks.show',compact('feedback'));
   }

    public function deleteFeedback($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->back();
    }

}
