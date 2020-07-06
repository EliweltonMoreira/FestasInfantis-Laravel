<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['nome', 'descricao'];

    public function tema(){
        return $this->belongsTo('App\Tema');
    }
}
