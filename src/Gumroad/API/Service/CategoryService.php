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
        $response = $this->curl->post( $this->api_url . '/' . $data['product']->id . '/variant_categories', [
            'access_token' 				=> $this->token,
            'title'						=> $data['title']
        ]);

        return $response;
    }//insert

    public function update( $data ){
        $response = $this->curl->put( $this->api_url . '/' . $data['product']->id . '/variant_categories/' . $data['id'], [
            'access_token' 				=> $this->token,
            'title'						=> $data['title']
        ]);

        return $response;
    }//update

    public function delete( $product, $id ){
        $response = $this->curl->delete( $this->api_url . '/' . $product->id . '/variant_categories/' . $id, [
            'access_token' 	=> $this->token
        ]);

        return $response;
    }//delete

    public function find( $product, $id ){
        $response = $this->curl->get( $this->api_url . '/' . $product->id . '/variant_categories/' . $id, [
            'access_token' => $this->token
        ]);

        if( $response->success ){
            $category = new Category( $response->variant_category->id, $response->variant_category->title, $product );

            return $category;
        }//if
        else{
            // Throw error according to status
        }//else
    }//find

}//class
