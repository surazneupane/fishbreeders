<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model {
    use HasFactory;

    protected $fillable = ['name'];

    public function users() {
        return $this->belongsToMany(User::class, "user_chat_room", "chat_room_id", "user_id")->with('roles');
    }

    public function messages() {
        return $this->hasMany(ChatMessage::class);
    }
}
