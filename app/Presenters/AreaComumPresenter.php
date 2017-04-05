<?php

namespace SA\Presenters;

use SA\Transformers\AreaComumTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AreaComumPresenter
 *
 * @package namespace SA\Presenters;
 */
class AreaComumPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AreaComumTransformer();
    }
}
