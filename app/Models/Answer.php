<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['description','user_id'];
 
    protected static function boot() {
        parent::boot();
    
        static::deleting(function($answer) {
            $answer->notifications()->where('notifiable_id',$answer->id)->delete();
              $answer->replies()->delete();
        });
    }

    
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
   
    public function votes()
    {
        return $this->morphMany(Vote::class,'vote');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function replies()
    {
        return $this->hasMany(AnswerReply::class);
    }

    public function notifications()
    {
        return $this->morphMany(Notifiaction::class,'notifiable');

    }
}
