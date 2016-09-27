<?php

class Megaventory {
	
	const APIKEY 	 = "c8c3ec7f1b65dc9d@m11394";
	const TIENDA_ID  = "492";
	const LOCATION   = "2";

	public	function getCategories() {

		return $this->megaventoryRequest('ProductCategoryGet', [
				'APIKEY' => Megaventory::APIKEY,
				'query'  => "mv.ProductCategoryID != 0 ORDER BY mv.ProductCategoryName"
			]);
	}

	public function getProducts($includeReferencedObjects = false) {

		return $this->megaventoryRequest('ProductGet', [
				'APIKEY' => Megaventory::APIKEY, 
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
		$params['APIKEY'] = Megaventory::APIKEY;

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
