<?php

namespace ShoppingList\Domain\UseCases\Traits;

trait ValidateInput
{
    public function validate(array $fields, array $rules): bool
    {
        return true;
    }
}
