@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">

                <div class="card-header">
                    <h4>{{ __('Editar Produto') }} : {{ $produto->nome }}</h4>
                    <br>

                    <a href="{{ route('listaProdutos') }}" class="btn btn-primary float-right">Voltar</a>
                </div>


                <form method="POST" action="{{ route('produto.update', ['id' => $produto->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome', $produto->nome) }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="valor" class="col-md-4 col-form-label text-md-right">Valor</label>

                            <div class="col-md-6">
                                <input id="valor" type="number" step="0.01" class="form-control @error('valor') is-invalid @enderror" name="valor" value="{{ old('valor', $produto->valor) }}" required autocomplete="valor">

                                @error('valor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="categoria_id" class="col-md-4 col-form-label text-md-right">Categoria</label>

                            <div class="col-md-6">
                                <select id="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id" required>
                                    <option value="">Selecione uma categoria</option>
                                    @forelse($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ $produto->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                                    @empty
                                        <option value="">Nenhuma categoria Cadastrada</option>
                                    @endforelse
                                </select>

                                @error('categoria_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Atualizar Produto
                                </button>
                                <a href="{{ route('listaProdutos') }}" class="btn btn-secondary">
                                    Cancelar
                                </a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection