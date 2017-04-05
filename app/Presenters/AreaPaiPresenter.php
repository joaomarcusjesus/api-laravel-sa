<?php

namespace SA\Presenters;

use SA\Transformers\AreaPaiTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AreaPaiPresenter
 *
 * @package namespace SA\Presenters;
 */
class AreaPaiPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AreaPaiTransformer();
    }
}
