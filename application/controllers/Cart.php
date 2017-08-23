<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
		$this->load->model('m_home');	
		$this->load->model('m_order');	
		$this->load->model('m_transaction_success');
		$this->load->model('m_transaction_cancel');		
		$this->load->model('m_cart');	
		
    }
	
	public function inputSetting($data){
		$this->data['product_id'] = array(
				'name'  => 'product_id[]',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'Product id'
		);
		$this->data['store_id'] = array(
				'name'  => 'store_id[]',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'store id'
		);
		$this->data['price'] = array(
				'name'  => 'price[]',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'Jumlah'
		);
		$this->data['qty'] = array(
				'name'  => 'qty[]',
				'type'  => 'text',
				'class' => 'form-control',
				'placeholder'=>'Jumlah'
		);
		$this->data['total'] = array(
				'name'  => 'total[]',
				'type'  => 'number',
				'class' => 'form-control',
				'placeholder'=>'Jumlah'
		);
		$this->data['qid'] = array(
				'name'  => 'qid[]',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'Jumlah'
		);
		return $this->data;
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
		
		$data['buyer_name'] = $this->buyer()['name'];
		$data['buyer_job'] = $this->buyer()['job'];
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['get_image']= $this->get_person()["image"];
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['cart']= $this->m_cart->my_list_cart($this->session->userdata('user_id'));
		$data['detail_order']= count($this->m_order->order_buyer($this->session->userdata('user_id')));
		$data['order_process']= count($this->m_order->order_process_buyer($this->session->userdata('user_id')));
		$data['transaction_success']= count($this->m_transaction_success->transaction_success($this->session->userdata('user_id')));
		$data['transaction_cancel']= count($this->m_transaction_cancel->transaction_cancel($this->session->userdata('user_id')));
		$data['qty']= $this->inputSetting($data);
		
		$this->load->view('header');
		$this->load->view('pembeli/navbar', $data);
		$this->load->view('pembeli/cart/content_all', $data);
		$this->load->view('control');
		$this->load->view('footer1');
		$this->load->view('footer2');
	}
	
	public function create_cart() {
	
		if($this->session->userdata('user_id')) {
				
			$product_id = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
			
			//$cek_cart = $this->m_cart->get($this->session->userdata('user_id'),$product_id);
			
		//	if($cek_cart){
			//	$this->session->set_flashdata('notif', 'Product Sudah Ada Di Cart !');
			//	redirect();
			//}else{
			
				$data['user_id']= $this->session->userdata('user_id');
				$data['product_id'] = $product_id;
				
				$this->m_cart->insert($data);
				
				redirect();
			//}
			
        } else {
			redirect('login');
		}
		
    }
	
	public function delete_cart() {
		
		$qid = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
		
        if($qid!="") {
            $this->m_cart->delete($qid);
		}
        //redirect to page
        redirect('cart');

    }
    
}
