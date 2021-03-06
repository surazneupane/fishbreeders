<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model {
    use HasFactory;

    protected $fillable = ['user_id', 'chat_room_id', 'message', 'viewed'];

    public function room() {
        return $this->hasOne(ChatRoom::class);
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id')->with('roles');
    }

}
