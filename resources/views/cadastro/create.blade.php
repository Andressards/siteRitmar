@extends('layouts.main')

@section('content')

    <div id="membro-create-container" class="create-container">
        <div class="header-container">
            <h1 class="titulo-form" id="titulo-form-membro">Registrar Curso</h1>
        </div>

        <div class="form">
            <form action="{{ route('cadastro.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome-curso" name="nome" placeholder="Digite o nome" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" id="descricao-curso" name="descricao" placeholder="Digite a descrição" required>
                </div>

                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="number" name="preco" id="preco" class="form-control" step="0.01" placeholder="Digite o preço do curso">
                </div>

                
                


                <!-- Input para imagem -->
                <div class="form-group">
                    <label for="imagem">Imagem do Curso:</label>
                    <input type="file" class="form-control" id="imagem" name="imagem">
                </div>

                <div class="btn-container">
                    <input type="submit" class="btn btn-primary" value="Cadastrar">
                </div>
                
                <div class="btn-container">
                    <a href="{{ route('cadastro.index') }}">Voltar para a lista de cursos</a>
                </div>
            </form>
        </div>
    </div>

@endsection