@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <ol class="breadcrumb card-header">
                    <li class="breadcrumb-item"><a href="{{ route('cliente.index') }}">Clientes</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('cliente.detalhe', $aluguel->cliente->id) }}">Detalhe</a></li>
                    <li class="breadcrumb-item active">Editar Aluguel</li>
                </ol>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><b>Cliente: </b>{{ $aluguel->cliente->nome }}</p>
                    <form action="{{ route('aluguel.atualizar', $aluguel->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="dataFesta">Data da Festa</label>
                            <input type="date" name="dataFesta" id="dataFesta" class="form-control" value="{{ $aluguel->dataFesta }}">
                        </div>
                        <div class="form-group">
                            <label for="horarioInicio">Horário de Início</label>
                            <input type="time" name="horarioInicio" id="horarioInicio" class="form-control" value="{{ $aluguel->horarioInicio }}">
                        </div>
                        <div class="form-group">
                            <label for="horarioTermino">Horário de Término</label>
                            <input type="time" name="horarioTermino" id="horarioTermino" class="form-control" value="{{ $aluguel->horarioTermino }}">
                        </div>
                        <div class="form-group">
                            <label for="valorCobrado">Valor cobrado</label>
                            <input type="number" step="0.01" min="100" max="5000" name="valorCobrado" id="valorCobrado" class="form-control" placeholder="000,00" value="{{ $aluguel->valorCobrado }}">
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Endereço da Festa" value="{{ $aluguel->endereco }}">
                        </div>
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Ex: Casa, Apartamento etc." value="{{ $aluguel->complemento }}">
                        </div>
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Informe a cidade" value="{{ $aluguel->cidade }}">
                        </div>
                        <div class="form-group">
                            <label for="uf">Estado (UF)</label>
                            <input type="text" name="uf" id="uf" class="form-control" placeholder="Informe o estado" value="{{ $aluguel->uf }}">
                        </div>
                        <div class="form-group">
                            <label for="tema_id">Tema da Festa</label>
                            <select name="tema_id" id="tema_id">
                                @foreach($temas as $tema)
                                    <option value="{{ $tema->id }}">{{ $tema->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-info">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
