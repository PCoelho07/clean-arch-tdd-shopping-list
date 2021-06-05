<?php

namespace ShoppingList\Tests\Unit;

use PHPUnit\Framework\TestCase;
use ShoppingList\Domain\UseCases\SignUpCustomer;
use ShoppingList\Infra\Repositories\MemoryCustomerRepository;

class SignUpCustomerUseCaseTest extends TestCase
{
    public function testsignUpCustomer()
    {
        $customerRepository = new MemoryCustomerRepository();
        $signUpCustomerUseCase = new SignUpCustomer($customerRepository);

        $customer = $signUpCustomerUseCase->handle([
            "name" => "Pedro Coelho",
            "email" => "pdrbt@outlook.com"
        ]);

        $this->assertTrue($customerRepository->getById($customer->id()) !== null);
    }
}
