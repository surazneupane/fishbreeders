<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model {
    use HasFactory;

    protected $fillable = ['user_id', 'chat_room_id', 'message'];

    public function room() {
        return $this->hasOne(ChatRoom::class);
    }

    public function users() {
        return $this->hasOne(User::class);
    }

}
