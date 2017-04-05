<?php

namespace SA\Presenters;

use SA\Transformers\SegGroupsAppsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SegGroupsAppsPresenter
 *
 * @package namespace SA\Presenters;
 */
class SegGroupsAppsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SegGroupsAppsTransformer();
    }
}
