<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pages extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
	
	
    
    public function tentang_kami() {
    	$query  = $this->db->query("SELECT * FROM tentang_kami_tbl
									ORDER BY qid DESC LIMIT 5
									");
    	return $query->result();
    }
    
    public function aturan_penggunaan() {
    	$query  = $this->db->query("SELECT * FROM aturan_tbl
									ORDER BY qid ASC LIMIT 6
									");
    	return $query->result();
    }
    
    public function berita_pengumuman() {
    	$query  = $this->db->query("SELECT * FROM berita_tbl
									ORDER BY qid DESC LIMIT 5
									");
    	return $query->result();
    }
    
    public function karir() {
    	$query  = $this->db->query("SELECT * FROM karir_tbl
									ORDER BY qid DESC LIMIT 5
									");
    	return $query->result();
    }
    
    public function cara_belanja() {
    	$query  = $this->db->query("SELECT * FROM cara_belanja_tbl
									ORDER BY qid ASC LIMIT 6
									");
    	return $query->result();
    }
    
    public function pembayaran() {
    	$query  = $this->db->query("SELECT * FROM pembayaran_tbl
									ORDER BY qid ASC LIMIT 6
									");
    	return $query->result();
    }
    
    public function pengembalian_dana() {
    	$query  = $this->db->query("SELECT * FROM pengembalian_tbl
									ORDER BY qid ASC LIMIT 6
									");
    	return $query->result();
    }
    
    public function jaminan_aman() {
    	$query  = $this->db->query("SELECT * FROM jaminan_tbl
									ORDER BY qid ASC LIMIT 6
									");
    	return $query->result();
    }
    
    public function tips_berbelanja() {
    	$query  = $this->db->query("SELECT * FROM tips_berbelanja_tbl
									ORDER BY qid DESC LIMIT 5
									");
    	return $query->result();
    }
    
    public function cara_berjualan() {
    	$query  = $this->db->query("SELECT * FROM cara_berjualan_tbl
									ORDER BY qid ASC LIMIT 5
									");
    	return $query->result();
    }
    
    public function penarikan_dana() {
    	$query  = $this->db->query("SELECT * FROM penarikan_tbl
									ORDER BY qid ASC LIMIT 5
									");
    	return $query->result();
    }
    
    public function tips_berjualan() {
    	$query  = $this->db->query("SELECT * FROM tips_berjualan_tbl
									ORDER BY qid ASC LIMIT 5
									");
    	return $query->result();
    }
    
    public function kisah_sukses() {
    	$query  = $this->db->query("SELECT * FROM kisah_tbl
									ORDER BY qid ASC LIMIT 5
									");
    	return $query->result();
    }
    
    public function syarat_ketentuan() {
    	$query  = $this->db->query("SELECT * FROM syarat_tbl
									ORDER BY qid ASC LIMIT 5
									");
    	return $query->result();
    }
    
    public function kebijakan_privasi() {
    	$query  = $this->db->query("SELECT * FROM kebijakan_tbl
									ORDER BY qid ASC LIMIT 5
									");
    	return $query->result();
    }
    
    public function hubungi_kami() {
    	$query  = $this->db->query("SELECT * FROM hubungi_tbl
									ORDER BY qid ASC LIMIT 5
									");
    	return $query->result();
    }
    
    public function panduan_keamanan() {
    	$query  = $this->db->query("SELECT * FROM panduan_tbl
									ORDER BY qid ASC LIMIT 5
									");
    	return $query->result();
    }
	
}
?>