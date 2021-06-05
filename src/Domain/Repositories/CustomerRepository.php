<?php

namespace ShoppingList\Domain\Repositories;

use ShoppingList\Domain\Entities\Customer;

interface CustomerRepository
{
    public function getById(int $id): Customer;

    public function create(array $params): Customer;
}
