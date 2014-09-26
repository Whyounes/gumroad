<?php
/**
 * Created by PhpStorm.
 * User: neoos
 * Date: 26/09/14
 * Time: 16:06
 */

namespace Gumroad\API\Service;


class VariantService extends Service{

    public function find($id){

    }

    public function variants( $product_id, $category_id ){
        $response = $this->curl->get( $this->api_url . '/' . $product_id . '/variant_categories/' . $category_id . '/variants', [
            'access_token' => $this->token
        ]);

        if( $response->success ){
            $variants = [];
            foreach ($response->variants as $variant) {

                $variants[] = new Variant($variant->id, $variant->max_purchase_count, $variant->name, $variant->price_difference_cents, $product_id, $category_id );
            }//foreach

            return $variants;
        }//if
        else{
            //Throw exception
        }//else
    }//all

    public function insert($data){

    }

    public function update($data){

    }

    public function delete($id){

    }

}//class
