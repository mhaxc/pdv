<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;
    protected $fillable =[
        'cliente_id','total','produto_id'
    ];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function items()
    {
        return $this->hasMany(VendaItem::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
