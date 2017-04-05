<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\tipo_areaRepository;
use SA\Models\TipoArea;
use SA\Validators\TipoAreaValidator;

/**
 * Class TipoAreaRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class TipoAreaRepositoryEloquent extends BaseRepository implements TipoAreaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoArea::class;
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
        TipoArea::clearBootedModels();
    }
}
