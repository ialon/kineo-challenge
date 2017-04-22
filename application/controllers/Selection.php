<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Selection extends CI_Controller {

	public function index()
	{
		$this->init();
	}

	public function init()
	{
		$this->load->helper('cookie');
		$this->load->model('states');

		$data['states'] = $this->states->getAllStates();
		$data['selected'] = get_cookie('kineo_state');

		$this->load->view('selection', $data);
	}
}
