<?php

namespace ShoppingList\Domain\Repositories;

use ShoppingList\Domain\Entities\Customer;
use ShoppingList\Domain\Entities\ShoppingItem;
use ShoppingList\Domain\Entities\ShoppingList;

interface ShoppingListRepository
{
    public function create(array $params): ShoppingList;

    public function getByOwner(Customer $owner): ShoppingList;

    public function getById(int $id): ShoppingList;

    public function addItem(int $shoppingListId, ShoppingItem $item): ShoppingList;

    public function removeItem(int $shoppingListId, ShoppingItem $item): ShoppingList;

    public function markItem(int $shoppingListId, ShoppingItem $item): ShoppingList;

    public function unmarkItem(int $shoppingListId, ShoppingItem $item): ShoppingList;
}
