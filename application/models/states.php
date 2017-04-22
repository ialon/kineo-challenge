<?php 
	class States extends CI_Model {
		function __construct()
		{
			parent::__construct();
		}

		function getName($abbreviation)
		{
			$query = $this->db->query("SELECT name FROM states WHERE abbreviation='" . $abbreviation . "'");

			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return NULL;
			}
		}

		function getAllStates()
		{
			$query = $this->db->query("SELECT * FROM states");

			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return NULL;
			}
		}
	}
?>