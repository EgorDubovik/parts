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

	private $token;

	
	public function __construct(){
		$this->userName  = env('REL_USER_NAME','username');
		$this->userPass = env('REK_USER_PASS','userpass');				
		$this->client = new Client();

	}
	

	//  Check if we have vallid token for API. If not - make new one
	private function chackTokenOrGetNew(){
		$date = date('Y-m-d H:i:s', strtotime('-9 hour'));
		$token = Token::where('created_at','>',$date)->first();
		dd($token);
		if($token){
			$this->token = $token;
		} else {
			$this->toke = $this->getNewToken();
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
			Token::truncate();
			$token = new Token;
			$token->token = $data['accessToken'];
			$token->save();

			return $token->token;
			
		} else {
			return "undefined";
		}
		

	}

	public function test(){
		$this->chackTokenOrGetNew();
	}

}
?>