<?php 
namespace Gumroad\API;

use \Curl\Curl;

/*
* 
*/
class Authorization{
	private $client_id;
    private $client_secret;
	private $redirect_uri;
	private $scope;

	private $authorization_url = "https://gumroad.com/oauth/authorize";
    private $token_url = "https://gumroad.com/oauth/token";
	private $curl;
	
	/**
	* @param $client_id 		string Gumroad client id, can be found on the registred app.
	* @param $redirect_uri 		string Url to send response to.
	* @param $scrop			    string Access level ( Scope::EDIT_PRODUCTS | Scope::VIEW_SALES | Scope::REVENUE_SHARE )
	*/
	function __construct( $client_id, $client_secret, $redirect_uri, $scope = null ){
		$this->client_id = $client_id;
        $this->client_secret = $client_secret;
		$this->redirect_uri = $redirect_uri;
		$this->scope = $scope;

        $this->curl = new Curl();
	}//construct

	public function authorize(){
		$this->curl->get( $this->authorization_url, [
            'client_id'         => $this->client_id,
            'redirect_uri'      => $this->redirect_uri,
            'scope'             => $this->scope
        ] );
	}//authorize

    public function token( $code ){
        $res = $this->curl->post( $this->token_url, [
            'client_id'         => $this->client_id,
            'client_secret'     => $this->client_secret,
            'redirect_uri'      => $this->redirect_uri,
            'code'              => $code
        ] );

        return $res;
    }//token

    /**
     * Gets the value of redirect_uri.
     *
     * @return mixed
     */
    public function getRedirectUri()
    {
        return $this->redirect_uri;
    }

    /**
     * Sets the value of redirect_uri.
     *
     * @param mixed $redirect_uri the redirect  uri 
     *
     * @return self
     */
    private function setRedirectUri($redirect_uri)
    {
        $this->redirect_uri = $redirect_uri;

        return $this;
    }

    /**
     * Gets the value of scope.
     *
     * @return mixed
     */
    public function getScope()
    {
        return $this->scope;
    }
    
    /**
     * Sets the value of scope.
     *
     * @param mixed $scope the scope 
     *
     * @return self
     */
    private function setScope($scope)
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * Gets the value of client_id.
     *
     * @return mixed
     */
    public function getClientId()
    {
        return $this->client_id;
    }
    
    /**
     * Sets the value of client_id.
     *
     * @param mixed $client_id the client  id 
     *
     * @return self
     */
    private function setClientId($client_id)
    {
        $this->client_id = $client_id;

        return $this;
    }

    /**
     * Gets the value of client_secret.
     *
     * @return mixed
     */
    public function getClientSecret()
    {
        return $this->client_secret;
    }
    
    /**
     * Sets the value of client_secret.
     *
     * @param mixed $client_secret the client  secret 
     *
     * @return self
     */
    private function _setClientSecret($client_secret)
    {
        $this->client_secret = $client_secret;

        return $this;
    }
}//class
