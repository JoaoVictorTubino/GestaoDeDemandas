<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Demanda extends Model
{
    use SoftDeletes;
    protected $table = 'demanda';

    const STATUS_ABERTO = 1;
    const STATUS_ANALISE = 2;
    const STATUS_CONCLUIDO = 3;

  protected $fillable = [
    'titulo',
    'descricao',
    'status',
    'data_entrega',
    'user_id',
  ];
    protected $casts = [
        'data_entrega' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            self::STATUS_ABERTO    => 'Aberto',
            self::STATUS_ANALISE   => 'Em Análise',
            self::STATUS_CONCLUIDO => 'Concluído',
            default               => 'Desconhecido',
        };
    }
}
