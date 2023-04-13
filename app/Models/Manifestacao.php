<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manifestacao extends Model
{
    protected $table = 'manifestacoes';

    protected $guarded = [];

    const CELULAR = 1;
    const FIXO = 2;
    const WHATSAPP = 3;

    const TIPO_TELEFONE = [
        self::CELULAR => 'celular',
        self::FIXO => 'fixo',
        self::WHATSAPP => 'whatsapp',
    ]; 

    public function estadoProcesso()
    {
        return $this->hasOne(EstadoProcesso::class, 'id','estado_processo_id');
    }

    public function tipoManifestacao()
    {
        return $this->hasOne(TipoManifestacao::class, 'id', 'tipo_manifestacao_id');
    }

    public function situacao()
    {
        return $this->hasOne(Situacao::class, 'id', 'situacao_id');
    }


    public function prorrogacao()
    {
        return $this->hasMany(Prorrogacao::class,'manifestacao_id', 'id');
    }

    public function recursos(){
        return $this->hasMany(Recurso::class, 'manifestacao_id', 'id');
    }


}
