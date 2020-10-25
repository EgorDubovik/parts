<?php
namespace App\Http\Helpers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Models\Token;


class GetPartsInfo
{
	// User name for relaible parts
	private $userName = 'default name';

	// User pass for relaible parts
	private $userPass;

	private $globalURL = 'https://prodapi.reliableparts.net/us/';
	private $userloginURL = 'accountapp/v1/security/api/auth/login';

	private $client;

	
	public function __construct(){
		$this->userName  = env('REL_USER_NAME','username');
		$this->userPass = env('REK_USER_PASS','userpass');				
		$this->client = new Client();
	}
	

	//  Check if we have vallid token for API. If not - make new one
	private function chackTokenOrGetNew(){
		$date = today()->format('Y-m-d');
		$token = Token::whereDate('created_at','>',$date)->first();
		if($token){
			dd($token);
		} else {
			$this->getNewToken();
		}
		
	}

	private function getNewToken(){
		$response = $this->client->post($this->globalURL.$this->userloginURL,
			[
        		'body' => json_encode(
	        		[
					'username'=>$this->userName,
					'password'=>$this->userPass
					]),
        		'headers' => 
        			[
        				'Content-type' => 'application/json'
        			]
        	]);
		if($response->getStatusCode()==200){
			$data = json_decode($response->getBody()->getContents(),true);
			dd($data['accessToken']);
		} else {

		}
		

	}

	public function test(){
		$this->chackTokenOrGetNew();
	}

}
?>