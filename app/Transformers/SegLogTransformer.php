<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\SegLog;

/**
 * Class SegLogTransformer
 * @package namespace SA\Transformers;
 */
class SegLogTransformer extends TransformerAbstract
{

    /**
     * Transform the \SegLog entity
     * @param \SegLog $model
     *
     * @return array
     */
    public function transform(SegLog $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
