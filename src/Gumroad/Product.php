<?php 
namespace Gumroad;

use \Curl\Curl;

class Product{
	private $token;

	public function __construct( $token ){
		$this->token = $token;
	}//construct

	
}//class