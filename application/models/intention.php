<?php 
	class Intention extends CI_Model {
		function __construct()
		{
			parent::__construct();
		}

		function getIntentionResults($state = '')
		{
			$results = new stdClass();

			if ($state) {
				$results->voting = $this->db->query("SELECT * FROM intention WHERE intention=1 AND state='" . $state . "'")->num_rows();
				$results->total = $this->db->query("SELECT * FROM intention WHERE state='" . $state . "'")->num_rows();
			} else {
				$results->voting = $this->db->query("SELECT * FROM intention WHERE intention=1")->num_rows();
				$results->total = $this->db->query("SELECT * FROM intention")->num_rows();
			}

			return $results;
		}

		function writeVoteIntention($state, $intention)
		{
			$bool_value = $intention === 'TRUE' ? 1 : 0;
			$data = array(
		        'state' => $state,
		        'intention' => $bool_value
	        );

	        $this->db->insert('intention', $data);
		}
	}
?>