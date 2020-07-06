<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function adicionar($id){
        $tema = \App\Tema::find($id);
        return view('item.adicionar', compact('tema'));
    }

    public function salvar(Request $request, $id){
        $item = new \App\Item;
        $item->nome = $request->input('nome');
        $item->descricao = $request->input('descricao');

        \App\Tema::find($id)->addItem($item);
        \Session::flash('flash_message', [
            'msg'=>"Item adicionado com Sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect()->route('tema.detalhe', $id);
    }

    public function editar($id){
        $item = \App\Item::find($id);
        if(!$item){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse item cadastrado!",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('tema.detalhe', $item->tema->id);
        }

        return view('item.editar', compact('item'));
    }

    public function atualizar(Request $request, $id){
        $item = \App\Item::find($id);
        $item->update($request->all());
        \Session::flash('flash_message', [
            'msg'=>"Item atualizado com Sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect()->route('tema.detalhe', $item->tema->id);
    }

    public function deletar($id){
        $item = \App\Item::find($id);
        $item->delete();
        \Session::flash('flash_message', [
            'msg'=>"Item deletado com Sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect()->route('tema.detalhe', $item->tema->id);
    }
}
