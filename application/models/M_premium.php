<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_premium extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    public function upgrade() {
    	$query  = $this->db->query("SELECT * FROM premium_tbl
									ORDER BY qid DESC LIMIT 5
									");
    	return $query->result();
    }
    
   
	
}
?>