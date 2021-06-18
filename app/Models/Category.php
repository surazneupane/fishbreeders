<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;

    protected $fillable = ['title', 'slug', 'code', 'status', 'show_in_header', 'show_in_footer', 'order','parent_id', 'deleted_at','post_content'];

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function posts() {
        return $this->belongsToMany(Post::class)->latest();
    }

    public function questions() {
        return $this->belongsToMany(Question::class, 'question_category');

    }

    public function fishes()
    {
        return $this->belongsToMany(Fish::class,'fish_category');
    }

}
