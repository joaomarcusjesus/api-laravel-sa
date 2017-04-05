<?php

namespace SA\Transformers;

use League\Fractal\TransformerAbstract;
use SA\Models\SegGroupsApps;

/**
 * Class SegGroupsAppsTransformer
 * @package namespace SA\Transformers;
 */
class SegGroupsAppsTransformer extends TransformerAbstract
{

    /**
     * Transform the \SegGroupsApps entity
     * @param \SegGroupsApps $model
     *
     * @return array
     */
    public function transform(SegGroupsApps $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
