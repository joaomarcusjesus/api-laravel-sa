<?php

namespace SA\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
//use SA\Repositories\CategoryRepository;
use SA\Models\Category;
use SA\Presenters\CategoryPresenter;

//use SA\Validators\CategoryValidator;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace SA\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return CategoryPresenter::class;
    }

    public function applyMultitenancy()
    {
        Category::clearBootedModels();
    }
}
