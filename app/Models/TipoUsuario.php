<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoUsuario extends Model
{
    use SoftDeletes;
    protected $table = 'tipo_usuario';
    protected $guarded = [];

        public function usuarios()
    {
        return $this->hasMany(User::class, 'tipo_usuario_id', 'id');
    }
}
