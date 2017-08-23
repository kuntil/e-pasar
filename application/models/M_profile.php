<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	public function last(){
    	$query  = $this->db->query("SELECT person_id FROM person_tbl order by person_id DESC LIMIT 1");
    	return $query->result();
    }
    
    public function last_data_awal(){
    	$query  = $this->db->query("SELECT address_store_tbl.desc as alamat, address_store_tbl.desa, store_tbl.name as nm_toko,
    			store_tbl.nohp, store_tbl.desc as keterangan
    			FROM address_store_tbl, store_tbl
    			WHERE address_store_tbl.store_id = store_tbl.store_id");
    	return $query->result();
    }
	
	public function fetchById(){
		$this->db->select ('person_tbl.*, store_tbl.name as nama_toko,address_store_tbl.desc as alamat, address_store_tbl.desa, store_tbl.nohp,
							store_tbl.desc as keterangan,store_tbl.store_id');
		$this->db->from ('person_tbl, address_store_tbl, store_tbl');
		$this->db->where('person_tbl.user_id', $this->session->userdata('user_id'));
		$this->db->where('person_tbl.user_id=store_tbl.user_id');
		$this->db->where('address_store_tbl.store_id = store_tbl.store_id');
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	
	public function fetchById2(){
		$this->db->select ('store_tbl.name as nama_toko,address_store_tbl.desc as alamat, address_store_tbl.desa, store_tbl.nohp,
							store_tbl.desc as keterangan,store_tbl.store_id');
		$this->db->from ('user_tbl, address_store_tbl, store_tbl');
		$this->db->where('user_tbl.user_id', $this->session->userdata('user_id'));
		$this->db->where('user_tbl.user_id=store_tbl.user_id');
		$this->db->where('address_store_tbl.store_id = store_tbl.store_id');
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	
	
    public function insert($data) {
        $this->db->insert('person_tbl', $data);
    }
	
	public function update($data) {
		$this->db->update ('person_tbl', $data, array ('user_id' => $this->session->userdata('user_id')));
    }
    
    public function update_address($data) {
    	$this->db->update ('address_store_tbl', $data, array ('store_id' => $data['store_id']));
    }
    
    public function update_store($data) {
    	$this->db->update ('store_tbl', $data, array ('store_id' => $data['store_id']));
    }
	
}
?>