<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerReply extends Model
{
    use HasFactory;

    protected $fillable = ['description','user_id','answer_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }


    public function votes()
    {
        return $this->morphMany(Vote::class,'vote');
    }

}
