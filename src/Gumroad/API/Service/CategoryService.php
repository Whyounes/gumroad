<?php 

namespace Gumroad\API\Service;

use \Curl\Curl;
use Gumroad\API\Category;
use Gumroad\API\Product;

class CategoryService extends Service{
	
	
	public function __construct( ){
		parent::__construct();
	}//construct
	
	public function categories( $product ){
		$response = $this->curl->get( $this->api_url . '/' . $product->id . '/variant_categories', [
			'access_token' => $this->token
		]);

		if( $response->success ){
            $categories = [];
            foreach ($response->variant_categories as $category) {
                $categories[] = new Category( $category->id, $category->title, $product );
            }//foreach

            return $categories;
		}//if
		else{
			//Throw exception
		}//else
	}//categories
	
	public function insert( $data ){
        $response = $this->curl->post( $this->api_url . '/' . $data['product_id'] . '/variant_categories', [
            'access_token' 				=> $this->token,
            'title'						=> $data['title']
        ]);

        return $response;
    }//insert

    public function update( $data ){
        $response = $this->curl->put( $this->api_url . '/' . $data['product_id'] . '/variant_categories/' . $data['id'], [
            'access_token' 				=> $this->token,
            'title'						=> $data['title']
        ]);

        return $response;
    }//update

    public function delete( $product_id, $category_id ){
        $response = $this->curl->delete( $this->api_url . '/' . $product_id . '/variant_categories/' . $category_id, [
            'access_token' 	=> $this->token
        ]);

        return $response;
    }//delete

    public function find( $product, $category_id ){
        $response = $this->curl->get( $this->api_url . '/' . $product->id . '/variant_categories/' . $category_id, [
            'access_token' => $this->token
        ]);

        if( $response->success ){
            $category = new Category( $response->variant_category->id, $response->variant_category->title, $product );

            return $category;
        }//if
        else{
            return FALSE;
        }//else
    }//find

}//class
