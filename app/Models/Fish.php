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
}
