@extends('layout')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Categorias') }}</h4>
                    <br>
                    <a href="{{ route('novaCategoria') }}" class="btn btn-primary float-left">Nova Categoria</a>

                    <a href="{{ route('dashboard') }}" class="btn btn-primary float-right">Voltar</a>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categorias as $categoria)
                                <tr>
                                    <th scope="row">{{ $categoria->id }}</th>
                                    <td>{{ $categoria->nome }}</td>
                                    <td><a href="{{ route('editCategoria', ['id' => $categoria->id]) }}" class="btn btn-warning">Editar Categoria</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Nenhuma categoria encontrada.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection