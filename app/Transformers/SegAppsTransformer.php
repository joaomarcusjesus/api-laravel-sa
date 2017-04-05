<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\SegApps;

/**
 * Class SegAppsTransformer
 * @package namespace SA\Transformers;
 */
class SegAppsTransformer extends TransformerAbstract
{

    /**
     * Transform the \SegApps entity
     * @param \SegApps $model
     *
     * @return array
     */
    public function transform(SegApps $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
