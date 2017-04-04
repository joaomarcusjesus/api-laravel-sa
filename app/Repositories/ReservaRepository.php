<?php

namespace SA\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ReservaRepository
 * @package namespace SA\Repositories;
 */
interface ReservaRepository extends RepositoryInterface, RepositoryMultitenancyInterface
{
    public function getInadimplencia($usuario);
}
