<?php

namespace ShoppingList\Domain\Repositories;

use ShoppingList\Domain\Entities\ShoppingItem;

interface ShoppingItemRepository
{
    public function store(ShoppingItem $shoppingItem): ShoppingItem;

    public function update(ShoppingItem $shoppingItem, array $params): ShoppingItem;

    public function delete(ShoppingItem $shoppingItem): void;
}
