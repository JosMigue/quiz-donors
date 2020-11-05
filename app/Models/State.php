<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = "states";
    public $timestamps = false;
  
    public function cities(){
        return $this->hasMany(City::class);
    }
  
    public function donors(){
        return $this->belongsToMany(Donor::class);
    } 
}
