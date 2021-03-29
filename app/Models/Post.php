<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;

    protected $fillable = ['title', 'sub_title', 'slug', 'content', 'featured_image', 'excerpt', 'author', 'tag', 'status', 'location', 'views', 'share', 'seo_title', 'seo_description', 'seo_keywords', 'user_id', 'deleted_at'];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getPostedDateAttribute() {
        return $this->created_at->diffForHumans();
    }
}
