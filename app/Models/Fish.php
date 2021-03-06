<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    use HasFactory;

    protected $fillable = ['name','category'];

    public function compactibilities()
    {
        return $this->belongsToMany(Compactibility::class,'fish_compactibilities','fish_id','compactibility_id');
    }

    public function reverseCompactibilities()
    {
        return $this->belongsToMany(Compactibility::class,'fish_compactibilities','compactible_fish_id','compactibility_id');
    }


   

    public function categories()
    {
        return $this->belongsToMany(Category::class,'fish_category');
    }
}
