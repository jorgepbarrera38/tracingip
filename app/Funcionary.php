<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionary extends Model
{
    protected $fillable = [ 'name', 'slug' ];

    public function ip(){
        return $this->hasOne('App\Ip');
    }
}
