<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model {
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'imagem', 'ativo', 'preco', 'destacado'];

    /**
     * Escopo para filtrar apenas os cursos ativos.
     */
    public function scopeAtivos($query) {
        return $query->where('ativo', true);
    }

    // Se a tabela não seguir o padrão "cursos", especifique:
    protected $table = 'cursos';

    // Caso a chave primária não seja 'id', defina:
    // protected $primaryKey = 'id_curso';

    // Relacionamento futuro (se houver categorias, por exemplo)
    // public function categoria() {
    //     return $this->belongsTo(Categoria::class);
    // }
}
