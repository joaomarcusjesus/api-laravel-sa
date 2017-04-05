<?php

namespace SA\Presenters;

use SA\Transformers\SegLogTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SegLogPresenter
 *
 * @package namespace SA\Presenters;
 */
class SegLogPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SegLogTransformer();
    }
}
