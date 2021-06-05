<?php

namespace ShoppingList\Domain\Entities;

class ShoppingList
{
    private int $id;
    /** @var ShoppingItem[] */
    private array $items;
    private Customer $owner;

    public function __construct($id = null, Customer $owner, array $items = [])
    {
        $this->id = $id ?? 0;
        $this->items = $items;
        $this->owner = $owner;
    }

    public function id()
    {
        return $this->id;
    }

    public function owner()
    {
        return $this->owner;
    }

    public function items()
    {
        return $this->items;
    }

    public function addItem(ShoppingItem $item)
    {
        if ($this->hasItem($item->id()) === true) {
            return;
        }

        $this->items[] = $item;
    }

    public function removeItem(ShoppingItem $item)
    {
        if ($this->hasItem($item->id()) === false) {
            return true;
        }

        try {
            $foundItem = array_search($item, $this->items, true);
            unset($this->items[$foundItem]);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function hasItem(int $id)
    {
        try {
            $item = $this->getItemById($id);
            return in_array($item, $this->items, true);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getItemById(int $id)
    {
        $foundItems = array_filter($this->items, fn ($shoppingItem) => $shoppingItem->id() === $id);

        if (count($foundItems) === 0) {
            throw new \Exception("Item not found!");
        }

        return $foundItems[0];
    }
}
