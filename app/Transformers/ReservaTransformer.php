<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Reserva;

/**
 * Class ReservaTransformer
 * @package namespace SA\Transformers;
 */
class ReservaTransformer extends TransformerAbstract
{

    /**
     * Transform the \Reserva entity
     * @param \Reserva $model
     *
     * @return array
     */
    public function transform(Reserva $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
