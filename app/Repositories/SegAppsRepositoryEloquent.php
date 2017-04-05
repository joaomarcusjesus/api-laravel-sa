<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\seg_appsRepository;
use SA\Models\SegApps;
use SA\Validators\SegAppsValidator;

/**
 * Class SegAppsRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class SegAppsRepositoryEloquent extends BaseRepository implements SegAppsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SegApps::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
