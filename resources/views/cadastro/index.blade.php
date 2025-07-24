@extends('layouts.main')

@section('content')
    <div class="list-container">
        <h1 class="grid-tipo-entrada-title-container">Lista de Cursos</h1>
        <div class="btn-container">
            <a href="{{ route('cadastro.create') }}" class="btn btn-primary">Novo</a>
        </div>

        <div class="filtro-container">
            <form action="{{ route('cadastro.index') }}" method="GET" class="form-busca">
                <input type="text" name="search" placeholder="Buscar curso..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>

        @if(session('msg'))
            <p class="alert alert-success">{{ session('msg') }}</p>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Curso</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $curso)
                    <tr>
                        <td>{{ $curso->id }}</td>
                        <td>{{ $curso->nome }}</td>
                        <td>{{ $curso->descricao }}</td>
                        <td>
                            <!-- Botão para alternar o status -->
                            <a href="{{ route('curso.toggleStatus', $curso->id) }}" 
                               class="btn btn-{{ $curso->ativo ? 'success' : 'danger' }}">
                                {{ $curso->ativo ? 'Ativo' : 'Inativo' }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('curso.edit', $curso->id) }}" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
