<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compactibility extends Model
{
    use HasFactory;
    protected $fillable = ['compactible_id','compactibility'];

    public function fishes()
    {
        return $this->belongsToMany(Fish::class,'fish_compactibilities');
    }
}
