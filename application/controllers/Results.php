<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Results extends CI_Controller {

	public function index()
	{
		$this->init();
	}

	public function init()
	{
		$this->load->model('states');
		$this->load->model('intention');
		$this->load->model('votes');

		$intention = $this->intention->getIntentionResults();
		$votes = $this->votes->getResults();

		$data['voting'] = $intention->voting;
		$data['notvoting'] = ($intention->total - $intention->voting);
		$data['trump'] = $votes->trump;
		$data['hillary'] = $votes->hillary;

		$states = $this->states->getAllStates();

		foreach ($states as $state) {
			$state_intention = $this->intention->getIntentionResults($state->abbreviation);
			$state_votes = $this->votes->getResults($state->abbreviation);

			if ($state_intention->total > 0) {
				$percentage = round($state_intention->voting / $state_intention->total * 100, 1);
	
				$state->voting = $percentage . '% (' . $state_intention->voting . '/' . $state_intention->total . ')';
			} else {
				$state->voting = '-';
			}

			$total = $state_votes->trump + $state_votes->hillary;
			if ($total > 0) {
				$trump_percentage = round($state_votes->trump / $total * 100, 1);
				$hillary_percentage = round($state_votes->hillary / $total * 100, 1);

				$state->trump = $state_votes->trump . ' (' . $trump_percentage . '%)';
				$state->hillary = $state_votes->hillary . ' (' . $hillary_percentage . '%)';
			} else {
				$state->trump = $state_votes->trump;
				$state->hillary = $state_votes->hillary;
			}
		}

		$data['states'] = $states;

		$this->load->view('results', $data);
	}
}
