<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Prorrogacao extends Model
{
    protected $table = 'prorrogacao';

    protected $guarded = [];

    const SITUACAO_APROVADO = 1;
    const SITUACAO_REPROVADO = 2;
    const SITUACAO_ESPERA = 3;

    const SITUACAO_NOME = [
        self::SITUACAO_APROVADO => 'aprovado',
        self::SITUACAO_REPROVADO => 'reprovado',
        self::SITUACAO_ESPERA => 'espera',
    ]; 

    function manifestacao(){

        return $this->belongsTo(Manifestacao::class, 'manifestacao_id', 'id');
    }

    function user(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
