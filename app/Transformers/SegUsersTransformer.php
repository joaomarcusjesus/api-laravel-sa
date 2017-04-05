<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\SegUsers;

/**
 * Class SegUsersTransformer
 * @package namespace SA\Transformers;
 */
class SegUsersTransformer extends TransformerAbstract
{

    /**
     * Transform the \SegUsers entity
     * @param \SegUsers $model
     *
     * @return array
     */
    public function transform(SegUsers $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
