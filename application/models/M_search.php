<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_search extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function get_all_count($search)
    {
        $sql = "SELECT COUNT(*) as tol_records FROM  product_tbl 
				WHERE name like '%$search%'";       
        $result = $this->db->query($sql)->row();
        return $result;
    }
	
	public function get_all_count2($search, $id)
    {
        $sql = "SELECT COUNT(*) as tol_records FROM  product_tbl a, product_category_tbl b
				WHERE a.product_id = b.product_id
				AND category_id='$id' AND name like '%$search%'";       
        $result = $this->db->query($sql)->row();
        return $result;
    }
	
	
	public function get_all_content($page_position, $item_per_page,$search){
        $sql = " SELECT a.*, b.name as store_name, c.desa 
									FROM  product_tbl a, store_tbl b, address_store_tbl c
									WHERE a.store_id = b.store_id
									AND a.store_id = c.store_id
									AND b.store_id = c.store_id
									AND a.name like '%$search%' LIMIT $page_position, $item_per_page";       
        $result = $this->db->query($sql)->result();
        return $result;
    }
	
	public function get_all_content2($page_position, $item_per_page,$id, $search){
        $sql = "
				SELECT a.*, b.name as store_name, c.desa 
									FROM  product_tbl a, store_tbl b, address_store_tbl c, product_category_tbl d
									WHERE a.store_id = b.store_id
									AND a.store_id = c.store_id
									AND b.store_id = c.store_id
									AND a.product_id = d.product_id
									AND d.category_id='$id' 
									AND a.name like '%$search%' LIMIT $page_position, $item_per_page";       
        $result = $this->db->query($sql)->result();
        return $result;
    }
	
	public function insert($data) {
        //insert data
        $this->db->insert('product_category_tbl', $data);
    }
	
	public function delete($id) {
        $this->db->delete('product_category_tbl', array('product_id' => $id));
    }
	
	
	
}
?>