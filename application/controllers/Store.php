<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
		$this->load->model('m_home');	
		$this->load->model('m_store');	
		$this->load->model('m_address_store');	
		$this->load->model('m_bank_account');	
		
		//cek login
		if(!$this->session->userdata('user_id')) {
            redirect();
        }
		
    }
	
	public function validationData(){
		
		$this->form_validation->set_rules('name','Nama Toko','alpha_numeric_spaces|max_length[30]|required');
		$this->form_validation->set_rules('address','Alamat','max_length[2000]|required');
		$this->form_validation->set_rules('nohp', 'No. Telepon', 'numeric|max_length[50]|required');
		$this->form_validation->set_rules('desc', 'Keterangan', 'alpha_numeric_spaces|max_length[200]|required');
		$this->form_validation->set_rules('bank', 'Rekening', 'required');
		$this->form_validation->set_rules('user_account', 'Nama Pemilik Rekening', 'alpha_numeric_spaces|max_length[50]|required');
		$this->form_validation->set_rules('no_account', 'No. rekening', 'numeric|max_length[50]|required');
		
		return $this->form_validation->run();
	}
	
	public function getStoreIdLast(){
    	$n="";
    	$last = $this->m_store->last();
    	foreach($last as $v){
    		$n = $v->store_id;
    		$n = $n+1;
    		
    	}
    	
    	if(strlen($n)==0){
    		$n="000001";
    	}if(strlen($n)==1){
    		$n="00000".$n;
    	}else if (strlen($n)==2){
    		$n="0000".$n;
    	}else if (strlen($n)==3){
    		$n="000".$n;
    	}else if (strlen($n)==4){
    		$n="00".$n;
    	}else if (strlen($n)==5){
    		$n="0".$n;
    	}else if (strlen($n)==6){
    		$n;
    	}
    	
    	return $n;
    }
	
	public function getAddressStoreIdLast(){
    	$n="";
    	$last = $this->m_address_store->last();
    	foreach($last as $v){
    		$n = $v->store_id;
    		$n = $n+1;
    		
    	}
    	
    	if(strlen($n)==0){
    		$n="000001";
    	}if(strlen($n)==1){
    		$n="00000".$n;
    	}else if (strlen($n)==2){
    		$n="0000".$n;
    	}else if (strlen($n)==3){
    		$n="000".$n;
    	}else if (strlen($n)==4){
    		$n="00".$n;
    	}else if (strlen($n)==5){
    		$n="0".$n;
    	}else if (strlen($n)==6){
    		$n;
    	}
    	
    	return $n;
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
	
	public function create_data() {
	
		if($this->validationData()==TRUE){
		
			$data['user_id']= $this->session->userdata('user_id');
			$data['store_id']= $this->getStoreIdLast();
			$data['name'] = $this->input->post('name');
			$data['nohp'] = $this->input->post('nohp');
			$data['desc'] = $this->input->post('desc');
				
			$this->m_store->insert($data);
			
			$data2['store_id']= $data['store_id'];
			$data2['address_id']= $this->getAddressStoreIdLast();
			$data2['desc'] = $this->input->post('address');
			
			$this->m_address_store->insert($data2);
				
			$data3['store_id']= $data['store_id'];
			$data3['bank'] = $this->input->post('bank');
			$data3['user_account'] = $this->input->post('user_account');
			$data3['no_account'] = $this->input->post('no_account');
			
			$this->m_bank_account->insert($data3);
			
			redirect();
		
		} else {
			
			$data['get_store']= $this->get_store();
			$data['get_address_store']= $this->get_address_store();
			$data['get_address_buyer']= $this->get_address_buyer();
			$data['user_store_name']= $this->user_store()['name'];
			$data['user_profile_name']= $this->user_profile()['name'];
			$data['store_id'] = $this->user_store()['store_id'];
			$data['get_image']= $this->get_person()["image"];
			$data['buyer_name'] = $this->buyer()['name'];
			$data['buyer_email'] = $this->buyer()['email'];
		
			$this->load->view('header', $data);
			$this->load->view('penjual/navbar', $data);
			$this->load->view('penjual/content', $data);
			$this->load->view('control');
			$this->load->view('footer2');
		}
		
    }
    
}
