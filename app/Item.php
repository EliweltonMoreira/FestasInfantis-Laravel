<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['tema_id', 'nome', 'descricao'];

    public function tema(){
        return $this->belongsTo('App\Tema');
    }
}
