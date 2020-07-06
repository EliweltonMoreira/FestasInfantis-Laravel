<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AluguelController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function adicionar($id){
        $cliente = \App\Cliente::find($id);
        $temas = \App\Tema::all();
        return view('aluguel.adicionar', compact('cliente', 'temas'));
    }

    public function salvar(Request $request, $id){
        $aluguel = new \App\Aluguel;
        $aluguel->dataFesta = $request->input('dataFesta');
        $aluguel->horarioInicio = $request->input('horarioInicio');
        $aluguel->horarioTermino = $request->input('horarioTermino');
        $aluguel->valorCobrado = $request->input('valorCobrado');
        $aluguel->endereco = $request->input('endereco');
        $aluguel->complemento = $request->input('complemento');
        $aluguel->cidade = $request->input('cidade');
        $aluguel->uf = $request->input('uf');

        \App\Cliente::find($id)->addAluguel($aluguel);
        \App\Tema::find($request->input('tema_id'))->addAluguel($aluguel);
        \Session::flash('flash_message', [
            'msg'=>"Aluguel adicionado com Sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect()->route('cliente.detalhe', $id);
    }

    public function editar($id){
        $temas = \App\Tema::all();
        $aluguel = \App\Aluguel::find($id);
        if(!$aluguel){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse aluguel cadastrado!",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('cliente.detalhe', $aluguel->cliente->id);
        }

        return view('aluguel.editar', compact('aluguel', 'temas'));
    }

    public function atualizar(Request $request, $id){
        $aluguel = \App\Aluguel::find($id);
        $aluguel->update($request->all());
        \Session::flash('flash_message', [
            'msg'=>"Aluguel atualizado com Sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect()->route('cliente.detalhe', $aluguel->cliente->id);
    }

    public function deletar($id){
        $aluguel = \App\Aluguel::find($id);
        $aluguel->delete();
        \Session::flash('flash_message', [
            'msg'=>"Aluguel deletado com Sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect()->route('cliente.detalhe', $aluguel->cliente->id);
    }
}
