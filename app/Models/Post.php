<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Viewable {
    use HasFactory;
    use InteractsWithViews;

    protected $fillable = ['title', 'slug', 'content', 'featured_image', 'excerpt', 'tag', 'status', 'location', 'views', 'share', 'user_id', 'deleted_at', 'refrence', 'breeding'];

    public function categories() {
        return $this->belongsToMany(Category::class)->where('parent_id',0);
    }

    public function subCategories() {
        return $this->belongsToMany(Category::class)->where('parent_id','>',0);
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
        return $this->categories()->first()->posts->except($this->id)->where('status', '1')->take(4);
    }
}
