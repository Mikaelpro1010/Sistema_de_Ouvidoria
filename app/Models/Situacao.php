<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
    protected $table = 'situacoes';

    protected $guarded = [];

    public function situacao()
{
    return $this->belongsTo('App\Situacao', 'situacao_id', 'id');
}
}
