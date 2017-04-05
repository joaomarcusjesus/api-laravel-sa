<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\seg_users_groupsRepository;
use SA\Models\SegUsersGroups;
use SA\Validators\SegUsersGroupsValidator;

/**
 * Class SegUsersGroupsRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class SegUsersGroupsRepositoryEloquent extends BaseRepository implements SegUsersGroupsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SegUsersGroups::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
