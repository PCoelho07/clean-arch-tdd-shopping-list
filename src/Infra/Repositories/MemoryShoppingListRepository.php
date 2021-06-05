<?php

namespace ShoppingList\Infra\Repositories;

use ShoppingList\Domain\Entities\Customer;
use ShoppingList\Domain\Entities\Email;
use ShoppingList\Domain\Entities\ShoppingItem;
use ShoppingList\Domain\Entities\ShoppingList;
use ShoppingList\Domain\Repositories\ShoppingListRepository;

class MemoryShoppingListRepository implements ShoppingListRepository
{
    /** @var ShoppingList[] */
    public $shoppingLists = [];
    private $customer;

    public function __construct()
    {
        $this->customer = new Customer("Pedro", new Email("teste@teste.com"));
    }

    public function create(array $params): ShoppingList
    {
        $shoppingList = new ShoppingList($params['id'] ?? null, $this->customer);

        $this->shoppingLists[] = $shoppingList;

        return $shoppingList;
    }

    public function getByOwner(Customer $owner): ShoppingList
    {
        return new ShoppingList(null, $this->customer);
    }

    public function addItem(int $shoppingListId, ShoppingItem $item): ShoppingList
    {
        /** @var ShoppingList */
        $shoppingList = $this->getById($shoppingListId);
        $shoppingList->addItem($item);

        return $shoppingList;
    }

    public function removeItem(int $shoppingListId, ShoppingItem $item): ShoppingList
    {
        /** @var ShoppingList */
        $shoppingList = $this->getById($shoppingListId);
        $shoppingList->removeItem($item);

        return $shoppingList;
    }

    public function markItem(int $shoppingListId, ShoppingItem $item): ShoppingList
    {
        /** @var ShoppingList */
        $shoppingList = $this->getById($shoppingListId);
        $item = $shoppingList->getItemById($item->id());

        $item->mark();

        return $shoppingList;
    }

    public function unmarkItem(int $shoppingListId, ShoppingItem $item): ShoppingList
    {
        /** @var ShoppingList */
        $shoppingList = $this->getById($shoppingListId);
        $item = $shoppingList->getItemById($item->id());

        $item->unmark();

        return $shoppingList;
    }

    public function getById(int $id): ShoppingList
    {
        $filteredShoppingList = array_filter($this->shoppingLists, fn ($item) => $item->id() === $id);

        if (count($filteredShoppingList) === 0) {
            throw new \Exception("Shopping list not found!");
        }

        return $filteredShoppingList[0];
    }
}
