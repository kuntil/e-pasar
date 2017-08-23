<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_report extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }

	public function report($order_id,$id) {
        $query  = $this->db->query("SELECT a.product_id, b.order_id, a.name, a.desc, a.price, a.qty, a.volume, a.satuan, a.store_id, a.image2, 
									b.total, b.qty AS qty_order, b.qid AS qid_order,  CAST(b.date AS DATE) as date, b.qid, b.user_id, 
									c.name AS buyer_name, c.nohp, d.desc AS address, d.desa
									FROM product_tbl a, order_tbl b, store_tbl c, address_store_tbl d
									WHERE a.product_id = b.product_id 
									AND b.status = 3
									AND b.order_id = '$order_id'
									AND a.store_id = b.store_id 
									AND a.store_id = c.store_id 
									AND a.store_id = d.store_id 
									AND b.user_id = $id;
									
									");
        return $query->result();
    }

	public function report_detail($order_id,$id) {
        $query  = $this->db->query("SELECT a.product_id, b.order_id, a.name, a.desc, a.price, a.qty, a.volume, a.satuan, a.store_id, a.image2, 
									b.total, b.qty AS qty_order, b.qid AS qid_order,  CAST(b.date AS DATE) as date, b.qid, b.user_id, 
									c.name AS buyer_name, c.nohp, d.desc AS address, d.desa
									FROM product_tbl a, order_tbl b, store_tbl c, address_store_tbl d
									WHERE a.product_id = b.product_id 
									AND b.status = 3
									AND b.order_id = '$order_id'
									AND a.store_id = b.store_id 
									AND a.store_id = c.store_id 
									AND a.store_id = d.store_id 
									AND b.user_id = $id;
									
									");
        return $query->result();
    }
	
	public function search_count($month, $year, $store_id){
		return  $this->db->count_all("	transaction_success_tbl a, order_tbl b 
										WHERE month(date) = '$month' AND year(date)='$year' and a.store_id='$store_id'
										AND a.order_id = b.order_id GROUP BY a.order_id");
	}
	
	public function search($month,$year,$store_id,$limit,$start) {
		$this->db->select ('b.*, c.name as buyer_name, c.nohp, d.desc as address, e.name AS store_name, e.image');
		$this->db->from ('transaction_success_tbl b, person_tbl c, address_buyer_tbl d, store_tbl e, order_tbl f ');
		$this->db->where('month(date)',$month);
		$this->db->where('year(date)',$year);
		$this->db->where('b.store_id',$store_id);
		$this->db->where('b.store_id = e.store_id');
		$this->db->where('c.user_id = b.user_id');
		$this->db->where('c.user_id = d.user_id');
		$this->db->where('b.user_id = d.user_id');
		$this->db->where('b.order_id = f.order_id');
		$this->db->group_by('b.order_id');
		$this->db->order_by('date DESC');
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

	public function print_report($month,$year,$store_id) {
		$this->db->select ('b.*, c.name as buyer_name, c.nohp, d.desc as address, e.name AS store_name, e.image');
		$this->db->from ('transaction_success_tbl b, person_tbl c, address_buyer_tbl d, store_tbl e, order_tbl f ');
		$this->db->where('month(date)',$month);
		$this->db->where('year(date)',$year);
		$this->db->where('b.store_id',$store_id);
		$this->db->where('b.store_id = e.store_id');
		$this->db->where('c.user_id = b.user_id');
		$this->db->where('c.user_id = d.user_id');
		$this->db->where('b.user_id = d.user_id');
		$this->db->where('b.order_id = f.order_id');
		$this->db->group_by('b.order_id');
		$this->db->order_by('date DESC');
		$query = $this->db->get ();
		if ($query->num_rows()> 0) {
			foreach ( $query->result () as $row ) {
				$data [] = $row;
			}
			return $data;
		}
		return false;
	}

}
?>