<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
        $this->load->model("m_home");
        $this->load->model("m_pages");
    }
	
	//Get StoreID and StoreName
	public function user_store(){
		$storeID=$this->m_home->user_store($this->session->userdata('user_id'));
		$count = count($storeID);
		
		if($count){
			foreach($storeID as $store){
				$data['store_id']=$store->store_id;
				$data['name']=$store->name;
			}
		}else{
			$data = array(
					'store_id'=>null,
					'name'=>null
			);
		}
		
		return $data;
	}
	
	//User Profile
	public function user_profile(){
		$person=$this->m_home->user_profile($this->session->userdata('user_id'));
		$count = count($person);
		
		if($count){
			foreach($person as $store){
				$data['person_id']=$store->person_id;
				$data['name']=$store->name;
			}
		}else{
			$data = array(
					'person_id'=>null,
					'name'=>null
			);
		}
		
		return $data;
	}
	
	public function get_store(){
    	$data['get_store']= $this->m_home->get_store();
		$data['get_store2']= count($data['get_store']);
    	return $data['get_store2'];
    }
	
	//Get StoreID and StoreName
	public function buyer(){
		$personID=$this->m_home->get_person();
		$count = count($personID);
		
		if($count){
			foreach($personID as $person){
				$data['person_id']=$person->person_id;
				$data['name']=$person->name;
				$data['email']=$person->email;
			}
		}else{
			$data = array(
					'person_id'=>null,
					'name'=>null,
					'email'=>null
			);
		}
		
		return $data;
	}
	
	public function get_address_store(){
    	$data['get_address']= $this->m_home->get_address_store($this->user_store()['store_id']);
		$data['get_address2']= count($data['get_address']);
    	return $data['get_address2'];
    }
	
	public function get_address_buyer(){
    	$data['get_address_buyer']= $this->m_home->get_address_buyer();
		$data['get_address_buyer2']= count($data['get_address_buyer']);
    	return $data['get_address_buyer2'];
    }
	
	
	public function get_person(){
    	$get_person= $this->m_home->get_person();
		$count = count($get_person);
		
		if($count){
			foreach($get_person as $get_person){
				$data['image']=$get_person->image;
			}
		}else{
			$data = array(
					'image'=>null
			);
		}
			
		return $data;
    }
	
	public function tentang_kami() {
		
		$data['get_store']= $this->get_store();
		$data['get_address_store']= $this->get_address_store();
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['store_id'] = $this->user_store()['store_id'];
		$data['get_image']= $this->get_person()["image"];
		$data['buyer_name'] = $this->buyer()['name'];
		$data['buyer_job'] = $this->buyer()['email'];
		$data['tentang']=$this->m_pages->tentang_kami();
		$this->load->view("header");
		$this->load->view('navbar', $data);
		$this->load->view('page/tentang_kami',  $data);
		$this->load->view('footer2');
		
    }
    
    public function aturan_penggunaan() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['buyer_job'] = $this->buyer()['email'];
    	$data['aturan']=$this->m_pages->aturan_penggunaan();
    	$this->load->view("header");
    	$this->load->view('navbar', $data);
    	$this->load->view('page/aturan_penggunaan', $data);
    	$this->load->view('footer2');
    
    }
    
    public function berita_Pengumuman() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['buyer_job'] = $this->buyer()['email'];
    	$data['berita']=$this->m_pages->berita_pengumuman();
    	$this->load->view("header");
    	$this->load->view('navbar', $data);
    	$this->load->view('page/berita', $data);
    	$this->load->view('footer2');
    
    }
    
    public function karir() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['buyer_job'] = $this->buyer()['email'];
    	$data['karir']=$this->m_pages->karir();
    	$this->load->view("header");
    	$this->load->view('navbar', $data);
    	$this->load->view('page/karir', $data);
    	$this->load->view('footer2');
    
    }
	
    public function cara_belanja() {
		
		$data['get_store']= $this->get_store();
		$data['get_address_store']= $this->get_address_store();
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['store_id'] = $this->user_store()['store_id'];
		$data['get_image']= $this->get_person()["image"];
		$data['buyer_name'] = $this->buyer()['name'];
		$data['buyer_job'] = $this->buyer()['email'];
		$data['carbel']=$this->m_pages->cara_belanja();
		$this->load->view("header");
		$this->load->view('navbar', $data);
		$this->load->view('page/belanja', $data);
		$this->load->view('control');
		$this->load->view('footer2');
		
    }
    
    public function pembayaran() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['buyer_job'] = $this->buyer()['email'];
    	$data['bayar']=$this->m_pages->pembayaran();
    	$this->load->view("header");
    	$this->load->view('navbar', $data);
    	$this->load->view('page/pembayaran', $data);
    	$this->load->view('control');
    	$this->load->view('footer2');
    
    }
    
    public function pengembalian_dana() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['buyer_job'] = $this->buyer()['email'];
    	$data['kembali']=$this->m_pages->pengembalian_dana();
    	$this->load->view("header");
    	$this->load->view('navbar', $data);
    	$this->load->view('page/pengembalian', $data);
    	$this->load->view('control');
    	$this->load->view('footer2');
    
    }
    
    public function jaminan_aman() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['buyer_job'] = $this->buyer()['email'];
    	$data['jamin']=$this->m_pages->jaminan_aman();
    	$this->load->view("header");
    	$this->load->view('navbar', $data);
    	$this->load->view('page/jaminan', $data);
    	$this->load->view('control');
    	$this->load->view('footer2');
    
    }
    
    
    public function tips_berbelanja() {
		
		$data['get_store']= $this->get_store();
		$data['get_address_store']= $this->get_address_store();
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['store_id'] = $this->user_store()['store_id'];
		$data['get_image']= $this->get_person()["image"];
		$data['buyer_name'] = $this->buyer()['name'];
		$data['buyer_job'] = $this->buyer()['email'];
		$data['tips_belanja']=$this->m_pages->tips_berbelanja();
		$this->load->view("header");
		$this->load->view('navbar', $data);
		$this->load->view('page/tips_berbelanja');
		$this->load->view('control');
		$this->load->view('footer2');
		
    }
    
    public function cara_berjualan() {
		
		$data['get_store']= $this->get_store();
		$data['get_address_store']= $this->get_address_store();
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['store_id'] = $this->user_store()['store_id'];
		$data['get_image']= $this->get_person()["image"];
		$data['buyer_name'] = $this->buyer()['name'];
		$data['buyer_job'] = $this->buyer()['email'];
		$data['cara_jual']=$this->m_pages->cara_berjualan();
		$this->load->view("header");
		$this->load->view('navbar', $data);
		$this->load->view('page/cara_berjualan', $data);		
		$this->load->view('footer2');
		
    }
    
    public function penarikan_dana() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['buyer_job'] = $this->buyer()['email'];
    	$data['tarik']=$this->m_pages->penarikan_dana();
    	$this->load->view("header");
    	$this->load->view('navbar', $data);
    	$this->load->view('page/penarikan_dana', $data);
    	$this->load->view('footer2');
    
    }
    
    public function tips_berjualan() {
		
		$data['get_store']= $this->get_store();
		$data['get_address_store']= $this->get_address_store();
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['store_id'] = $this->user_store()['store_id'];
		$data['get_image']= $this->get_person()["image"];
		$data['buyer_name'] = $this->buyer()['name'];
		$data['buyer_job'] = $this->buyer()['email'];
		$data['tips_jual']=$this->m_pages->tips_berjualan();
		$this->load->view("header");
		$this->load->view('navbar', $data);
		$this->load->view('page/tips_berjualan', $data);
		$this->load->view('control');
		$this->load->view('footer2');
		
    }
    
    public function kisah_sukses() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['buyer_job'] = $this->buyer()['email'];
    	$data['kisah']=$this->m_pages->kisah_sukses();
    	$this->load->view("header");
    	$this->load->view('navbar', $data);
    	$this->load->view('page/kisah_sukses', $data);
    	$this->load->view('control');
    	$this->load->view('footer2');
    
    }
    
    public function syarat_ketentuan() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['buyer_job'] = $this->buyer()['email'];
    	$data['syarat']=$this->m_pages->syarat_ketentuan();
    	$this->load->view("header");
    	$this->load->view('navbar', $data);
    	$this->load->view('page/syarat', $data);
    	$this->load->view('control');
    	$this->load->view('footer2');
    
    }
    
    public function kebijakan_privasi() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['buyer_job'] = $this->buyer()['email'];
    	$data['privasi']=$this->m_pages->kebijakan_privasi();
    	$this->load->view("header");
    	$this->load->view('navbar', $data);
    	$this->load->view('page/kebijakan_privasi', $data);
    	$this->load->view('control');
    	$this->load->view('footer2');
    
    }
    
    public function hubungi_kami() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['buyer_job'] = $this->buyer()['email'];
    	$data['hub']=$this->m_pages->hubungi_kami();
    	$this->load->view("header");
    	$this->load->view('navbar', $data);
    	$this->load->view('page/hubungi_kami', $data);
    	$this->load->view('control');
    	$this->load->view('footer2');
    
    }
    
    public function panduan_keamanan() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['buyer_job'] = $this->buyer()['email'];
    	$data['pandu']=$this->m_pages->panduan_keamanan();
    	$this->load->view("header");
    	$this->load->view('navbar', $data);
    	$this->load->view('page/panduan_keamanan', $data);
    	$this->load->view('control');
    	$this->load->view('footer2');
    
    }
    
    
}
