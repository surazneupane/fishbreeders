<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    use HasFactory;

    protected $fillable=['title','slug','status','parent_id'];

    public function children()
    {
        return $this->hasMany(ForumCategory::class, 'parent_id');

    }
}
