<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\SegUsersGroups;

/**
 * Class SegUsersGroupsTransformer
 * @package namespace SA\Transformers;
 */
class SegUsersGroupsTransformer extends TransformerAbstract
{

    /**
     * Transform the \SegUsersGroups entity
     * @param \SegUsersGroups $model
     *
     * @return array
     */
    public function transform(SegUsersGroups $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
