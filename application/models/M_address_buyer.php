<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_address_buyer extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function last(){
    	$query  = $this->db->query("SELECT address_id FROM address_buyer_tbl order by address_id DESC LIMIT 1");
    	return $query->result();
    }
	
    public function insert($data) {	
		 //insert data
        $this->db->insert('address_buyer_tbl', $data);
    }
	
}
?>