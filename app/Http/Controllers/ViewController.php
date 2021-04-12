<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerReplyRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\StoreUserExternalRequest;
use App\Http\Requests\UpdateExternalUserRequest;
use App\Models\Answer;
use App\Models\AnswerReply;
use App\Models\Category;
use App\Models\Fish;
use App\Models\Notifiaction;
use App\Models\Post;
use App\Models\Question;
use App\Models\SuperSubscriberFeedback;
use App\Models\User;
use CyrildeWit\EloquentViewable\Support\Period;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        if ((!empty($request->all()))) {
            if (isset($request->name)) {
                $forums = Category::where('slug', $request->name)->first()->questions()->paginate(10);
            } else if ($request->query) {
                $forums = Question::where('title', 'like', '%' . $request['query'] . '%')->paginate(10);

            }
        } else {

            $forums = Question::latest()->paginate(10);
        }

        return view('frontend.forums', compact('forums'));
    }

    public function registerUser(StoreUserExternalRequest $request) {
        if (Auth::user()) {
            return redirect()->route('home');
        }
        $data             = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data['status']   = 1;
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
        // $user = User::where('email', $request->email)->first();
        // if ($user) {
            if ( Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
                return redirect()->route('home');
            }
        // }

        return redirect()->back()->with('error', 'Invalid Email Or Password');
    }

    public function singleForum(Question $question) {

        views($question)->record();
        $views   = views($question)->count();
        $answers = $question->answers()->orderBy('created_at', 'DESC')->get();
        return view('frontend.single-forum', compact('question', 'views', 'answers'));
    }

    public function askQuestion(StoreQuestionRequest $request) {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        try {
            $data            = $request->except('category', '_token');
            $data['user_id'] = Auth::id();
            $question        = Question::create($data);
            $tags            = array();
            foreach ($request->category as $category) {
                $tags[] = $category;
            }
            $question->categories()->sync($tags);
            return redirect()->route('forums')->with('success', 'Question Posted Sucessfully');
        } catch (Exception $e) {
            return redirect(route('forums'))->with('error', $e->getMessage());

        }
    }

    public function giveAnswer(Request $request, $questionId) {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        $this->validate($request, [
            'answer' => 'required',

        ]);
        try {
            DB::beginTransaction();
            $question = Question::findOrFail($questionId);

            $answer              = new Answer();
            $answer->user_id     = Auth::id();
            $answer->description = $request->answer;

            $question->answers()->save($answer);

            if ($question->user_id != Auth::id()) {
                $notification = new Notifiaction();

                $notification->notify_to   = $question->user_id;
                $notification->notify_from = Auth::id();
                $notification->message     = "Answered On Yor Question";
                $question->notifications()->save($notification);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Answer Posted Sucessfully');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    public function profile() {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        $user = Auth::user();
        return view('frontend.profile', compact('user'));
    }

    public function updateProfile(UpdateExternalUserRequest $request, $id) {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        $user           = User::findOrFail($id);
        $user->name     = $request->name;
        $user->password = Hash::make($request->password);

        if ($request->profile_photo) {
            $image_name               = time() . "-" . $request->profile_photo->getClientOriginalName();
            $images                   = $request->profile_photo->storeAs('profile-photos', $image_name, 'public');
            $user->profile_photo_path = $images;
        }
        $user->update();

        Auth::login($user, true);

        return redirect()->back()->with('message', 'Updated Sucessfully');

    }

    public function deleteANswer($id) {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        $answer   = Answer::findOrFail($id);
        $question = $answer->question()->first();
        if (Auth::id() == $question->user_id) {
            $associatedNotification = $question->notifications()->where('notifiable_id',$question->id)->where('notify_to', Auth::id())->where('notify_from', $answer->user_id)->first();

        } else {
            $associatedNotification = $question->notifications()->where('notifiable_id',$question->id)->where('notify_to', $question->user_id)->where('notify_from', Auth::id())->first();
        }
        if (!empty($associatedNotification)) {
            $associatedNotification->delete();
        }

        $answer->replies()->delete();
        $answer->delete();
        return redirect()->back()->with('success', 'Answer Deleted Sucessfully');
    }

    public function myQuestions() {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        $questions = Auth::user()->questions;
        return view('frontend.myquestions', compact('questions'));
    }

    public function deleteQuestion($id) {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        $question = Question::findOrFail($id);
      
        $question->notifications()->where('notifiable_id', $question->id)->delete();
        $question->delete();
        return redirect()->back()->with('success', 'Question Deleted Sucessfully');
    }

    public function editQuestion(Request $request, $id) {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        $question              = Question::findOrFail($id);
        $question->title       = $request->title;
        $question->description = $request->description;
        $tags                  = [];
        foreach ($request->category as $category) {
            $tags[] = $category;
        }
        $question->categories()->sync($tags);
        $question->update();
        return redirect()->back()->with('success', 'Updated Sucessfully');

    }

    public function notificationShow($notiId) {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        $notification         = Notifiaction::findOrFail($notiId);
        $notification->status = 1;
        $question             = Question::findOrFail($notification->notifiable_id);
        $notification->update();
        return $this->singleForum($question);

    }

    public function search(Request $request) {
        $posts  = Post::where('title', 'like', '%' . $request['search'] . '%')->get();
        $search = $request['search'];
        return view('frontend.search_post', compact('posts', 'search'));
    }

    public function calculator() {
        return view('frontend.calculator');
    }

    public function fish_compactibilities() {
        return view('frontend.fish-compactibility');
    }

    public function fish_check(Category $category, Request $request) {

        $fishes = Fish::whereIn('id', $request->fishes)->get();

        $compactibility = [];

        foreach ($fishes as $key => $fish) {
            $compactibility[$key] = [];
            foreach ($fishes as $selectedFish) {
                $compactibility[$key] = [...$compactibility[$key], $fish->compactibilities()->where('compactible_fish_id', $selectedFish->id)->first()];
            }
        }

        // dd($compactibility[0][0]->compactibility);

        return view('frontend.fish-compactibility', compact('fishes', 'category'));

    }


    public function giveSuperFeedback(Request $request)
    {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        $data = $request->except('_token');
        $data['user_id'] = Auth::id();
        SuperSubscriberFeedback::create($data);
        return redirect()->back();
    }



    public function replyAnswer(AnswerReplyRequest $request,$id)
    {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
       $answer =Answer::findOrFail($id);
       $reply = new AnswerReply;
       $reply->description = $request->reply;
       $reply->user_id = Auth::id();
       $answer->replies()->save($reply);
     
       if ($answer->user_id != Auth::id()) {
        $notification = new Notifiaction();

        $notification->notify_to   = $answer->user_id;
        $notification->notify_from = Auth::id();
        $notification->message     = "Replied On Yor Answer";
        $answer->notifications()->save($notification);
    }


       return redirect()->back()->with('success','Reply Added Sucessfully');

    }

    public function deleteReply($id)
    {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        $reply = AnswerReply::findOrFail($id);
        $answer = $reply->answer()->first();
        if (Auth::id() == $answer->user_id) {
            $associatedNotification = $answer->notifications()->where('notifiable_id',$answer->id)->where('notify_to', Auth::id())->where('notify_from', $answer->user_id)->first();

        } else {
            $associatedNotification = $answer->notifications()->where('notifiable_id',$answer->id)->where('notify_to', $answer->user_id)->where('notify_from', Auth::id())->first();
        }
        if (!empty($associatedNotification)) {
            $associatedNotification->delete();
        }
        $reply->delete();
        return redirect()->back()->with('success','Reply Deleted Sucessfully');

    }

    public function replyNotificationShow($id)
    {
        if (!Auth::user()) {
            return redirect()->route('home');
        }
        $notification         = Notifiaction::findOrFail($id);
        $notification->status = 1;
        $answer             = Answer::findOrFail($notification->notifiable_id);
        $question = $answer->question()->first();
        $notification->update();
        return $this->singleForum($question);
    }




}
