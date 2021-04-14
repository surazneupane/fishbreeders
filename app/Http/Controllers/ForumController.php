<?php

namespace App\Http\Controllers;

use App\Models\Question;

class ForumController extends Controller {
    public function index() {
        $questions = Question::paginate(1);
        return view('dashboard.forums.index', compact('questions'));
    }
}
