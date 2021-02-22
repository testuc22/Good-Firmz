<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $fillable = ['name','state_id','status'];

    

    public function state(){
        return $this->belongsTo(States::class);
    }
}
