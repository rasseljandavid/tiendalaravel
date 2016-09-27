<?php

class Megaventory {
	
	private $apikey;
	const TIENDA_ID  = "492";
	const LOCATION   = "2";

	public function __construct() {
		$this->apikey = env('MEGAVENTORY_API');
	}

	public	function getCategories() {

		return $this->megaventoryRequest('ProductCategoryGet', [
				'APIKEY' => $this->apikey,
				'query'  => "mv.ProductCategoryID != 0 ORDER BY mv.ProductCategoryName"
			]);
	}

	public function getProducts($includeReferencedObjects = false) {

		return $this->megaventoryRequest('ProductGet', [
				'APIKEY' => $this->apikey, 
				'includeReferencedObjects'  => $includeReferencedObjects
			]);
	} 

	public function getInventory($includeReferencedObjects = false, $ShowOnlyProductsWithPositiveQty = false, $ShowOnlyProductsThanNeedToBeOrdered = false) {

		return $this->megaventoryRequest('InventoryLocationStockGet', [
				'includeReferencedObjects'  => $includeReferencedObjects,
				'ShowOnlyProductsWithPositiveQty'  => $ShowOnlyProductsWithPositiveQty,
				'ShowOnlyProductsThanNeedToBeOrdered'  => $ShowOnlyProductsThanNeedToBeOrdered
			]);
	}

	public function createSalesOrder($order) {

		return  $this->megaventoryRequest('SalesOrderUpdate', [
					'mvSalesOrder'  => $order	
				], true);
	}

	private function megaventoryRequest($apiMethod, $params = array(), $jsonRequest = false) {
		//Insert the apikey
		$params['APIKEY'] = $this->apikey;

		//Build the URL
		$url = $this->buildUrl($apiMethod);

		//Create the request
		$curl = new Curl\Curl();

		// Check if we need a json request
		if($jsonRequest) {
			$curl->setHeader('Content-Type', 'application/json');
			$params = json_encode($params);
		}

		$curl->post($this->buildUrl($apiMethod), $params);

		if ($curl->error) {
		    return $curl->error_code;
		}
		else {
		    $res = json_decode($curl->response);
		    $key = $this->getResponseKey($apiMethod);

		  	return $res->$key;
		}
	}

	private function buildUrl($apiMethod) {
		return 'http://api.megaventory.com/v2/json/reply/' . $apiMethod . '?format=json';
	}

	private function getResponseKey($apiMethod) {

		switch ($apiMethod) {
			case 'InventoryLocationStockGet':
				return 'mvProductStockList';
				break;
			case 'ProductGet':
				return 'mvProducts';
				break;
			case 'ProductCategoryGet':
				return 'mvProductCategories';
				break;
			case 'SalesOrderUpdate':
				return 'mvSalesOrder';
				break;

		}
	}

}
