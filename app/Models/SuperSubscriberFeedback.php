<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperSubscriberFeedback extends Model
{
    use HasFactory;


    protected $fillable =['user_id','email','title','feedback'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
