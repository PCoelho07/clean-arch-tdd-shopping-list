<?php

namespace ShoppingList\Domain\UseCases;

use ShoppingList\Domain\Repositories\CustomerRepository;
use ShoppingList\Domain\UseCases\Traits\ValidateInput;

class SignUpCustomer
{
    use ValidateInput;

    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function handle(array $params)
    {
        $this->validate($params, [
            "name" => "required",
            "email" => "required",
        ]);

        $customer = $this->customerRepository->create($params);

        return $customer;
    }
}
