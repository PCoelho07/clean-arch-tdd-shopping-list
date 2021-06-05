<?php

namespace ShoppingList\Infra\Repositories;

use ShoppingList\Domain\Entities\Customer;
use ShoppingList\Domain\Entities\Email;
use ShoppingList\Domain\Repositories\CustomerRepository;

class MemoryCustomerRepository implements CustomerRepository
{
    private $customers = [];
    private $customerIndex = 1;

    public function getById(int $id): Customer
    {
        /** @var Customer[] */
        $filteredCustomers = array_filter($this->customers, fn ($customer) => $customer->id() === $id);

        if (count($filteredCustomers) === 0) {
            throw new \Exception("Customer not found!");
        }

        return $filteredCustomers[0];
    }

    public function create(array $params): Customer
    {
        $customer = new Customer($params['name'], new Email($params['email']), $this->customerIndex++);
        $this->customers[] = $customer;

        return $customer;
    }
}
