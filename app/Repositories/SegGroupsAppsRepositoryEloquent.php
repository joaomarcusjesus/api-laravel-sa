<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\seg_groups_appsRepository;
use SA\Models\SegGroupsApps;
use SA\Validators\SegGroupsAppsValidator;

/**
 * Class SegGroupsAppsRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class SegGroupsAppsRepositoryEloquent extends BaseRepository implements SegGroupsAppsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SegGroupsApps::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
