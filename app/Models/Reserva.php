<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Reserva extends Model implements Transformable
{
    use TransformableTrait;
    //use BelongsToTenants;


    protected $fillable = [
        'dt_reserva',
        'hr_inicio',
        'hr_fim',
        'id_numero_imovel',
        'id_bloco',
        'id_cadastro_reserva_area_comum',
        'id_area_pai'
    ];

}
