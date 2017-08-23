<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_village extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function get_village() {
        $query  = $this->db->query("SELECT * FROM village_tbl ");
        return $query->result();
    }
	
}
?>