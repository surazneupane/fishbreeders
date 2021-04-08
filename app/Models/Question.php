<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model implements Viewable {

    use InteractsWithViews;
    protected $fillable = ['title', 'description', 'user_id'];
    use HasFactory;

    // delete all answers when question is deleted
    public static function boot() {
        parent::boot();

        static::deleting(function ($question) {
            $question->answers()->delete();
        });
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'question_category');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->morphMany(Vote::class,'vote');
    }
}
