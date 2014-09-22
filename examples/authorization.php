<?php 

include_once dirname(__FILE__) . '/../vendor/autoload.php';

use Gumroad\API\Scope;
use Gumroad\API\Authorization;
use Gumroad\API\ProductService;

$authorization = new Authorization( 'a5dac9d52c059da70ccf108b46a2108ae2a32b76dae181c6f38ac2e345f84219', 
							'1ecaa6760e39f22820af00118322831bb7b0335676a84c81098e8dd48093f149', 
							'http://localhost/callback', Scope::EDIT_PRODUCTS );

//$authorization->authorize();
//var_dump( $authorization->token('bc065309a54d4eeabf27e582dba1fc4d90727679a05b4d799e228cea3b7c5c92') );

$product = new ProductService('4c86db2608811d32d4187ea5ab03411ef3dd17643a71f1f08390d5529b0bae1e');
echo "<pre>";
//var_dump($product->all());
//var_dump($product->find('FRhP1-Wm5DlUPA_E_M7-xw=='));

/*
$data = [
  'name'            => 'test product',
  'url'             => 'http://fb.com',
  'price'           => '10000',
  'description'     => 'small test description'
];
var_dump($product->insert($data));
*/

/*
$data = [
  'id'              => 'KTT2sXu86GVtxmbJdGPeiA==',
  'name'            => 'test product 1',
  'url'             => 'http://fb.com1',
  'price'           => '1000',
  'description'     => 'small test description 1'
];
var_dump($product->update($data));
*/

var_dump($product->delete('KTT2sXu86GVtxmbJdGPeiA=='));

/*
object(stdClass)#6 (5) {
  ["access_token"]=>
  string(64) "4c86db2608811d32d4187ea5ab03411ef3dd17643a71f1f08390d5529b0bae1e"
  ["token_type"]=>
  string(6) "bearer"
  ["expires_in"]=>
  NULL
  ["refresh_token"]=>
  string(64) "0cecaad3e6e2315ade9bbfe7bd375d8561e356dfad42007349133e92a48c34d8"
  ["scope"]=>
  string(13) "edit_products"
}
*/
