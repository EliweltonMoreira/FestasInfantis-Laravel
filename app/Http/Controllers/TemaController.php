<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $temas = \App\Tema::paginate(15);
        return view('tema.index', compact('temas'));
    }

    public function adicionar(){
        return view('tema.adicionar');
    }

    public function detalhe($id){
        $tema = \App\Tema::find($id);
        return view('tema.detalhe', compact('tema'));
    }

    public function salvar(Request $request){
        \App\Tema::create($request->all());
        \Session::flash('flash_message', [
            'msg'=>"Tema adicionado com Sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect()->route('tema.adicionar');
    }

    public function editar($id){
        $tema = \App\Tema::find($id);
        if(!$tema){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse tema cadastrado!",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('tema.adicionar');
        }
        return view('tema.editar', compact('tema'));
    }

    public function atualizar(Request $request, $id){
        \App\Tema::find($id)->update($request->all());
        \Session::flash('flash_message', [
            'msg'=>"Tema atualizado com Sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect()->route('tema.index');
    }

    public function deletar($id){
        $tema = \App\Tema::find($id);

        if(!$tema->deletarAluguels()){
            \Session::flash('flash_message', [
                'msg'=>"Registro não pode ser deletado!",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('tema.index');
        }

        if(!$tema->deletarItems()){
            \Session::flash('flash_message', [
                'msg'=>"Registro não pode ser deletado!",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('tema.index');
        }

        $tema->delete();
        \Session::flash('flash_message', [
            'msg'=>"Tema deletado com Sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect()->route('tema.index');
    }
}
