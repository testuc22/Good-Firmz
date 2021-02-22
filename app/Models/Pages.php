<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;

    public $fillable = ['title','description','slug','status','featured_image','meta_title','meta_tags','meta_desc'];
}
