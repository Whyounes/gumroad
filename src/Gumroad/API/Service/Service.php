<?php 
namespace Gumroad\API\Service;

use \Curl\Curl;

session_start();
abstract class Service{
	protected $token;
	protected $curl;
	protected $api_url = "https://api.gumroad.com/v2/products";

	public function __construct( $token ){
		if( !$token )
			$this->setSessionToken();
		else
			$this->token = $token;


		$this->curl = new Curl;
	}//construct
	
	public function getToken(){
		return $this->token;
	}//getToken

	private function setSessionToken(){
		if( isset($_SESSION["gumroad_token"]) )
			$token = $_SESSION["gumroad_token"];
		else
			throw new Exception("Session token not found, use `gumroad_token` to set a valid token.");	
	}//setSessionToken


	/**
	* Used from laravel Illuminate\Support\Facades\Facade
	*/
	public static function __callStatic($method, $args){
		//$instance = new static;
		var_dump( new static);
		var_dump($method);die();
		switch (count($args))
		{
			case 0:
				return $instance->$method();

			case 1:
				return $instance->$method($args[0]);

			case 2:
				return $instance->$method($args[0], $args[1]);

			case 3:
				return $instance->$method($args[0], $args[1], $args[2]);

			case 4:
				return $instance->$method($args[0], $args[1], $args[2], $args[3]);

			default:
				return call_user_func_array(array($instance, $method), $args);
		}
	}//callStatic

}//Category
