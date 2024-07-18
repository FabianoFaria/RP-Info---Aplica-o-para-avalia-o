@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">

                <div class="card-header">
                    <h4>{{ __('Nova Categoria') }}</h4>
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

                    <form action="{{ route('categoria.store') }}" method="POST">

                        @csrf
                        <div class="form-group">
                            <label for="nome">Nome da nova categoria</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


</div>   



@endsection