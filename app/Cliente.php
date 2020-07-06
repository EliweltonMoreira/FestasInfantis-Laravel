<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome', 'telefone'];

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
}
