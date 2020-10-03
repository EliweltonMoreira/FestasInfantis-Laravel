@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <ol class="breadcrumb card-header">
                    <li class="breadcrumb-item"><a href="{{ route('tema.index') }}">Temas</a></li>
                    <li class="breadcrumb-item active">Detalhe</li>
                </ol>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p><b>Tema: </b>{{ $tema->nome }}</p>
                    <p><b>Valor do Aluguel: </b>R$ {{ $tema->valorAluguel }}</p>
                    <p><b>Cor de Destaque: </b>{{ $tema->corDestaque }}</p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Ação</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($tema->items as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->nome }}</td>
                                <td>{{ $item->descricao }}</td>
                                <td>
                                    <a class="btn btn-dark" href="{{ route('item.editar', $item->id) }}">Editar</a>
                                    <a class="btn btn-danger"
                                        href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('item.deletar', $item->id) }}' : false)">Deletar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p>
                        <a class="btn btn-info" href="{{route('item.adicionar', $tema->id)}}">Adicionar Item</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
