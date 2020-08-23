<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    protected $fillable = ['cliente_id', 'tema_id', 'dataFesta', 'horarioInicio', 'horarioTermino', 'valorCobrado', 'endereco', 'complemento', 'cidade', 'uf'];

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }

    public function tema(){
        return $this->belongsTo('App\Tema');
    }
}
