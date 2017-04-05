<?php

namespace SA\Presenters;

use SA\Transformers\TipoAreaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TipoAreaPresenter
 *
 * @package namespace SA\Presenters;
 */
class TipoAreaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TipoAreaTransformer();
    }
}
