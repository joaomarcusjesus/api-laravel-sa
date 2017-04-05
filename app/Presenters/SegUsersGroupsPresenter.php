<?php

namespace SA\Presenters;

use SA\Transformers\SegUsersGroupsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SegUsersGroupsPresenter
 *
 * @package namespace SA\Presenters;
 */
class SegUsersGroupsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SegUsersGroupsTransformer();
    }
}
