<?php 

include_once dirname(__FILE__) . '/../vendor/autoload.php';

session_start();
$_SESSION['gumroad_token'] = '4c86db2608811d32d4187ea5ab03411ef3dd17643a71f1f08390d5529b0bae1e';

use Gumroad\API\Scope;
use Gumroad\API\Authorization;
use Gumroad\API\Service\ProductService;

$authorization = new Authorization( 'a5dac9d52c059da70ccf108b46a2108ae2a32b76dae181c6f38ac2e345f84219', 
							'1ecaa6760e39f22820af00118322831bb7b0335676a84c81098e8dd48093f149', 
							'http://localhost/callback', Scope::EDIT_PRODUCTS );

//$authorization->authorize();
//var_dump( $authorization->token('bc065309a54d4eeabf27e582dba1fc4d90727679a05b4d799e228cea3b7c5c92') );