<?php

namespace SA\Presenters;

use SA\Transformers\ReservaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ReservaPresenter
 *
 * @package namespace SA\Presenters;
 */
class ReservaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ReservaTransformer();
    }
}
