<?php 
	class Votes extends CI_Model {
		function __construct()
		{
			parent::__construct();
		}

		function getResults($state)
		{
			$results = new stdClass();

			if ($state) {
				$results->trump = $this->db->query("SELECT * FROM votes WHERE candidate='TRUMP' AND state='" . $state . "'")->num_rows();
				$results->hillary = $this->db->query("SELECT * FROM votes WHERE candidate='HILLARY' AND state='" . $state . "'")->num_rows();
			} else {
				$results->trump = $this->db->query("SELECT * FROM votes WHERE candidate='TRUMP'")->num_rows();
				$results->hillary = $this->db->query("SELECT * FROM votes WHERE candidate='HILLARY'")->num_rows();
			}

			return $results;
		}

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