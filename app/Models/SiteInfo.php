<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    protected $fillable = ['about_us','banner','banner_text','logo','small_banner_description','small_banner_text','small_banner','footer_about'];
    use HasFactory;

}
