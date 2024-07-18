@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h4>{{ __('Dashboard') }}</h4></div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    <h3>Bem-vindo, {{ $usuario->nome }}</h3>
                    <p>Email: {{ $usuario->email }}</p>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">Produtos</h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title pricing-card-title">Últimos produtos cadastrados</h5>

                                    <ul>
                                        @foreach($ultimosProdutos as $produto)
                                            <li>{{ $produto->id }} - {{ $produto->nome }}</li>
                                        @endforeach
                                    </ul>

                                    <hr>
                                    <a href="{{ route('novoProduto') }}" class="btn btn-primary float-left">Lista Produtos</a>
                                    <a href="{{ route('novoProduto') }}" class="btn btn-primary float-right">Novo Produto</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">Categorias</h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title pricing-card-title">Últimas categorias cadastradas</h5>

                                    <ul>
                                        @foreach($ultimasCategorias as $categoria)
                                            <li>{{ $categoria->id }} - {{ $categoria->nome }}</li>
                                        @endforeach
                                    </ul>

                                    <hr>
                                    <a href="{{ route('listaCategorias') }}" class="btn btn-primary float-left">Lista Categorias</a>
                                    <a href="{{ route('novaCategoria') }}" class="btn btn-primary float-right">Nova Categoria</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection