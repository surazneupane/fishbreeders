<?php

namespace App\Http\Controllers;

use App\Models\SuperSubscriberFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperSubscriberController extends Controller
{
   

    public function showSuperFeedbacks()
    {
        $subFeedbacks = SuperSubscriberFeedback::all();
        return view('dashboard.superfeedbacks.index',compact('subFeedbacks'));
    }

    public function deleteSuperFeedback($id)
    {
        $subFeedback = SuperSubscriberFeedback::findOrFail($id);
        $subFeedback->delete();
        return redirect()->back()->with('success','Deleted SUcessfully');
    }

    public function showSuperFeedback( $id)
    {
        $subFeedback = SuperSubscriberFeedback::findOrFail($id);
        return view('dashboard.superfeedbacks.show',compact('subFeedback'));
        
    }
}
