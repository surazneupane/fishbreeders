<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['description','user_id'];
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
}
