<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CadastroCursoController extends Controller
{
    public function create()
    {
        $categorias = Curso::all();
        return view('cadastro.create', compact('categorias'));
    }

    public function storeProdutos(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'preco' => 'nullable|numeric|min:0',
            'destacado' => 'boolean',
        ]);

        $curso = new Curso;
        $curso->nome = $request->nome;
        $curso->descricao = $request->descricao;
        $curso->preco = $request->preco;
        $curso->destacado = $request->has('destacado') ? 1 : 0;

        if ($request->hasFile('imagem')) {
            $curso->imagem = $request->file('imagem')->store('cursos', 'public');
        }

        $curso->save();

        return redirect()->route('cadastro.index')->with('msg', 'Curso cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        return view('cadastro.edit', compact('curso'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'nullable|numeric|min:0',
            'destacado' => 'boolean',
        ]);

        $curso = Curso::findOrFail($id);
        $curso->nome = $request->nome;
        $curso->descricao = $request->descricao;
        $curso->preco = $request->preco;
        $curso->destacado = $request->has('destacado') ? 1 : 0;

        if ($request->hasFile('imagem')) {
            if ($curso->imagem) {
                Storage::delete('public/' . $curso->imagem);
            }
            $curso->imagem = $request->file('imagem')->store('cursos', 'public');
        }

        $curso->save();

        return redirect()->route('cadastro.index')->with('msg', 'Curso atualizado com sucesso!');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $cursos = Curso::where('nome', 'like', "%{$search}%")->get();

        return view('cadastro.index', compact('cursos'));
    }

    public function toggleStatus($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->ativo = !$curso->ativo;
        $curso->save();

        return redirect()->route('cadastro.index');
    }
}
