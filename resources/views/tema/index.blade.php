@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <ol class="breadcrumb card-header">
                    <li class="breadcrumb-item active">Temas</li>
                </ol>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>
                        <a class="btn btn-info" href="{{ route('tema.adicionar') }}">Adicionar</a>
                    </p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Valor Aluguel</th>
                                <th>Cor Destaque</th>
                                <th>Ação</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($temas as $tema)
                            <tr>
                                <th scope="row">{{ $tema->id }}</th>
                                <td>{{ $tema->nome }}</td>
                                <td>{{ $tema->valorAluguel }}</td>
                                <td>{{ $tema->corDestaque }}</td>
                                <td>
                                    <a class="btn btn-dark" href="{{route('tema.detalhe', $tema->id)}}">Detalhe</a>
                                    <a class="btn btn-dark" href="{{route('tema.editar', $tema->id)}}">Editar</a>
                                    <a class="btn btn-danger"
                                        href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('tema.deletar', $tema->id)}}' : false)">Deletar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row justify-content-center">
                        {!! $temas->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
