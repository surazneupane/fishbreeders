<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ChatController extends Controller {
    public function index() {
        if (!Auth::check()) {
            return redirect()->route('ext-login');
        }

        return view('frontend.chat');
    }
}
