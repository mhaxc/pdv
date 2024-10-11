<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'volume',
        'estoque',
        'categoria_id',


    ];
    public function venda()
    {
        return $this->belongsToMany(Venda::class)->withPivot('quantidade', 'preco');
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public function movimentacoes()
    {
        return $this->hasMany(Movimentacao::class);
    }
}

