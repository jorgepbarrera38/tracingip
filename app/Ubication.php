<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{
    protected $fillable = [ 'name', 'slug' ];

    public function ips(){
        return $this->hasMany('App\Ip');
    }
}
