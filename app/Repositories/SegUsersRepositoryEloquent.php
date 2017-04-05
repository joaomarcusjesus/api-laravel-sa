<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\seg_usersRepository;
use SA\Models\SegUsers;
use SA\Validators\SegUsersValidator;

/**
 * Class SegUsersRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class SegUsersRepositoryEloquent extends BaseRepository implements SegUsersRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SegUsers::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
