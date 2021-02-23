<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sellers extends Model{
    use HasFactory;

    public $fillable = ['name','type','user_id','desc','slug','email','password','logo','address1','phone_number','status','state_id','city_id','pincode','meta_title','meta_tags','meta_desc','featured'];

    protected $hidden = [
        'password',
    ];

    public function categories(){
        return $this->belongsToMany(Category::class, 'seller_categories', 'seller_id', 'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function state(){
        return $this->belongsTo(States::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function reviews(){
        return $this->hasMany(SellerReviews::class,'seller_id','id')->where('status',1);
    }
    public function seller_reviews(){ // only for seller dashboard to show all reviews
        return $this->hasMany(SellerReviews::class,'seller_id','id');
    }

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }

}
