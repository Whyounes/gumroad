<?php
include_once dirname(__FILE__) . '/../vendor/autoload.php';

session_start();
$_SESSION['gumroad_token'] = '4c86db2608811d32d4187ea5ab03411ef3dd17643a71f1f08390d5529b0bae1e';


use Gumroad\API\Scope;
use Gumroad\API\Authorization;
use Gumroad\API\Service\ProductService;


$product = new ProductService();

echo "<pre>";
var_dump($product->all());

//var_dump($product->find('FRhP1-Wm5DlUPA_E_M7-xw=='));

/*
$data = [
  'name'            => 'test product',
  'url'             => 'http://fb.com',
  'price'           => '10000',
  'description'     => 'small test description'
];
var_dump($product->insert($data));
var_dump($product->update($data));
*/
