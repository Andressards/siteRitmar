@extends('layouts.main')

@section('content')
    <div class="create-container">
        <div class="header-container">
            <h1 class="titulo-form" id="titulo-form-curso">Editar Curso</h1>
        </div>

        @if(session('msg'))
            <p class="alert alert-success">{{ session('msg') }}</p>
        @endif

        <div class="form">
            <form action="{{ route('cadastro.update', $curso->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nome do Curso -->
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" 
                           value="{{ old('nome', $curso->nome) }}" required>
                </div>

                <!-- Descrição do Curso -->
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" 
                           value="{{ old('descricao', $curso->descricao) }}" required>
                </div>

                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" step="0.01" name="preco" id="preco" class="form-control"
                            value="{{ old('preco', $curso->preco ?? '') }}" required>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="destacado" value="1" {{ $curso->destacado ? 'checked' : '' }}>
                        Exibir na página inicial
                    </label>
                </div>

                <!-- Imagem do Curso -->
                <div class="form-group">
                    <label for="imagem">Imagem:</label>
                    <input type="file" class="form-control" id="imagem" name="imagem">
                    <!-- Exibe a imagem atual, caso exista -->
                    @if($curso->imagem)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $curso->imagem) }}" alt="Imagem do Curso" width="150">
                        </div>
                    @endif
                </div>

                <!-- Botões -->
                <div class="btn-container">
                    <input type="submit" class="btn btn-primary" value="Atualizar">
                </div>
                <div class="btn-container">
                    <a href="{{ route('cadastro.index') }}" class="btn btn-primary">Voltar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
