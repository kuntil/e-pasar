<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
		$this->load->model('m_home');	
		$this->load->model('m_order');
		$this->load->model('m_transaction_success');
		$this->load->model('m_transaction_cancel');				
		$this->load->model('m_cart');	
		$this->load->model('m_invoice');	
		
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
	
	public function buyer(){
		$personID=$this->m_home->get_person();
		$count = count($personID);
		
		if($count){
			foreach($personID as $person){
				$data['person_id']=$person->person_id;
				$data['name']=$person->name;
				$data['job']=$person->job;
			}
		}else{
			$data = array(
					'person_id'=>null,
					'name'=>null,
					'job'=>null
			);
		}
		
		return $data;
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
	
	public function index(){
		
		$order_id = $this->encrypt->decode(base64_decode($this->input->get('order_id')), $this->session->userdata('encrypt_key'));
		$store_id = $this->encrypt->decode(base64_decode($this->input->get('store_id')), $this->session->userdata('encrypt_key'));
		
		$data['buyer_name'] = $this->buyer()['name'];
		$data['buyer_job'] = $this->buyer()['job'];
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['get_image']= $this->get_person()["image"];
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['cart']= $this->m_cart->my_list_cart($this->session->userdata('user_id'));
		$data['order']= $this->m_invoice->list_order_buyer($order_id);
		$data['store']= $this->m_invoice->store($store_id);
		$data['user']= $this->m_invoice->user($this->session->userdata('user_id'));
		foreach($data['order'] as $order){
		}
		$data['date'] = date("d-m-Y",strtotime($order->tanggal));
		$data['detail_order']= count($this->m_order->order_buyer($this->session->userdata('user_id')));
		$data['order_process']= count($this->m_order->order_process_buyer($this->session->userdata('user_id')));
		$data['transaction_success']= count($this->m_transaction_success->transaction_success($this->session->userdata('user_id')));
		$data['transaction_cancel']= count($this->m_transaction_cancel->transaction_cancel($this->session->userdata('user_id')));
		
		$data['order_id'] = $order_id;
		$data['store_id'] = $store_id;
		$data['user_id']=$this->session->userdata('user_id');
		
		$this->load->view('header');
		$this->load->view('pembeli/navbar', $data);
		$this->load->view('pembeli/invoice/content', $data);
		$this->load->view('control');
		$this->load->view('footer1');
		$this->load->view('footer2');
	}
	
	public function print_invoice(){
		
		$order_id = $this->encrypt->decode(base64_decode($this->input->get('order_id')), $this->session->userdata('encrypt_key'));
		$store_id = $this->encrypt->decode(base64_decode($this->input->get('store_id')), $this->session->userdata('encrypt_key'));
		
		$data['buyer_name'] = $this->buyer()['name'];
		$data['buyer_job'] = $this->buyer()['job'];
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['get_image']= $this->get_person()["image"];
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['cart']= $this->m_cart->my_list_cart($this->session->userdata('user_id'));
		$data['order']= $this->m_invoice->list_order_buyer($this->input->get('order_id'));
		$data['store']= $this->m_invoice->store($this->input->get('store_id'));
		$data['user']= $this->m_invoice->user($this->session->userdata('user_id'));
		foreach($data['order'] as $order){
		}
		$data['date'] = $order->date; 
		$data['detail_order']= count($this->m_order->order_buyer($this->session->userdata('user_id')));
		$data['order_process']= count($this->m_order->order_process_buyer($this->session->userdata('user_id')));
		$data['transaction_success']= count($this->m_transaction_success->transaction_success($this->session->userdata('user_id')));
		$data['order_id']=$this->input->get('order_id');
		$data['store_id']=$this->input->get('store_id');
		$data['user_id']=$this->session->userdata('user_id');
		
		$this->load->view('header');
		$this->load->view('pembeli/invoice/print', $data);
	}
	
	
}
