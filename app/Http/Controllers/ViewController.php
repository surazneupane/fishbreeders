<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\StoreUserExternalRequest;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Notifiaction;
use App\Models\Post;
use App\Models\Question;
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
        if((!empty($request->all())))
        {
        if (isset($request->name)) {

            $forums = Category::where('slug', $request->name)->first()->questions;

        } else if ($request->query) {
            $forums = Question::where('title', 'like', '%' . $request['query'] . '%')->get();

        }
     } else {
   
            $forums = Question::orderBy('created_at','DESC')->get();
        }

        return view('frontend.forums', compact('forums'));
    }

    public function registerUser(StoreUserExternalRequest $request) {
        if (Auth::user()) {
            return redirect()->route('home');
        }
        $data             = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data['status']  = 1;
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
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->roles->contains(3) && Auth::attempt(['email' => $request->email, 'password' => $request->password,'status' => 1])) {
                return redirect()->route('home');
            }
        }

        return redirect()->back()->with('error', 'Invalid Email Or Password');
    }

    public function singleForum(Question $question) {
        views($question)->record();
        $views = views($question)->count();
        $answers = $question->answers()->orderBy('created_at','DESC')->get();
        return view('frontend.single-forum', compact('question', 'views','answers'));
    }


    public function askQuestion(StoreQuestionRequest $request)
    {
        try{
            $data = $request->except('category','_token');
           $data['user_id'] = Auth::id();
           $question = Question::create($data);
           $tags = array();
            foreach($request->category as $category)
            {
                $tags[]=$category;
            }
            $question->categories()->sync($tags);
            return redirect()->route('forums')->with('success','Question Posted Sucessfully');
        }
        catch(Exception $e)
        {
            return redirect(route('forums'))->with('error',$e->getMessage());
    
        }
    }

    public function giveAnswer(Request $request,$questionId)
    {
        $this->validate($request,[
            'answer' =>'required',

        ]);
        try{
            DB::beginTransaction();
          $question = Question::findOrFail($questionId);
          
          $answer = new Answer();
          $answer -> user_id = Auth::id();
          $answer -> description = $request->answer;

          $question ->answers()->save($answer);

          if($question->user_id != Auth::id()){
          $notification = new Notifiaction();

          $notification->notify_to = $question -> user_id ;
          $notification->notify_from = Auth::id();
          $notification -> message = "Answered On Yor Question";
          $question->notifications()->save($notification);
          }
          
          DB::commit();
          return redirect()->back()->with('success','Answer Posted Sucessfully');

        }
        catch(Exception $e)
        {
            dd($e);
            DB::rollBack();
          return redirect()->back()->with('error',$e->getMessage());

        }
    }
}
