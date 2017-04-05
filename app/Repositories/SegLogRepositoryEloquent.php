<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SA\Repositories\seg_logRepository;
use SA\Models\SegLog;
use SA\Validators\SegLogValidator;

/**
 * Class SegLogRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class SegLogRepositoryEloquent extends BaseRepository implements SegLogRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SegLog::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
