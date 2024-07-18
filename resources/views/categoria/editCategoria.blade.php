@extends('layout')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">

            <div class="card">

                <div class="card-header">
                    <h4>{{ __('Editar Categoria') }} : {{ $categoria->nome }}</h4>
                    <br>

                    <a href="{{ route('dashboard') }}" class="btn btn-primary float-right">Voltar</a>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('categoria.update', ['id' => $categoria->id]) }}" method="POST">
                        @csrf

                        @method('PUT')
                        <div class="form-group">
                            <label for="nome">Nome da Categoria</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ $categoria->nome }}">
                            @error('nome')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar categoria</button>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>



@endsection