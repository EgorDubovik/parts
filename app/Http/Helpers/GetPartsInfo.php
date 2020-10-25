<?php
namespace App\Http\Helpers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class GetPartsInfo
{
	// User name for relaible parts
	private $userName = 'default name';

	// User pass for relaible parts
	private $userPass;

	private $globalURL = 'https://prodapi.reliableparts.net/us/';
	private $userloginURL = 'accountapp/v1/security/api/auth/log';

	private $client;

	
	public function __construct(){
		$this->userName  = env('REL_USER_NAME','username');
		$this->userPass = env('REK_USER_PASS','userpass');				
		$this->client = new Client();
	}
	

	//  Check if we have vallid token for API. If not - make new one
	private function chackTokenOrGetNew(){
		
	}

	private function getNewToken(){
		return $this->userName;
	}

	public function test(){
		$URL = 'http://httpbin.org/get';
		$request = $this->client->get($URL);
		$statusCode = $request->getStatusCode();
		$data = array();
		if($statusCode==200){
			$data = json_decode($request->getBody()->getContents(),true);
		}
		dd($data);	
	}

}
?>