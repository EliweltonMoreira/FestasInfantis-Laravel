<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $fillable = ['nome', 'valorAluguel', 'corDestaque'];

    public function aluguels(){
        return $this->hasMany('App\Aluguel');
    }

    public function addAluguel(Aluguel $alu){
        return $this->aluguels()->save($alu);
    }

    public function deletarAluguels(){
        foreach ($this->aluguels as $alu) {
            $alu->delete();
        }
        return true;
    }

    public function items(){
        return $this->hasMany('App\Item');
    }

    public function addItem(Item $it){
        return $this->items()->save($it);
    }

    public function deletarItems(){
        foreach ($this->items as $it) {
            $it->delete();
        }
        return true;
    }
}
