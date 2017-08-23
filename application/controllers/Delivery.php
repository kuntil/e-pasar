<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
		$this->load->model('m_home');	
		$this->load->model('m_order');	
		$this->load->model('m_transaction_success');
		$this->load->model('m_transaction_cancel');				
		$this->load->model('m_delivery');	
		$this->load->model('m_accept_transfer');	
		$this->load->model('m_cart');	
		
    }
	
	
	
	public function get_store(){
    	$data['get_store']= $this->m_home->get_store();
		$data['get_store2']= count($data['get_store']);
    	return $data['get_store2'];
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
	
//PENJUAL

	public function delivery() {
	if($this->session->userdata('user_id')) {
			
			$data['user_id']= $this->input->post('user_id');
			$data['store_id'] = $this->input->post('store_id');
			$data['order_id'] = $this->input->post('order_id');
			$data['total'] = $this->input->post('total');
			$data['qid'] = $this->input->post('qid');
			$data['image1'] = $this->input->post('image1');
			$data['image2'] = $this->input->post('image2');
			$this->m_delivery->insert($data);
					
			$data2['user_id']= $this->input->post('user_id');
			$data2['order_id'] = $this->input->post('order_id');
			
			$this->m_accept_transfer->delete($data2['order_id'],$data2['user_id']);
			
			$this->session->set_flashdata('notif','Data Produk Disimpan !');
			redirect('order/accept_transfer_result');
			
        } else {
			redirect('login');
		}
		
		
    }
	
	
    
}
