<?php

namespace ShoppingList\Domain\Entities;

class ShoppingItem
{
    private int $id;
    private string $name;
    private float $price;
    private int $order;
    private bool $marked;

    public function __construct($id = null, string $name, float $price, int $order)
    {
        $this->id = $id ?? 0;
        $this->name = $name;
        $this->price = $price;
        $this->order = $order;
        $this->marked = false;
    }

    public function id()
    {
        return $this->id;
    }

    public function mark()
    {
        $this->mark = true;
        return $this->mark;
    }

    public function unmark()
    {
        $this->mark = false;
        return $this->mark;
    }
}
