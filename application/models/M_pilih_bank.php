<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pilih_bank extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    public function pilih_bank() {
    	$query  = $this->db->query("SELECT * FROM pilih_bank_tbl
									ORDER BY qid DESC LIMIT 5
									");
    	return $query->result();
    }
    
   
	
}
?>