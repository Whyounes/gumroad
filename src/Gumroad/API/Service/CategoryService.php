<?php 

namespace Gumroad\API\Service;

use \Curl\Curl;
use Gumroad\API\Product;

class CategoryService extends Service{
	
	
	public function __construct( ){
		
	}//construct
	
	public function categories( $product_id ){
		$response = $this->curl->post( $this->api_url . '/' . $id . '/variant_categories', [
			'token' => $this->token
		]);

		if( $response->success ){
			return $response->variant_categories;
		}//if
		else{
			//Throw exception
		}//else
	}//categories
}//class
