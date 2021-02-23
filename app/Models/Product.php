<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['seller_id','featured_image','name','slug','price','desc','specifications','status','featured','meta_title','meta_tags','meta_desc','created_at','updated_at'];

    public function categories(){
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }
    public function images(){
        return $this->hasMany(ProductImages::class);
    }
}
