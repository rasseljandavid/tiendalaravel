<?php

class SMSnotification {
	
	private $apikey;
	private $number;
	private $url;
	

	public function __construct() {
		$this->apikey = 'MNARD506884_5P2XL';
		$this->url = "https://www.itexmo.com/php_api/api.php";
		$this->number = '';
	}

	public function send($name){
			$message = 'You have a new order in tienda.ph from ';
			if(!empty($this->number)) {
				$ch = curl_init();
				$sms = array('1' => $this->number, '2' => $message.$name, '3' => $this->apikey);
				curl_setopt($ch, CURLOPT_URL,$this->url);
				curl_setopt($ch, CURLOPT_POST, 1);
				 curl_setopt($ch, CURLOPT_POSTFIELDS, 
				          http_build_query($sms));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$r = curl_exec ($ch);
				curl_close ($ch);

				return true;
			}
			return false;
	}

}

