<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['seller_id','featured_image','name','slug','price','desc','specifications','status','featured','meta_title','meta_tags','meta_desc','created_at','updated_at'];

    public function categories(){
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }
    public function images(){
        return $this->hasOne(ProductImages::class);
    }

    public function productMetas(){
        return $this->hasMany(ProductMeta::class);
    }

    public function seller() {
        return $this->belongsTo(Sellers::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
}
