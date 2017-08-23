<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cara_berjualan extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function record_count() {
		return $this->db->count_all("pages_selling_tbl");
	}
	
	public function search_count($column, $data){
		return  $this->db->count_all("pages_selling_tbl where $column like '%$data%'");
	}
	
	public function fetchAll($limit, $start) {
		$this->db->select ('*');
		$this->db->from ('pages_selling_tbl');
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
		$this->db->from ('pages_selling_tbl');
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
        $query = $this->db->get('pages_selling_tbl', 1);
        return $query->result_array();
    }
	
	public function insert($data) {	
	    $this->db->insert('pages_selling_tbl', $data);
    }
	
	 public function update($data) {
		$this->db->update ('pages_selling_tbl', $data, array ('qid' => $data['qid']));
    }
	
	public function delete($id) {
        $this->db->delete('pages_selling_tbl', array('qid' => $id));
    }
	
}
?>