<?php

namespace SA\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Inadimplente extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'usuario',
        'st_inadimplente'
    ];

}
