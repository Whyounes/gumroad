<?php 
namespace Gumroad\API;

use \Curl\Curl;
use Gumroad\API\Service\ProductService;


/**
*	Class for managing a single product
*/
class Product{
	public $custom_permalink;
	public $custom_receipt;
	public $custom_summary;
	public $custom_fields;
	public $customizable_price;
	public $description;
	public $deleted;
	public $max_purchase_count;
	public $name;
	public $preview_url;
	public $require_shipping;
	public $subscription_duration;
	public $published;
	public $url;
	public $webhook;
	public $id;
	public $custom_product_type;
	public $countries_available;
	public $price;
	public $currency;
	public $short_url;
	public $formatted_price;
	public $file_info;
	public $shown_on_profile;
	public $view_count;
	public $sales_count;
	public $sales_usd_cents;

	private $productService;
	private $categoryService;

	public function __construct( ProductService $productService, CategoryService $categoryService ){
		$this->productService = $productService;
		$this->categoryService = $categoryService;
		
		/*		
		$this->custom_permalink = $data['custom_permalink'];
		$this->custom_receipt = $data['custom_receipt'];
		$this->custom_summary = $data['custom_summary'];
		$this->custom_fields = $data['custom_fields'];
		$this->customizable_price = $data['customizable_price'];
		$this->description = $data['description'];
		$this->deleted = $data['deleted'];
		$this->max_purchase_count = $data['max_purchase_count'];
		$this->name = $data['name'];
		$this->preview_url = $data['preview_url'];
		$this->require_shipping = $data['require_shipping'];
		$this->subscription_duration = $data['subscription_duration'];
		$this->published = $data['published'];
		$this->url = $data['url'];
		$this->webhook = $data['webhook'];
		$this->id = $data['id'];
		$this->custom_product_type = $data['custom_product_type'];
		$this->countries_available = $data['countries_available'];
		$this->price = $data['price'];
		$this->currency = $data['currency'];
		$this->short_url = $data['short_url'];
		$this->formatted_price = $data['formatted_price'];
		$this->file_info = $data['file_info'];
		$this->shown_on_profile = $data['shown_on_profile'];
		$this->view_count = $data['view_count'];
		$this->sales_count = $data['sales_count'];
		$this->sales_usd_cents = $data['sales_usd_cents'];
		*/
	}//construct

	/**
	*	Fetch an stdClass or an Array to this class
	*/
	public function fetch( $obj ){
		if( gettype($obj) === "array" ){
			$this->fetchArray( $obj );
		}//if
		else if( gettype($obj) === "object" ){
			if( get_class( $obj ) === "stdClass" ){
				$this->fetchObj( $obj );
			}//if
			else{
				throw new Exception("Method accepts only an array or an stdClass");
			}//else
		}//else if
		else{
			throw new Exception("Method accepts only an array or an stdClass");
		}//else
	}//fetch

	private function fetchArray( $data ){
		$this->custom_permalink = isset( $data['custom_permalink']) ? $data['custom_permalink'] : "";
		$this->custom_receipt = isset( $data['custom_receipt']) ? $data['custom_receipt'] : "";
		$this->custom_summary = isset( $data['custom_summary']) ? $data['custom_summary'] : "";
		$this->custom_fields = isset( $data['custom_fields']) ? $data['custom_fields'] : "";
		$this->customizable_price = isset( $data['customizable_price']) ? $data['customizable_price'] : "";
		$this->description = isset( $data['description']) ? $data['description'] : "";
		$this->deleted = isset( $data['deleted']) ? $data['deleted'] : "";
		$this->max_purchase_count = isset( $data['max_purchase_count']) ? $data['max_purchase_count'] : "";
		$this->name = isset( $data['name']) ? $data['name'] : "";
		$this->preview_url = isset( $data['preview_url']) ? $data['preview_url'] : "";
		$this->require_shipping = isset( $data['require_shipping']) ? $data['require_shipping'] : "";
		$this->subscription_duration = isset( $data['subscription_duration']) ? $data['subscription_duration'] : "";
		$this->published = isset( $data['published']) ? $data['published'] : "";
		$this->url = isset( $data['url']) ? $data['url'] : "";
		$this->webhook = isset( $data['webhook']) ? $data['webhook'] : "";
		$this->id = isset( $data['id']) ? $data['id'] : "";
		$this->custom_product_type = isset( $data['custom_product_type']) ? $data['custom_product_type'] : "";
		$this->countries_available = isset( $data['countries_available']) ? $data['countries_available'] : "";
		$this->price = isset( $data['price']) ? $data['price'] : "";
		$this->currency = isset( $data['currency']) ? $data['currency'] : "";
		$this->short_url = isset( $data['short_url']) ? $data['short_url'] : "";
		$this->formatted_price = isset( $data['formatted_price']) ? $data['formatted_price'] : "";
		$this->file_info = isset( $data['file_info']) ? $data['file_info'] : "";
		$this->shown_on_profile = isset( $data['shown_on_profile']) ? $data['shown_on_profile'] : "";
		$this->view_count = isset( $data['view_count']) ? $data['view_count'] : "";
		$this->sales_count = isset( $data['sales_count']) ? $data['sales_count'] : "";
		$this->sales_usd_cents = isset( $data['sales_usd_cents']) ? $data['sales_usd_cents'] : "";
	}//fetchArray

