<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clear_cookies extends CI_Controller {

	public function index()
	{
		$this->load->helper('cookie');

		delete_cookie('kineo_state');
		delete_cookie('kineo_intention');
		delete_cookie('kineo_candidate');

		redirect('./../index.php/selection');
	}
}
