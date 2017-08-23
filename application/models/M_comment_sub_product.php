<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_comment_sub_product extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function record_count($comment_id) {
		return $this->db->count_all("comment_sub_tbl WHERE comment_id = '$comment_id'
									");
	}
	
	public function comment_sub_store($comment_id){
    	$query  = $this->db->query("SELECT b.*
									FROM comment_tbl a, comment_sub_tbl b
									WHERE a.qid = b.comment_id 
									AND b.comment_id = '$comment_id'
									ORDER BY a.qid ASC");
    	return $query->result();
    }
	
	public function comment_sub_get_store($comment_id){
    	$query  = $this->db->query("SELECT c.qid, c.message, b.name AS store_name, b.image
									FROM store_tbl b, comment_sub_tbl c
									WHERE c.comment_id = '$comment_id' 
									AND b.store_id = c.store_id");
    	return $query->result_array();
    }
	
	public function comment_sub_get_buyer($comment_id){
    	$query  = $this->db->query("SELECT c.qid, c.message, b.name AS buyer_name, b.image
									FROM person_tbl b, comment_sub_tbl c
									WHERE c.comment_id = '$comment_id' 
									AND b.user_id = c.user_id");
    	return $query->result_array();
    }
	
	public function insert($data) {	
	    $this->db->insert('comment_sub_tbl', $data);
    }
	
	 public function update($data) {
		$this->db->update ('comment_sub_tbl', $data, array ('qid' => $data['qid']));
    }
	
	public function delete($id) {
        $this->db->delete('comment_sub_tbl', array('qid' => $id));
    }
	
	
}
?>