<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    protected $fillable = [ 'ip', 'ubication_id', 'dependence_id', 'funcionary_id' ];

    public function ubication(){
        return $this->belongsTo('App\Ubication');
    }

    public function dependence(){
        return $this->belongsTo('App\Dependence');
    }

    public function funcionary(){
        return $this->belongsTo('App\Funcionary');
    }
}
