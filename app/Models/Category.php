<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $fillable = ['parent','name','slug','image','status','featured','meta_title','meta_tags','meta_desc'];

    public function sellers()
    {
        return $this->belongsToMany(Seller::class, 'seller_categories', 'category_id', 'seller_id');
    }

    /*public function subChildren()
	{
	  return $this->hasMany(Category::class, 'parent')->with('children');
	}

	public function children()
	{
	    return $this->hasMany(Category::class, 'parent');
	}*/

	public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id')->limit(1);
    }
    
    public function parentName()
    {
        return $this->belongsTo(Category::class, 'parent');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent');
    }
    /*public function allChildren()
    {
      return $this->children()->with('allChildren');
    }*/

}
