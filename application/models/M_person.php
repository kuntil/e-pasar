<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_person extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function last(){
    	$query  = $this->db->query("SELECT person_id FROM person_tbl order by person_id DESC LIMIT 1");
    	return $query->result();
    }
	
    public function insert($data) {	
		 //insert data
        $this->db->insert('person_tbl', $data);
    }
	
}
?>