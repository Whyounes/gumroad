<?php
/**
 * Created by PhpStorm.
 * User: neoos
 * Date: 26/09/14
 * Time: 16:06
 */

namespace Gumroad\API\Service;


class VariantService extends Service{

    public function find( $product, $category, $variant_id ){
        $variant = $this->curl->get( $this->api_url . '/' . $product->id . '/variant_categories/' . $category->id . '/variants/' . $variant_id, [
            'access_token' => $this->token
        ]);

        if( $variant->success ){
            $variant = new Variant($variant->id, $variant->name, $variant->max_purchase_count, $variant->price_difference_cents, $product, $category );

            return $variant;
        }//if
        else{
            return FALSE;
        }//else
    }//find

    public function variants( $product, $category ){
        $response = $this->curl->get( $this->api_url . '/' . $product->id . '/variant_categories/' . $category->id . '/variants', [
            'access_token' => $this->token
        ]);

        if( $response->success ){
            $variants = [];
            foreach ($response->variants as $variant) {
                $variants[] = new Variant($variant->id, $variant->name, $variant->max_purchase_count, $variant->price_difference_cents, $product, $category );
            }//foreach

            return $variants;
        }//if
        else{
            //Throw exception
        }//else
    }//all

    public function insert( $data ){
        $response = $this->curl->post( $this->api_url . '/' . $data['product_id'] . '/variant_categories/' . $data['category_id'] . '/variants', [
            'access_token' 				=> $this->token,
            'name'	                    => $data['name'],
            'price_difference_cents'    => $data['price_difference_cents'],
            'max_purchase_count'        => $data['max_purchase_count']
        ]);

        return $response;
    }//insert

    public function update($data){
        $response = $this->curl->put( $this->api_url . '/' . $data['product_id'] . '/variant_categories/' . $data['category_id'] . '/variants/' . $data['id'], [
            'access_token' 				=> $this->token,
            'name'	                    => $data['name'],
            'price_difference_cents'    => $data['price_difference_cents'],
            'max_purchase_count'        => $data['max_purchase_count']
        ]);

        return $response;
    }//update

    public function delete( $product_id, $category_id, $id ){
        $response = $this->curl->delete( $this->api_url . '/' . $product_id . '/variant_categories/' . $category_id . '/variants/' . $id, [
            'access_token' 				=> $this->token
        ]);

        return $response;
    }//delete

}//class
