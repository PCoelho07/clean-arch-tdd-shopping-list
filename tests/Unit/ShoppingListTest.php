<?php

namespace ShoppingList\Tests\Unit;

use PHPUnit\Framework\TestCase;
use ShoppingList\Domain\Entities\Customer;
use ShoppingList\Domain\Entities\Email;
use ShoppingList\Domain\Entities\ShoppingItem;
use ShoppingList\Domain\Entities\ShoppingList;

class ShoppingListTest extends TestCase
{
    public function testAddItemWithSuccess()
    {
        $item = new ShoppingItem(null, "Vanish", 560.30, 1);
        $shoppingList = new ShoppingList(1, new Customer("Pedro Coelho", new Email("pdrbt@outlook.com")));

        $shoppingList->addItem($item);

        $this->assertTrue($shoppingList->hasItem($item->id()));
    }

    public function testRemoveItemWithSuccess()
    {
        $item = new ShoppingItem(null, "Vanish", 560.30, 1);
        $shoppingList = new ShoppingList(1, new Customer("Pedro Coelho", new Email("pdrbt@outlook.com")), [$item]);

        $shoppingList->removeItem($item);

        $this->assertFalse($shoppingList->hasItem($item->id()));
    }
}
