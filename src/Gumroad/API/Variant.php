<?php

namespace Gumroad\API;


class Variant implements Model{
    public $id;
    public $name;
    public $price_difference_cents;
    public $max_purchase_count;
    public $product;
    public $category;

    function __construct($id, $max_purchase_count, $name, $price_difference_cents, $product, $category){
        $this->category = $category;
        $this->id = $id;
        $this->max_purchase_count = $max_purchase_count;
        $this->name = $name;
        $this->price_difference_cents = $price_difference_cents;
        $this->product = $product;
    }//construct

    public function insert()
    {
        // TODO: Implement insert() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function save()
    {
        // TODO: Implement save() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }


}//class
