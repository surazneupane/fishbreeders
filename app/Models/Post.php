<?php

namespace App\Models;

use Exception;
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

    public function getPreviousPostAttribute() {
        try {
            $post = Post::findOrFail($this->id - 1);
            return $post;

        } catch (Exception $e) {
            return null;
        }
    }

    public function getNextPostAttribute() {
        try {
            $post = Post::findOrFail($this->id + 1);
            return $post;

        } catch (Exception $e) {
            return null;
        }
    }

    public function getRelatedPostAttribute() {
        return $this->categories()->first()->posts->except($this->id)->take(4);
    }
}
