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

		$data['vote'] = '';
		$data['state'] = '';
		$statenames = [];


		if (isset($_GET['vote'])) {
			$data['vote'] = $_GET['vote'];
		}


		$data['voting_results'] = '';
		if ($data['vote'] === 'YES' ||
			$data['vote'] === 'NO') {

			$results = new stdClass();
			$results->voting = 300;
			$results->total = 1000;

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
		if ($data['vote'] === 'NO') {
			$data['voting_buttons'] =
			'<div class="form-group">' .
				'<div class="col-lg-10 col-lg-offset-2">' .
					'<button type="submit" class="btn btn-primary">View results</button>' .
				'</div>' .
			'</div>';
		}

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
