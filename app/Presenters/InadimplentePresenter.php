<?php

namespace SA\Presenters;

use SA\Transformers\InadimplenteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class InadimplentePresenter
 *
 * @package namespace SA\Presenters;
 */
class InadimplentePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new InadimplenteTransformer();
    }
}
