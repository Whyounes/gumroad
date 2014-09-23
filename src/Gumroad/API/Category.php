<?php 
namespace Gumroad\API;

use \Curl\Curl;

class Category{

	public $id;
	public $name;

	private $categoryService;

	public function __construct( CategoryService $categoryService ){
		$this->categoryService = $categoryService;
	}//construct
	
	
}//Category
