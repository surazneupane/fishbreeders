<?php

namespace App\Http\Controllers;

use App\Events\CheckChatRooms;
use App\Events\NewChatMessage;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller {
    public function index() {
        if (!Auth::check()) {
            return redirect()->route('ext-login');
        }
        return view('frontend.chat');
    }
    public function rooms() {
        $rooms = User::find(Auth::id())->rooms()->with('users')->get();

        if (Auth::check()) {

            foreach ($rooms as $room) {
                if ($room->messages()->whereNotIn('user_id', [Auth::id()])->where('viewed', false)->get()->count() > 0) {
                    $room['unviewed'] = true;
                }
            }
        }
        return $rooms;
    }

    public function messages(ChatRoom $chatRoom) {
        $messages = $chatRoom->messages()->with('user')->latest()->get();

        $unviewed = $chatRoom->messages()->whereNotIn('user_id', [Auth::id()])->where('viewed', false)->get();

        foreach ($unviewed as $view) {
            $view->viewed = true;
            $view->save();
        }

        return $messages;
    }

    public function newMessage(ChatRoom $chatRoom, Request $request) {
        $newMessage = ChatMessage::create([
            'chat_room_id' => $chatRoom->id,
            'user_id'      => Auth::id(),
            'message'      => $request->message,
        ]);

        broadcast(new NewChatMessage($newMessage))->toOthers();
        broadcast(new CheckChatRooms())->toOthers();
        return $newMessage;
    }
    public function searchUser(Request $request) {

        $users = User::where('name', 'like', '%' . $request['query'] . "%")->whereNotIn('id', [Auth::id()])->get();

        $searchedUser = array();

        foreach ($users as $user) {
            $searchedUser = [...$searchedUser, ["label" => $user->name, "code" => $user->id, "image" => $user->profile_photo_url]];
        }

        return $searchedUser;

    }

    public function createRoom(Request $request) {
        $room = ChatRoom::create(["name" => $request->name]);
        foreach ($request->users as $user) {
            $room->users()->attach($user["code"]);
        }
        $room->users()->attach(Auth::id());
        ChatMessage::create(["user_id" => Auth::id(), "chat_room_id" => $room->id, "message" => $request->message]);
        return $room;
    }
    public function getUsers(ChatRoom $chatRoom) {
        return $chatRoom->users()->with('roles')->get();
    }
    public function addUsers(ChatRoom $chatRoom, Request $request) {
        foreach ($request->users as $user) {
            if (!$chatRoom->users->contains($user['code'])) {
                $chatRoom->users()->attach($user["code"]);
            }
        }
        return $chatRoom->users;
    }
    public function leaveUser(ChatRoom $chatRoom, User $user) {
        $chatRoom->users()->detach($user->id);
    }
}
