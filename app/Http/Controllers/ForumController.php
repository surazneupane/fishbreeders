<?php

namespace App\Http\Controllers;

use App\Models\Question;

class ForumController extends Controller {
    public function index() {
        $questions = Question::all();
        return view('dashboard.forums.index', compact('questions'));
    }
}
