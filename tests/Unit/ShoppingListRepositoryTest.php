<?php

namespace ShoppingList\Tests\Unit;

use PHPUnit\Framework\TestCase;
use ShoppingList\Domain\Entities\ShoppingItem;
use ShoppingList\Domain\Repositories\ShoppingListRepository;
use ShoppingList\Infra\Repositories\MemoryShoppingListRepository;

class ShoppingListRepositoryTest extends TestCase
{
    /** @var ShoppingListRepository */
    protected $shoppingRepository;

    public function setUp()
    {
        $this->shoppingRepository = new MemoryShoppingListRepository();
    }

    public function testCreateShoppingList()
    {
        $shoppingList = $this->shoppingRepository->create([
            "id" => 1
        ]);

        $shoppingListFounded = $this->shoppingRepository->getById($shoppingList->id());

        $this->assertTrue($shoppingListFounded->id() === $shoppingList->id());

        return $this->shoppingRepository;
    }

    /**
     * @depends testCreateShoppingList
     */
    public function testAddItemToShoppingList(ShoppingListRepository $shoppingRepository)
    {
        $item = new ShoppingItem(1, "Vanish", 3.60, 1);
        $shoppingList = $shoppingRepository->addItem(1, $item);

        $this->assertTrue($shoppingList->hasItem(1));

        return $shoppingRepository;
    }

    /**
     * @depends testAddItemToShoppingList
     */
    public function testRemoveItemFromShoppingList(ShoppingListRepository $shoppingRepository)
    {
        $item = new ShoppingItem(1, "Vanish", 3.60, 1);
        $shoppingList = $shoppingRepository->removeItem(1, $item);

        $this->assertFalse($shoppingList->hasItem(1));
    }
}
