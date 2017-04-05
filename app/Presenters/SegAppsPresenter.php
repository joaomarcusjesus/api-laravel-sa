<?php

namespace SA\Presenters;

use SA\Transformers\SegAppsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SegAppsPresenter
 *
 * @package namespace SA\Presenters;
 */
class SegAppsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SegAppsTransformer();
    }
}