	private function fetchObj( $obj ){
		$this->custom_permalink = isset($obj->custom_permalink) ? $obj->custom_permalink : "";
		$this->custom_receipt = isset($obj->custom_receipt) ? $obj->custom_receipt : "";
		$this->custom_summary = isset($obj->custom_summary) ? $obj->custom_summary : "";
		$this->custom_fields = isset($obj->custom_fields) ? $obj->custom_fields : "";
		$this->customizable_price = isset($obj->customizable_price) ? $obj->customizable_price : "";
		$this->description = isset($obj->description) ? $obj->description : "";
		$this->deleted = isset($obj->deleted) ? $obj->deleted : "";
		$this->max_purchase_count = isset($obj->max_purchase_count) ? $obj->max_purchase_count : "";
		$this->name = isset($obj->name) ? $obj->name : "";
		$this->preview_url = isset($obj->preview_url) ? $obj->preview_url : "";
		$this->require_shipping = isset($obj->require_shipping) ? $obj->require_shipping : "";
		$this->subscription_duration = isset($obj->subscription_duration) ? $obj->subscription_duration : "";
		$this->published = isset($obj->published) ? $obj->published : "";
		$this->url = isset($obj->url) ? $obj->url : "";
		$this->webhook = isset($obj->webhook) ? $obj->webhook : "";
		$this->id = isset($obj->id) ? $obj->id : "";
		$this->custom_product_type = isset($obj->custom_product_type) ? $obj->custom_product_type : "";
		$this->countries_available = isset($obj->countries_available) ? $obj->countries_available : "";
		$this->price = isset($obj->price) ? $obj->price : "";
		$this->currency = isset($obj->currency) ? $obj->currency : "";
		$this->short_url = isset($obj->short_url) ? $obj->short_url : "";
		$this->formatted_price = isset($obj->formatted_price) ? $obj->formatted_price : "";
		$this->file_info = isset($obj->file_info) ? $obj->file_info : "";
		$this->shown_on_profile = isset($obj->shown_on_profile) ? $obj->shown_on_profile : "";
		$this->view_count = isset($obj->view_count) ? $obj->view_count : "";
		$this->sales_count = isset($obj->sales_count) ? $obj->sales_count : "";
		$this->sales_usd_cents = isset($obj->sales_usd_cents) ? $obj->sales_usd_cents : "";
	}//fetchObj

	/*
		Update the product or insert it as a new one
	*/
   	public function save(){
   		if( isset($this->id) ){
   			$this->update();
   		}//if
   		else{
   			$this->insert();
   		}//else
   	}//save

   	/**
	*	Insert a new record to database
   	*/
	public function insert( $data ){
		if( !$data )
			$data = [
				'name'						=> $this->name,
				'url'						=> $this->url,
				'price'						=> $this->price,
				'description'				=> isset( $this->description ) ? $this->description : NULL,
				'preview_url'				=> isset( $this->preview_url ) ? $this->preview_url : NULL,
				'countries_available'		=> isset( $this->countries_available ) ? $this->countries_available : NULL,
				'max_purchase_count'		=> isset( $this->max_purchase_count ) ? $this->max_purchase_count : NULL,
				'customizable_price'		=> isset( $this->customizable_price ) ? $this->customizable_price : NULL,
				'webhook'					=> isset( $this->webhook ) ? $this->webhook : NULL,
				'require_shipping'			=> isset( $this->require_shipping ) ? $this->require_shipping : NULL,
				'shown_on_profile'			=> isset( $this->shown_on_profile ) ? $this->shown_on_profile : NULL,
				'custom_receipt'			=> isset( $this->custom_receipt ) ? $this->custom_receipt : NULL,
				'custom_summary'			=> isset( $this->custom_summary ) ? $this->custom_summary : NULL,
				'custom_product_type'		=> isset( $this->custom_product_type ) ? $this->custom_product_type : NULL,
				//'custom_filetype'			=> isset( $this->custom_filetype ) ? $this->custom_filetype : NULL,
				'custom_permalink'			=> isset( $this->custom_permalink ) ? $this->custom_permalink : NULL
			];

		return $this->productService->insert( $data );
	}//insert

   	/**
	*	Update the current 
   	*/
	public function update( $data ){
		$data = [
			'id'						=> $this->id,
			'name'						=> $this->name,
			'url'						=> $this->url,
			'price'						=> $this->price,
			'description'				=> $this->description,
			'preview_url'				=> $this->preview_url,
			'countries_available'		=> $this->countries_available,
			'max_purchase_count'		=> $this->max_purchase_count,
			'customizable_price'		=> $this->customizable_price,
			'webhook'					=> $this->webhook,
			'require_shipping'			=> $this->require_shipping,
			'shown_on_profile'			=> $this->shown_on_profile,
			'custom_receipt'			=> $this->custom_receipt,
			'custom_summary'			=> $this->custom_summary,
			'custom_product_type'		=> $this->custom_product_type,
			//'custom_filetype'			=> $this->custom_filetype,
			'custom_permalink'			=> $this->custom_permalink
		];

		return $this->productService->update( $data );
   	}//update

   	/**
	*	Delete the product
   	*/
   	public function delete(){
   		return $this->productService->delete( $$this->id );
   	}//delete

   	/**
	*	Enable the current product
   	*/
   	public function enable(){
   		return $this->productService->enable( $$this->id );
   	}//enable

   	/**
	*	Enable the current product
   	*/
   	public function disable(){
   		return $this->productService->disable( $$this->id );
   	}//enable

   	/**
	*	Get the status of the current prosuct
   	*/
   	public function isEnabled(){
   		return $this->published;
   	}//enable

   	/**
	* Get the list of categories for the current product
   	*/
	public function categories(){
		$this->categoryService->categories( $this->id );
	}//categories


   	public function __toString(){
   		return $this->id;
   	}//toString

}//product
