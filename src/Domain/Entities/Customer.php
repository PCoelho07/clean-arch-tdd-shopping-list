<?php

namespace ShoppingList\Domain\Entities;

class Customer
{
    private $id;
    private string $name;
    private Email $email;

    public function __construct(string $name, Email $email, $id = null)
    {
        $this->id = $id ?? null;
        $this->name = $name;
        $this->email = $email;
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function email()
    {
        return $this->email;
    }
}
