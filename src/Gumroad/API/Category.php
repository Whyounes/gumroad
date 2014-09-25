<?php 
namespace Gumroad\API;

use \Curl\Curl;
use Gumroad\API\Service\CategoryService;

class Category{

	public $id;
	public $title;
    public $product;

	private $categoryService;

	public function __construct( $id, $title, $product ){
		$this->categoryService = CategoryService::instance();

        $this->id = $id;
        $this->title = $title;
        $this->product = $product;
	}//construct
	
	public function insert( $data = NULL ){
        if( !$data )
            $data = [
                'title'	        => $this->title,
                'product'       => $this->product
            ];

        return $this->categoryService->insert( $data );
    }//insert

    public function update(){
        $data = [
            'id'		=> $this->id,
            'title'		=> $this->title,
            'product'   => $this->product
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
        return $this->categoryService->delete();
    }//delete

    public function __toString(){
        return $this->id;
    }//toString

}//Category
