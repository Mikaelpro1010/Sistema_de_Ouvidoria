<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoProcesso extends Model
{
    protected $table = 'estados_processo';

    protected $guarded = [];

    public function manifestacao()
{
    return $this->belongsTo(Manifestacao::class, 'estado_processo_id', 'id');
}
}
