<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voting extends CI_Controller {

	public function index()
	{
		$this->vote();
	}

	public function vote()
	{
		$this->load->helper('cookie');
		$this->load->model('states');
		$this->load->model('intention');
		$this->load->model('votes');

		$data['state_fullname'] = '';
		$statenames = [];

		$data['kineo_state'] = get_cookie('kineo_state');
		$data['kineo_intention'] = get_cookie('kineo_intention');
		$data['kineo_candidate'] = get_cookie('kineo_candidate');


		if (!$data['kineo_candidate']) {
			if (isset($_GET['candidate'])) {
				if ($_GET['candidate'] === 'TRUMP' ||
					$_GET['candidate'] === 'HILLARY') {
					$data['kineo_candidate'] = $_GET['candidate'];
					$this->votes->writeVote($data['kineo_state'], $data['kineo_candidate']);
					set_cookie('kineo_candidate', $data['kineo_candidate'], 2592000);
				}
			}
		}



		// INTENTION TO VOTE VALIDATION
		if ($data['kineo_state']) {
			if ($data['kineo_intention']) {
				if (isset($_GET['vote'])) {
					if ($data['kineo_intention'] !== $_GET['vote']) {
						redirect('./voting?state=' . $data['kineo_state'] . '&vote=' . $data['kineo_intention']);
					}
				} else {
					redirect('./voting?state=' . $data['kineo_state'] . '&vote=' . $data['kineo_intention']);
				}
			} else {
				if (isset($_GET['vote'])) {
					if ($_GET['vote'] === 'TRUE' || $_GET['vote'] === 'FALSE') {
						$this->intention->writeVoteIntention($data['kineo_state'], $_GET['vote']);
						$data['kineo_intention'] = $_GET['vote'];
						set_cookie('kineo_intention', $_GET['vote'], 2592000);
					} else {
						redirect('./voting?state=' . $data['kineo_state']);
					}
				}
			}
		}



		// DISPLAYING INTENTION RESULTS
		$data['voting_results'] = '';
		if ($data['kineo_intention'] === 'TRUE' ||
			$data['kineo_intention'] === 'FALSE') {

			$results = $this->intention->getIntentionResults();

			if ($results->total > 0) {
				$percentage = round($results->voting / $results->total * 100, 1);

				$data['voting_results'] =
				'<div class="progress">' .
					'<div class="progress-bar progress-bar-success" style="width: ' . $percentage . '%"></div>' .
				'</div>' .
				'<p><strong>VOTING</strong>: ' . $percentage . '% (' . $results->voting . ' votes)</p>' .
				'<p><strong>NOT VOTING</strong>: ' . (100 - $percentage) . '% (' . ($results->total - $results->voting) . ' votes)</p>';
			}
		}

		$data['result_buttons'] = '';
		if ($data['kineo_intention'] === 'FALSE' ||
			($data['kineo_intention'] === 'TRUE' &&
			($data['kineo_candidate'] === 'TRUMP' ||
			$data['kineo_candidate'] === 'HILLARY'))) {
			$data['result_buttons'] =
			'<div class="form-group">' .
				'<div class="col-lg-10 col-lg-offset-2">' .
					'<a href="results" class="btn btn-primary">View results</a>' .
				'</div>' .
			'</div>';
		}



		// STATE MUST BE DEFINED
		if ($data['kineo_state']) {
			if (!isset($_GET['state'])) {
				redirect('./voting?state=' . $data['kineo_state']);
			} else if ($data['kineo_state'] !== $_GET['state']) {
				if (!$data['kineo_intention']) {
					$data['kineo_state'] = $_GET['state'];
					delete_cookie('kineo_state');
				}
				
				redirect('./voting?state=' . $data['kineo_state']);
			}
		}

		if (isset($_GET['state'])) {
			$statenames = $this->states->getName($_GET['state']);

			if ($statenames) {
				$data['kineo_state'] = $_GET['state'];
				set_cookie('kineo_state', $data['kineo_state'], 2592000);
				$data['state_fullname'] = $data['kineo_state'] . ' - ' . $statenames[0]->name;
				$this->load->view('voting', $data);
			} else {
				redirect('./selection');
			}
		}
	}
}
