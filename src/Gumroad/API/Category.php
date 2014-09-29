<?php 
namespace Gumroad\API;

use \Curl\Curl;
use Gumroad\API\Service\CategoryService;
use Gumroad\API\Service\VariantService;

class Category implements Model{

	public $id;
	public $title;
    public $product;

	private $categoryService;
    private $variantService;

	public function __construct( $id, $title, $product ){
		$this->categoryService = CategoryService::instance();
        $this->variantService = VariantService::instance();

        $this->id = $id;
        $this->title = $title;
        $this->product = $product;
	}//construct
	
	public function insert( $data = NULL ){
        if( !$data )
            $data = [
                'title'	        => $this->title,
                'product_id'       => $this->product->id
            ];

        return $this->categoryService->insert( $data );
    }//insert

    public function update(){
        $data = [
            'id'		=> $this->id,
            'title'		=> $this->title,
            'product_id'   => $this->product->id
        ];

        return $this->categoryService->update( $data );
    }//update

    public function save(){
        if( $this->id )
            return $this->update();
        else
            return $this->insert();
    }//save

    public function delete(){
        return $this->categoryService->delete( $this->product->id, $this->id );
    }//delete

    public function variants(){
        return $this->variantService->variants( $this->product, $this );
    }//variants

    public function __toString(){
        $str = $this->id;
        return $str;
    }//toString

}//Category
