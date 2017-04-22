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

		$data['vote'] = '';
		$data['state'] = '';
		$statenames = [];




		// INTENTION TO VOTE VALIDATION
		$kineo_state = get_cookie('kineo_state');
		$kineo_intention = get_cookie('kineo_intention');

		if (isset($_GET['vote'])) {
			$data['vote'] = $_GET['vote'];

			if ($kineo_intention) {
				if ($kineo_intention != $_GET['vote']) {
					redirect('./voting?state=' . $kineo_state . '&vote=' . $kineo_intention);
				}
			} else {
				set_cookie('kineo_intention', $_GET['vote'], 2592000);
			}
		} else if ($kineo_state && $kineo_intention) {
			redirect('./voting?state=' . $kineo_state . '&vote=' . $kineo_intention);
		}



		// DISPLAYING RESULTS
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




		// STATE MUST BE DEFINED
		$kineo_state = get_cookie('kineo_state');
		if ($kineo_state) {
			if (!isset($_GET['state'])) {
				redirect('./voting?state=' . $kineo_state);
			} else if ($kineo_state != $_GET['state']) {
				redirect('./voting?state=' . $kineo_state);
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
