<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[\Illuminate\Database\Eloquent\Attributes\Fillable(['user_id', 'titulo', 'descricao', 'status', 'prazo', 'prioridade', 'concluido_em'])]
class Tarefa extends Model
{
    use HasFactory;

    protected $casts = [
        'prazo' => 'date',
        'concluido_em' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
