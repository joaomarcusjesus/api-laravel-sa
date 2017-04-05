<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\Inadimplente;

/**
 * Class InadimplenteTransformer
 * @package namespace SA\Transformers;
 */
class InadimplenteTransformer extends TransformerAbstract
{

    /**
     * Transform the \Inadimplente entity
     * @param \Inadimplente $model
     *
     * @return array
     */
    public function transform(Inadimplente $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
