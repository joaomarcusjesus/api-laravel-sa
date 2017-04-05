<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\AreaComum;

/**
 * Class AreaComumTransformer
 * @package namespace SA\Transformers;
 */
class AreaComumTransformer extends TransformerAbstract
{

    /**
     * Transform the \AreaComum entity
     * @param \AreaComum $model
     *
     * @return array
     */
    public function transform(AreaComum $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
