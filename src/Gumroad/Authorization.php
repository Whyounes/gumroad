<?php 
namespace Gumroad;

use \Curl\Curl;

/*
* 
*/
class Authorization{
	private $client_id;
	private $redirect_uri;
	private $scope;

	private $authorization_url = "https://gumroad.com/oauth/authorize";
	
	
	/**
	* @param $client_id 		string Gumroad client id, can be found on the registred app.
	* @param $redirect_uri 		string Url to send response to.
	* @param $scropt			string Access level ( edit_products | view_sales | revenue_share )
	*/
	function __construct( $client_id, $redirect_uri, $scope = null ){
		$this->client_id = $client_id;
		$this->redirect_uri = $redirect_uri;
		$this->scope = $scope;

        $curl = new Curl();
	}//construct

	public function authorize(){
		
	}//authorize



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
}//class
