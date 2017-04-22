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

		$data['vote'] = '';
		$data['state'] = '';
		$statenames = [];

		$data['kineo_state'] = get_cookie('kineo_state');
		$data['kineo_intention'] = get_cookie('kineo_intention');
		$data['kineo_candidate'] = get_cookie('kineo_candidate');


		if (!$data['kineo_candidate']) {
			if (isset($_GET['candidate'])) {
				if ($_GET['candidate'] === 'TRUMP' ||
					$_GET['candidate'] === 'HILLARY') {
					$data['kineo_candidate'] = $_GET['candidate'];
					$this->votes->writeVote($data['kineo_state'], $_GET['candidate']);
					set_cookie('kineo_candidate', $_GET['candidate'], 2592000);
				}
			}
		}



		// INTENTION TO VOTE VALIDATION
		if (isset($_GET['vote'])) {
			$data['vote'] = $_GET['vote'];

			if ($data['kineo_intention']) {
				if ($data['kineo_intention'] != $_GET['vote']) {
					redirect('./voting?state=' . $data['kineo_state'] . '&vote=' . $data['kineo_intention']);
				}
			} else {
				if ($data['kineo_state'] && ($_GET['vote'] === 'TRUE' || $_GET['vote'] === 'FALSE')) {
					$this->intention->writeVoteIntention($data['kineo_state'], $_GET['vote']);
					$data['kineo_intention'] = $_GET['vote'];
					set_cookie('kineo_intention', $_GET['vote'], 2592000);
				} else {
					redirect('./voting?state=' . $data['kineo_state']);
				}
			}
		} else if ($data['kineo_state'] && $data['kineo_intention']) {
			redirect('./voting?state=' . $data['kineo_state'] . '&vote=' . $data['kineo_intention']);
		}



		// DISPLAYING INTENTION RESULTS
		$data['voting_results'] = '';
		if ($data['vote'] === 'TRUE' ||
			$data['vote'] === 'FALSE') {

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

		$data['voting_buttons'] = '';
		if ($data['vote'] === 'FALSE') {
			$data['voting_buttons'] =
			'<div class="form-group">' .
				'<div class="col-lg-10 col-lg-offset-2">' .
					'<button type="submit" class="btn btn-primary">View results</button>' .
				'</div>' .
			'</div>';
		}

		$data['result_buttons'] = '';
		if ($data['vote'] === 'TRUE' &&
			($data['kineo_candidate'] === 'TRUMP' ||
			$data['kineo_candidate'] === 'HILLARY')) {
			$data['result_buttons'] =
			'<div class="form-group">' .
				'<div class="col-lg-10 col-lg-offset-2">' .
					'<button type="submit" class="btn btn-primary">View results</button>' .
				'</div>' .
			'</div>';
		}


		// STATE MUST BE DEFINED
		if ($data['kineo_state']) {
			if (!isset($_GET['state'])) {
				redirect('./voting?state=' . $data['kineo_state']);
			} else if ($data['kineo_state'] != $_GET['state']) {
				redirect('./voting?state=' . $data['kineo_state']);
			}
		} 

		if (isset($_GET['state'])) {
			$statenames = $this->states->getName($_GET['state']);
			set_cookie('kineo_state', $_GET['state'], 2592000);

			if ($statenames) {
				$data['state'] = $_GET['state'] . ' - ' . $statenames[0]->name;
				$this->load->view('voting', $data);
			} else {
				redirect('./selection');
			}
		}
	}
}
