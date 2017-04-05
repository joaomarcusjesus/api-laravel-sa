<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\seg_groupsRepository;
use SA\Models\SegGroups;
use SA\Validators\SegGroupsValidator;

/**
 * Class SegGroupsRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class SegGroupsRepositoryEloquent extends BaseRepository implements SegGroupsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SegGroups::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
