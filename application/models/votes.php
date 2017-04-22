<?php 
	class Votes extends CI_Model {
		function __construct()
		{
			parent::__construct();
		}

		// function getIntentionResults($state = '')
		// {
		// 	$results = new stdClass();
		// 	$results->voting = $this->db->query("SELECT * FROM intention WHERE intention=1")->num_rows();
		// 	$results->total = $this->db->query("SELECT * FROM intention")->num_rows();

		// 	return $results;
		// }

		function writeVote($state, $candidate)
		{
			$data = array(
		        'state' => $state,
		        'candidate' => $candidate
	        );

	        $this->db->insert('votes', $data);
		}
	}
?>