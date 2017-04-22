<?php 
	class Intention extends CI_Model {
		function __construct()
		{
			parent::__construct();
		}

		function getIntentionResults($state = '')
		{
			$results = new stdClass();
			$results->voting = $this->db->query("SELECT * FROM intention WHERE intention=1")->num_rows();
			$results->total = $this->db->query("SELECT * FROM intention")->num_rows();

			return $results;
		}
	}
?>