<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerReviews extends Model
{
    use HasFactory;
    public $fillable = ['seller_id','user_id','name','email','phone_number','review','stars','status'];

    public function seller(){
    	return $this->belongsTo(Sellers::class,'seller_id');
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
