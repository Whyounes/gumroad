<?php

namespace Gumroad\API;


use Gumroad\API\Service\VariantService;

class Variant implements Model{
    public $id;
    public $name;
    public $price_difference_cents;
    public $max_purchase_count;
    public $product;
    public $category;

    private $variantService;

    function __construct($id, $name, $max_purchase_count, $price_difference_cents, $product, $category){
        $this->id = $id;
        $this->max_purchase_count = $max_purchase_count;
        $this->name = $name;
        $this->price_difference_cents = $price_difference_cents;

        $this->product = $product;
        $this->category = $category;

        $this->variantService = VariantService::instance();
    }//construct

    public function insert( $data = NULL ){
        if( !$data )
            $data = [
                'name'	                    => $this->name,
                'price_difference_cents'    => $this->price_difference_cents,
                'max_purchase_count'        => $this->max_purchase_count,
                'product_id'                => $this->product->id,
                'category_id'               => $this->category->id
            ];

        $this->variantService->insert( $data );
    }//insert

    public function update( $data = NULL ){
        if( !$data )
            $data = [
                'name'	                    => $this->name,
                'price_difference_cents'    => $this->price_difference_cents,
                'max_purchase_count'        => $this->max_purchase_count,
                'product_id'                => $this->product->id,
                'category_id'               => $this->category->id
            ];

        $this->variantService->update( $data );
    }//update

    public function save(){
        if( $this->id )
            return $this->update();
        else
            return $this->insert();
    }

    public function delete(){
        $this->variantService->delete( $this->product->id, $this->category->id, $this->id );
    }//delete

}//class
