<?php

namespace SA\Presenters;

use SA\Transformers\BillPayTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BillPayPresenter
 *
 * @package namespace SA\Presenters;
 */
class BillPayPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BillPayTransformer();
    }
}
