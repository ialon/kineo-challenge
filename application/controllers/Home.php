<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->init();
	}

	public function init()
	{
		$this->load->model('states');

		$data['states'] = $this->states->getAllStates();

		$this->load->view('home', $data);
	}
}
