<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class RegisterModel extends Model
{
	private $_client;
	// protected $_token = 'c0afd303f5abd30c17285fc853c85600';
	// protected $_service = 'auth_email_signup_user';
	// protected $_moodlewsrestformat = 'json';
	protected $table = 'users';

	public function __construct()
	{
		$this->_client = new Client([
			'base_uri' => 'https://arkalearn.com/webservice/rest/server.php/'
		]);
	}

	public function createUsers($data)
	{
		$response = $this->_client->request('POST', $this->table, [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}
}
