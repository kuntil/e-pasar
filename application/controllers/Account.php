<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
		$this->load->model("m_home");
		$this->load->model("m_bank_account");
		
		//cek login
		/*if(!$this->session->userdata('user_id')) {
            redirect();
        }*/
		
    }
	
	public function inputSetting($data){
		$this->data['store_id'] = array(
				'name'  => 'store_id',
				'id'    => 'store_id',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'Store Id',
				'value' => $this->user_store()['store_id']
		);
		$this->data['bank'] = array(
				'name'  => 'bank',
				'id'    => 'bank',
				'type'  => 'text',
				'class' => 'form-control',
				'required' => 'required',
				'placeholder'=>'Nama Bank',
				'value' => $data['bank']
		);
		$this->data['no_account'] = array(
				'name'  => 'no_account',
				'id'    => 'no_account',
				'type'  => 'number',
				'rows'  => '6',
				'class' => 'form-control',
				'required' => 'required',
				'placeholder'=>'No Rekening',
				'value' => $data['no_account']
		);
		$this->data['user_account'] = array(
				'name'  => 'user_account',
				'id'    => 'user_account',
				'type'  => 'text',
				'class' => 'form-control',
				'required' => 'required',
				'placeholder'=>'Nama Pemilik Rekening',
				'value' => $data['user_account']
		);
		$this->data['get_bank'] = $data['bank'];
		$this->data['qid'] = $data['qid'];
		return $this->data;
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
	
	public function add_account()
	{
		if($this->session->userdata('user_id')){
			$this->load->view('header');
			$data['get_store']= $this->get_store();
			$data['get_address']= $this->get_address_store();
			$data['user_store_name']= $this->user_store()['name'];
			$data['user_profile_name']= $this->user_profile()['name'];
			$data['get_image']= $this->get_person()["image"];
			$data['user_id']=$this->session->userdata('user_id');
			$data['store_id']=$this->user_store();
			$this->load->view('penjual/navbar', $data);
			
			$data = array(
					'bank'=>null,
					'no_account'=>null,
					'user_account'=>null,
					'qid'=>null
			);
			
			$this->load->view('penjual/account/form',$this->inputSetting($data));
			$this->load->view('control');
			$this->load->view('footer1');
			$this->load->view('footer2');
		}else{
			$this->load->view('login');
		}
	}
	
	//Function Input
	public function insert_account(){
	
		$data['store_id'] = $this->input->post('store_id');
		$data['bank'] = $this->input->post('bank');
		$data['no_account'] = $this->input->post('no_account');
		$data['user_account'] = $this->input->post('user_account');
		$this->m_bank_account->insert($data);
		
		$this->session->set_flashdata('notif','Data Rekening Disimpan !');
		redirect('profile');
			
	}
	
	
	public function update_account()
	{
		$qid = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
		
		if($this->session->userdata('user_id')){
			
			$data['entry'] =  $this->m_bank_account->get($qid);
			if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
				redirect();
			} else {
				$data['entry'] = $data['entry'][0];
				$this->load->view('header');
				$data['get_store']= $this->get_store();
				$data['get_address']= $this->get_address_store();
				$data['user_store_name']= $this->user_store()['name'];
				$data['user_profile_name']= $this->user_profile()['name'];
				$data['get_image']= $this->get_person()["image"];
				$data['user_id']=$this->session->userdata('user_id');
				$data['store_id']=$this->user_store();
				$this->load->view('penjual/navbar', $data);
				$this->load->view('penjual/account/form',$this->inputSetting($data['entry']));
				$this->load->view('control');
				$this->load->view('footer1');
				$this->load->view('footer2');
			}
			
		}else{
			$this->load->view('login');
		}
	}
	
	
	public function edit_account(){
		
		$qid = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
		
		$data['store_id'] = $this->input->post('store_id');
		$data['bank'] = $this->input->post('bank');
		$data['no_account'] = $this->input->post('no_account');
		$data['user_account'] = $this->input->post('user_account');
		$data['qid'] = $qid;
		$this->m_bank_account->update($data);
			
		$this->session->set_flashdata('notif','Data Produk Disimpan !');
		redirect('account/update_account?id='.$this->input->get('id'));
		
	}
	
	
	
	public function delete_account() {
		
		$qid = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
		
        if($qid!="") {
            $this->m_bank_account->delete($qid);
		}
        //redirect to page
        redirect('profile');

    }
    
}
