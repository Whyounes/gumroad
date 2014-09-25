<?php
include_once dirname(__FILE__) . '/../vendor/autoload.php';

session_start();
$_SESSION['gumroad_token'] = '4c86db2608811d32d4187ea5ab03411ef3dd17643a71f1f08390d5529b0bae1e';


use Gumroad\API\Scope;
use Gumroad\API\Authorization;
use Gumroad\API\Service\ProductService;

$product = new \Gumroad\API\Product();
$product->id = 'FRhP1-Wm5DlUPA_E_M7-xw==';

echo "<pre>";
//var_dump($product->categories());
//$category = new \Gumroad\API\Category( 'Jx9pjqEqmDp1HuqYL_991A==', 'ALOaa', $product );
$category_service = new \Gumroad\API\Service\CategoryService();
var_dump($category_service->delete( $product, 'Jx9pjqEqmDp1HuqYL_991A==' ));
