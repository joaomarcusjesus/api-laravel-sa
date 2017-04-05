<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\SegGroups;

/**
 * Class SegGroupsTransformer
 * @package namespace SA\Transformers;
 */
class SegGroupsTransformer extends TransformerAbstract
{

    /**
     * Transform the \SegGroups entity
     * @param \SegGroups $model
     *
     * @return array
     */
    public function transform(SegGroups $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
