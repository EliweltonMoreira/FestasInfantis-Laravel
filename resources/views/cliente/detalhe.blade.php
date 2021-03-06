@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <ol class="breadcrumb card-header">
                    <li class="breadcrumb-item"><a href="{{ route('cliente.index') }}">Clientes</a></li>
                    <li class="breadcrumb-item active">Detalhe</li>
                </ol>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><b>Cliente: </b>{{ $cliente->nome }}</p>
                    <p><b>Telefone: </b>{{ $cliente->telefone }}</p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Data Festa</th>
                                <th>Horário Início</th>
                                <th>Valor cobrado</th>
                                <th>Tema da Festa</th>
                                <th>Ação</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($cliente->aluguels as $aluguel)
                            <tr>
                                <th scope="row">{{ $aluguel->id }}</th>
                                <td>{{ $aluguel->dataFesta }}</td>
                                <td>{{ $aluguel->horarioInicio }}</td>
                                <td>{{ $aluguel->valorCobrado }}</td>
                                <td><a class="btn btn-link" href="{{ route('tema.detalhe', $aluguel->tema->id) }}">{{ $aluguel->tema->nome }}</a></td>
                                <td>
                                    <a class="btn btn-dark" href="{{ route('aluguel.editar', $aluguel->id) }}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('aluguel.deletar', $aluguel->id) }}' : false)">Deletar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p>
                        <a class="btn btn-info" href="{{route('aluguel.adicionar', $cliente->id)}}">Adicionar Aluguel</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
