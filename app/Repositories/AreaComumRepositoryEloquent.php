<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\area_comumRepository;
use SA\Models\AreaComum;
use SA\Validators\AreaComumValidator;

/**
 * Class AreaComumRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class AreaComumRepositoryEloquent extends BaseRepository implements AreaComumRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AreaComum::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function applyMultitenancy()
    {
        Reserva::clearBootedModels();
    }
}
