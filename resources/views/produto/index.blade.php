@extends('layout')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-9">

            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Produtos') }}</h4>
                    <br>
                    <a href="{{ route('novoProduto') }}" class="btn btn-primary float-left">Novo produto</a>

                    <a href="{{ route('dashboard') }}" class="btn btn-primary float-right">Voltar</a>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produtos as $produto)
                                <tr>
                                    <th scope="row">{{ $produto->id }}</th>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->valor }}</td>
                                    <td>{{ $produto->categoria->nome }}</td>
                                    <td>
                                        <a href="{{ route('editarProduto', ['id' => $produto->id]) }}" class="btn btn-warning">Editar Produto</a>
                                        <form action="{{ route('deleteProduto', ['id' => $produto->id]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Nenhum produto encontrado.</td>
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