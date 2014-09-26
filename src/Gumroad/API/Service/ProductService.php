<?php 

namespace Gumroad\API\Service;

use \Curl\Curl;
use Gumroad\API\Product;

class ProductService extends Service{
	 
	public function __construct( ){
		parent::__construct();
	}//construct
	
   	/**
	*	Insert a new record to database
   	*/
	
	public function insert( $data ){
		$response = $this->curl->post( $this->api_url , [ 
			'access_token' 				=> $this->token,
			'name'						=> $data['name'],
			'url'						=> $data['url'],
			'price'						=> $data['price'],
			'description'				=> isset( $data['description'] ) ? $data['description'] : NULL,
			'preview_url'				=> isset( $data['preview_url'] ) ? $data['preview_url'] : NULL,
			'countries_available'		=> isset( $data['countries_available'] ) ? $data['countries_available'] : NULL,
			'max_purchase_count'		=> isset( $data['max_purchase_count'] ) ? $data['max_purchase_count'] : NULL,
			'customizable_price'		=> isset( $data['customizable_price'] ) ? $data['customizable_price'] : NULL,
			'webhook'					=> isset( $data['webhook'] ) ? $data['webhook'] : NULL,
			'require_shipping'			=> isset( $data['require_shipping'] ) ? $data['require_shipping'] : NULL,
			'shown_on_profile'			=> isset( $data['shown_on_profile'] ) ? $data['shown_on_profile'] : NULL,
			'custom_receipt'			=> isset( $data['custom_receipt'] ) ? $data['custom_receipt'] : NULL,
			'custom_summary'			=> isset( $data['custom_summary'] ) ? $data['custom_summary'] : NULL,
			'custom_product_type'		=> isset( $data['custom_product_type'] ) ? $data['custom_product_type'] : NULL,
			'custom_filetype'			=> isset( $data['custom_filetype'] ) ? $data['custom_filetype'] : NULL,
			'custom_permalink'			=> isset( $data['custom_permalink'] ) ? $data['custom_permalink'] : NULL	
		]);
		
		return $response;
	}//insert
	
   	/**
	*	Update the current 
   	*/
	public function update( $data ){
		$response = $this->curl->put( $this->api_url . '/' . $data['id'], [ 
			'access_token' 				=> $this->token,
			'name'						=> $data['name'],
			'url'						=> $data['url'],
			'price'						=> $data['price'],
			'description'				=> $data['description'],
			'preview_url'				=> $data['preview_url'],
			'countries_available'		=> $data['countries_available'],
			'max_purchase_count'		=> $data['max_purchase_count'],
			'customizable_price'		=> $data['customizable_price'],
			'webhook'					=> $data['webhook'],
			'require_shipping'			=> $data['require_shipping'],
			'shown_on_profile'			=> $data['shown_on_profile'],
			'custom_receipt'			=> $data['custom_receipt'],
			'custom_summary'			=> $data['custom_summary'],
			'custom_product_type'		=> $data['custom_product_type'],
			'custom_filetype'			=> $data['custom_filetype'],
			'custom_permalink'			=> $data['custom_permalink']
		]);
		
		return $response;
   	}//update

   	/**
	*	Delete a specific product by id
   	*/
   	public function delete( $id ){
   		$response = $this->curl->delete( $this->api_url . '/' . $id, [ 
			'access_token' 	=> $this->token
		]);
		
		return $response;
   	}//delete

   	/**
	*	Find a specific product by id
   	*/
   	public function find( $id ){
   		$response = $this->curl->get( $this->api_url . '/' . $id, [ 
			'access_token' => $this->token
		]);
		if( $response->success ){
			$product = new Product( $this );
			$product->fetch($response->product);

			return $product;
   		}//if
   		else{
   			return FALSE;
   		}//else
   	}//find

   	/**
	*	Get the list of all registred products for a user
   	*/
   	public function all(){
   		$response = $this->curl->get( $this->api_url, [ 
			'access_token' => $this->token
		]);

   		if( $response->success ){
   			$products = [];
			foreach ($response->products as $product) {
	   			$tmp = new Product( $this );
	   			$tmp->fetch($product);
	   			$products[] = $tmp;

	   			return $products;
	   		}//foreach
   		}//if
   		else{
   			// Throw error according to status
   		}//else

   	}//all

   	/**
	*	Enable a product
   	*/
	public function enable( $id ){
		$response = $this->curl->put( $this->api_url . '/' . $id . '/enable', [ 
			'access_token' => $this->token
		]);

		return $response;
	}//enable

	/**
	*	Disable a product
   	*/
	public function disable( $id ){
		$response = $this->curl->put( $this->api_url . '/' . $id . '/disable', [ 
			'access_token' => $this->token
		]);
		
		return $response;
	}//enable

}//class