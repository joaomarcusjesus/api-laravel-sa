<?php

namespace SA\Presenters;

use SA\Transformers\SegUsersTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SegUsersPresenter
 *
 * @package namespace SA\Presenters;
 */
class SegUsersPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SegUsersTransformer();
    }
}
