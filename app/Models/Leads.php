<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;
    public $fillable = ['name','seller_id','user_id','email','company_name','phone_number','content','pincode','status'];

    public function seller(){
        return $this->belongsTo(Sellers::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
