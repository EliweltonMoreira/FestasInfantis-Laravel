@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <ol class="breadcrumb card-header">
                    <li class="breadcrumb-item"><a href="{{ route('tema.index') }}">Temas</a></li>
                    <li class="breadcrumb-item active">Adicionar</li>
                </ol>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('tema.salvar') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome do tema">
                        </div>
                        <div class="form-group">
                            <label for="valorAluguel">Valor do Aluguel</label>
                            <input type="number" step="0.01" min="100" max="5000" name="valorAluguel" id="valorAluguel"
                                class="form-control" placeholder="000,00">
                        </div>
                        <div class="form-group">
                            <label for="corDestaque">Cor de Destaque</label>
                            <input type="text" name="corDestaque" id="corDestaque" class="form-control"
                                placeholder="Cor de Destaque">
                        </div>
                        <button class="btn btn-info">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
