<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\AreaPai;

/**
 * Class AreaPaiTransformer
 * @package namespace SA\Transformers;
 */
class AreaPaiTransformer extends TransformerAbstract
{

    /**
     * Transform the \AreaPai entity
     * @param \AreaPai $model
     *
     * @return array
     */
    public function transform(AreaPai $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
