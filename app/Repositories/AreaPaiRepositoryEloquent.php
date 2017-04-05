<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\area_paiRepository;
use SA\Models\AreaPai;
use SA\Validators\AreaPaiValidator;

/**
 * Class AreaPaiRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class AreaPaiRepositoryEloquent extends BaseRepository implements AreaPaiRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AreaPai::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
