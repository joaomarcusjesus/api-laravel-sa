<?php

namespace SA\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BillPayRepository
 * @package namespace SA\Repositories;
 */
interface BillPayRepository extends RepositoryInterface, RepositoryMultitenancyInterface
{
    public function calculateTotal();
}
