<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_category extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function last(){
    	$query  = $this->db->query("SELECT category_id FROM category_tbl order by category_id DESC LIMIT 1");
    	return $query->result();
    }
	
	public function my_list_category($id) {
        $query  = $this->db->query("SELECT * FROM category_tbl WHERE user_id='$id'");
        return $query->result();
    }
	
	function get_category_name($product_id) {
		 $query  = $this->db->query("SELECT a.category_id,a.category_name FROM category_tbl a, product_category_tbl b 
									 WHERE a.category_id=b.category_id AND b.product_id='$product_id'");
        return $query->result();    
	}
	
	public function get($id) {
        $this->db->where('category_id', $id);
        $query = $this->db->get('category_tbl', 1);
        return $query->result_array();
    }
	
	public function insert($data) {
        //insert data
        $this->db->insert('category_tbl', $data);
    }
	
	public function update($data) {
        //update data
        $this->db->update('category_tbl', $data, array('category_id'=>$data['category_id']));
    }
	
	public function delete($id) {
        $this->db->delete('category_tbl', array('category_id' => $id));
    }
	
	function get_category() {
		$result = $this->db->get("category_tbl");
			$options = array();
				foreach($result->result_array() as $row) {
				$options[$row["category_id"]] = $row["category_name"];
			}
		return $options;
	}
	
	
	
    
	
}
?>