<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_store extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function last(){
    	$query  = $this->db->query("SELECT store_id FROM store_tbl order by store_id DESC LIMIT 1");
    	return $query->result();
    }
	
	public function get_all_store() {
        $query  = $this->db->query("SELECT * FROM store_tbl");
        return $query->result();
    }
	
	public function get_all_store_result($page_position, $item_per_page) {
        $query  = $this->db->query("SELECT * FROM  store_tbl a, address_store_tbl b
									WHERE a.store_id = b.store_id
									order by a.qid DESC LIMIT $page_position, $item_per_page");
        return $query->result();
    }
	
	public function get($id) {
        $this->db->select('a.*, b.desc as address, b.desa');
        $this->db->where('a.store_id', $id);
        $this->db->where('a.store_id = b.store_id');
        $query = $this->db->get(' store_tbl a, address_store_tbl b', 1);
        return $query->result_array();
    }
	
    public function insert($data) {	
		 //insert data
        $this->db->insert('store_tbl', $data);
    }
	
}
?>