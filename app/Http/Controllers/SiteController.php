<?php
namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    // Exibe a lista de cursos na página inicial (somente os destacados)
    public function index()
    {
        // Recupera apenas os cursos destacados
        $cursos = Curso::where('destacado', true)->get();

        // Retorna a view e passa os cursos destacados
        return view('site.index', compact('cursos'));
    }

    // Exibe os detalhes de um curso
    public function show($id)
    {
        // Recupera o curso pelo ID
        $curso = Curso::findOrFail($id);

        // Retorna a view de detalhes do curso
        return view('site.show', compact('curso'));
    }

    public function buscar(Request $request)
{
    $termo = $request->input('search');

    if ($termo) {
        // Busca pelo nome do curso, sem restrição de destaque
        $cursos = Curso::where('nome', 'LIKE', "%{$termo}%")->get();
    } else {
        // Se não houver termo de busca, mostra apenas os cursos destacados
        $cursos = Curso::where('destacado', 1)->get();
    }

    return view('site.index', compact('cursos'))->with('scrollTo', 'catalogo-section');
}


    
   

}
