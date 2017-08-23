<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_product_buyer extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	//Count for Infinite Scrolling
	public function get_all_count_buyer()
    {
        $sql = "SELECT COUNT(*) as tol_records FROM product_tbl";       
        $result = $this->db->query($sql)->row();
        return $result;
    }
	
	public function get_all_content_buyer() {
        $query  = $this->db->query("SELECT * FROM product_tbl");
        return $query->result();
    }
	
	public function get_all_content_buyer_result($page_position, $item_per_page) {
        $query  = $this->db->query("SELECT a.*, b.name as store_name, c.desa 
									FROM  product_tbl a, store_tbl b, address_store_tbl c
									WHERE a.store_id = b.store_id
									AND a.store_id = c.store_id
									AND b.store_id = c.store_id
									order by a.qid DESC LIMIT $page_position, $item_per_page");
        return $query->result();
    }
	
    
	
}
?>