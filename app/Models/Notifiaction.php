<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifiaction extends Model
{
    use HasFactory;

    protected $fillable = ['notify_to','notify_from','status','message'];

    public function notifiable()
    {
        return $this->morphTo();
    }
    public function notificationFrom()
    {
        return $this->belongsTo(User::class,'notify_from','id');
    }

    
}
