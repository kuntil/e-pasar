<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_product_store extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function last(){
    	$query  = $this->db->query("SELECT product_id FROM product_tbl order by product_id DESC LIMIT 1");
    	return $query->result();
    }
	
	public function my_list_product($id) {
        $query  = $this->db->query("SELECT * FROM product_tbl WHERE user_id='$id'");
        return $query->result();
    }
	
	public function get($id) {
		$this->db->select('a.*, b.*, c.name as store_name, c.image as store_image');
        $this->db->where('a.product_id', $id);
        $this->db->where('a.product_id = b.product_id');
        $this->db->where('a.store_id = c.store_id');
        $query = $this->db->get('product_tbl a, product_category_tbl b, store_tbl c', 1);
        return $query->result_array();
    }
	
	public function insert($data) {
        //insert data
        $this->db->insert('product_tbl', $data);
    }
	
	public function update($data) {
        //update data
        $this->db->update('product_tbl', $data, array('product_id'=>$data['product_id']));
    }
	
	public function link_gambar($id)
	{
		
		$this->db->where('product_id',$id);
		$query = $getData = $this->db->get('product_tbl');

		if($getData->num_rows() > 0)
		return $query;
		else
		return null;
			
	}
	
	public function delete($id) {
        $this->db->delete('product_tbl', array('product_id' => $id));
    }
	
	//Count for Infinite Scrolling
	public function get_all_count($id)
    {
        $sql = "SELECT COUNT(*) as tol_records FROM product_tbl WHERE user_id='$id'";       
        $result = $this->db->query($sql)->row();
        return $result;
    }
	
	public function get_all_count_search($id,$search)
    {
        $sql = "SELECT COUNT(*) as tol_records FROM product_tbl WHERE user_id='$id' AND name LIKE '%$search%'";       
        $result = $this->db->query($sql)->row();
        return $result;
    }
	
	//Show the product in Infinite Scrolling
	
	public function get_all_content_store($store_id) {
        $query  = $this->db->query("SELECT * FROM product_tbl WHERE store_id='$store_id'");
        return $query->result();
    }
	
	public function get_all_content_store_result($page_position, $item_per_page,$store_id) {
        $query  = $this->db->query("SELECT * FROM  product_tbl WHERE store_id='$store_id' LIMIT $page_position, $item_per_page");
        return $query->result();
    }
	
	public function get_all_content_search($start,$content_per_page,$id,$search)
    {
        $sql = "SELECT * FROM product_tbl WHERE user_id='$id' AND name LIKE '%$search%' LIMIT $start,$content_per_page";       
        $result = $this->db->query($sql)->result();
        return $result;
    }
	
	function get_product() {
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$result = $this->db->get("product_tbl");
			$options = array();
				foreach($result->result_array() as $row) {
				$options[$row["product_id"]] = $row["name"];
			}
		return $options;
	}
    
	function get_product_name($catalog_id) {
		 $query  = $this->db->query("SELECT product_id FROM catalog_relation_tbl WHERE catalog_id='$catalog_id'");
        return $query->result();
	}
	
	
    
	
}
?>