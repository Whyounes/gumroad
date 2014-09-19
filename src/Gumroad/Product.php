<?php 
namespace Gumroad;

use \Curl\Curl;

class Product{
	private $token;
	private $curl;

	private $products_url = 'https://api.gumroad.com/v2/products';

	public function __construct( $token ){
		$this->token = $token;

		$this->curl = new Curl();
	}//construct

	public function all(){
		$products = $this->curl->get( $this->products_url, [ 
			'access_token' => $this->token
		 ]);

		return $products;
	}//all


}//class