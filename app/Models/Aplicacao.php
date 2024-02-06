<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplicacao extends Model
{
    protected $table = 'aplicacoes';
    
    protected $fillable = [
        'nome',
        'descricao',
        'link',
        'usuarios_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuarios_id');
    }
}
