<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\inadimplenteRepository;
use SA\Models\Inadimplente;


/**
 * Class InadimplenteRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class InadimplenteRepositoryEloquent extends BaseRepository implements InadimplenteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Inadimplente::class;
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
        Inadimplente::clearBootedModels();
    }
}
