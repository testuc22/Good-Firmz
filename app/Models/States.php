<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;

    public $fillable = ['name','status'];

    public function cities(){
        return $this->hasMany(City::class);
    }

}
