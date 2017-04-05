<?php

namespace SA\Presenters;

use SA\Transformers\SegGroupsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SegGroupsPresenter
 *
 * @package namespace SA\Presenters;
 */
class SegGroupsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SegGroupsTransformer();
    }
}
