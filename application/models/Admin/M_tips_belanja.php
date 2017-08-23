<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tips_belanja extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function record_count() {
		return $this->db->count_all("pages_shopping_tips_tbl");
	}
	
	public function search_count($column, $data){
		return  $this->db->count_all("pages_shopping_tips_tbl where $column like '%$data%'");
	}
	
	public function fetchAll($limit, $start) {
		$this->db->select ('*');
		$this->db->from ('pages_shopping_tips_tbl');
		$this->db->limit ($limit, $start);
		$query = $this->db->get ();
		if ($query->num_rows()> 0) {
			foreach ( $query->result () as $row ) {
				$data [] = $row;
			}
			return $data;
		}
		return false;
	}
	
	public function search($column,$value,$limit, $start) {
		$this->db->select ('*');
		$this->db->from ('pages_shopping_tips_tbl');
		$this->db->like($column,$value);
		$this->db->limit ($limit, $start);
		$query = $this->db->get ();
		if ($query->num_rows()> 0) {
			foreach ( $query->result () as $row ) {
				$data [] = $row;
			}
			return $data;
		}
		return false;
	}
	
	public function get($id) {
        $this->db->where('qid', $id);
        $query = $this->db->get('pages_shopping_tips_tbl', 1);
        return $query->result_array();
    }
	
	 public function insert($data) {	
		 //insert data
        $this->db->insert('pages_shopping_tips_tbl', $data);
    }
	
	 public function update($data) {
		$this->db->update ('pages_shopping_tips_tbl', $data, array ('qid' => $data['qid']));
    }
	
	public function delete($id) {
        $this->db->delete('pages_shopping_tips_tbl', array('qid' => $id));
    }
	
	public function link_gambar($id)
	{
		
		$this->db->where('qid',$id);
		$query = $getData = $this->db->get('pages_shopping_tips_tbl');

		if($getData->num_rows() > 0)
		return $query;
		else
		return null;
			
	}
}
?>