<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_sub extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
        $this->load->model("m_home");
        $this->load->model("m_comment_sub_product");
		$this->load->model('m_transaction_success');
		$this->load->model('m_transaction_cancel');			
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

    public function insert() {
		if($this->session->userdata('user_type')==1){				
			$data['store_id'] = $this->user_store()['store_id'];
			$data['message'] = $this->input->post('message');
			$data['comment_id'] = $this->input->post('comment_id');
			$this->m_comment_sub_product->insert($data);
			
			$this->session->set_flashdata('notif','Komentar Disimpan !');
			if($this->input->post('page')=='product'){
				redirect('product/detail_product?id='.$this->input->post('product_id'));
			}else if ($this->input->post('page')=='comment'){
				redirect('comment/detail_comment?id='.$this->input->post('product_id'));
			}
			
			
		}else if($this->session->userdata('user_type')==2){				
			$data['user_id'] = $this->session->userdata('user_id');
			$data['message'] = $this->input->post('message');
			$data['comment_id'] = $this->input->post('comment_id');
			$this->m_comment_sub_product->insert($data);
			
			$this->session->set_flashdata('notif','Komentar Disimpan !');
			if($this->input->post('page')=='product'){
				redirect('product/detail_product?id='.$this->input->post('product_id'));
			}else if ($this->input->post('page')=='comment'){
				redirect('comment/detail_comment?id='.$this->input->post('product_id'));
			}
			
		}else{
			$this->session->set_flashdata('notif2','Login terlebih dahulu !');
			redirect('product/detail_product?id='.$this->input->post('product_id'));;
		}
		
    }
    
}
