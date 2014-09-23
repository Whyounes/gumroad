<?php 
namespace Gumroad\API\Service;

use \Curl\Curl;

session_start();
abstract class Service{
	protected $token;
	protected $curl;
	protected $api_url;

	public function __construct( $token = NULL ){
		if( !$token )
			$this->setSessionToken();
		else
			$this->token = $token;

        $this->api_url = "https://api.gumroad.com/v2/products";
		$this->curl = new Curl;
	}//construct
	
	public function getToken(){
		return $this->token;
	}//getToken

	private function setSessionToken(){
		if( isset($_SESSION["gumroad_token"]) )
			$this->token = $_SESSION["gumroad_token"];
		else
			throw new Exception("Session token not found, use `gumroad_token` to set a valid token.");
	}//setSessionToken

    public static function instance(){
        return new static;
    }//instance

}//Category
