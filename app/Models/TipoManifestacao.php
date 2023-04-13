<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoManifestacao extends Model
{
    protected $table = 'tipos_manifestacao';

    protected $guarded = [];

    public function manifestacoes()
{
    return $this->hasMany(Manifestacao::class, 'tipo_manifestacao_id', 'id');
}
}
