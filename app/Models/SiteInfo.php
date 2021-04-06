<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    protected $fillable = ['about_us','banner','banner_text','logo'];
    use HasFactory;

}
