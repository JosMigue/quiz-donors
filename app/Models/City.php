<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities'; 
    public $timestamps = false;
  
    public function state(){
      return $this->hasOne('App\State');
    }
}
