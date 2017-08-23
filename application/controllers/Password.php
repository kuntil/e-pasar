<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_password');	
        $this->load->model("m_village");
		$this->load->model("m_product_store");
		$this->load->model("m_product_buyer");
		$this->load->model("m_cart");
		$this->load->model('m_wishlist');	
		$this->load->model('m_store');	
		$this->load->model('m_order');	
		$this->load->model('m_transfer');	
		$this->load->model('m_accept_transfer');	
		$this->load->model('m_transaction_success');
		$this->load->model('m_transaction_cancel');			
		$this->load->model('m_profile');			
		
		//cek login
		if(!$this->session->userdata('user_id')) {
            redirect();
        }
    }
	
	public function validationData(){
		
		$this->form_validation->set_rules('password_baru','Password','alpha_numeric|required');
		$this->form_validation->set_rules('ulang_password', 'Ulangi Password', 'trim|required|matches[password_baru]');
		
		return $this->form_validation->run();
	}
	
	public function inputSetting($data){
		$this->data['user_id'] = array(
				'name'  => 'id',
				'id'    => 'id',
				'type'  => 'hidden',
				'class' => 'form-control',
				'readonly'=> 'readonly',
				'placeholder'=>'id',
				'value' => $data['user_id']
		);
		
		$this->data['userfile'] = array(
				'name'  => 'userfile',
				'id'    => 'exampleInputFile',
				'type'  => 'file'
		);
		$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'class' => 'form-control',
				'required'=> 'required',
				'placeholder'=>'Masukan Password Lama',
				
		);
		$this->data['get_password'] = array(
				'name'  => 'get_password',
				'id'    => 'password',
				'type'  => 'hidden',
				'class' => 'form-control',
				'required'=> 'required',
				'placeholder'=>'Masukan Password Lama',
				'value' => $data['password']
		);
		$this->data['ulang_password'] = array(
				'name'  => 'ulang_password',
				'id'    => 'password',
				'type'  => 'password',
				'class' => 'form-control',
				'required'=> 'required',
				'placeholder'=>'Ulangi Password',
				
		);
		$this->data['password_baru'] = array(
				'name'  => 'password_baru',
				'id'    => 'password',
				'type'  => 'password',
				'class' => 'form-control',
				'required'=> 'required',
				'placeholder'=>'Masukan Password Baru',
		
		);
		$this->data['get_user_id'] = $data['user_id'];
		
		return $this->data;
	}
	
	public function getPersonIdLast(){
    	$n="";
    	$last = $this->m_password->last();
    	foreach($last as $v){
    		$n = $v->user_id;
    		$n = $n+1;
    		
    	}
    	
    	if(strlen($n)==0){
    		$n="0000001";
    	}if(strlen($n)==1){
    		$n="000000".$n;
    	}else if (strlen($n)==2){
    		$n="00000".$n;
    	}else if (strlen($n)==3){
    		$n="0000".$n;
    	}else if (strlen($n)==4){
    		$n="000".$n;
    	}else if (strlen($n)==5){
    		$n="00".$n;
    	}else if (strlen($n)==6){
    		$n="0".$n;
    	}else if (strlen($n)==7){
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
	
	public function index()
	{
		$this->load->view('user/header');
		
		$data['get_store']= $this->get_store();
		$data['get_address_store']= $this->get_address_store();
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['store_id'] = $this->user_store()['store_id'];
		$data['get_image']= $this->get_person()["image"];
		$data['buyer_name'] = $this->buyer()['name'];
		$data['buyer_job'] = $this->buyer()['job'];
		$this->load->view('user/navbar', $data);
		$this->load->view('user/sidebar');
		
		$data = array(
					'user_id'=>null,
					'person_id'=>null,
					'password'=>null,					
					'image'=>null
			);
			
		$this->load->view('user/password/password', $this->inputSetting($data));
		$this->load->view('user/control');
		$this->load->view('footer1');
		$this->load->view('footer2');
	}
	
	
	
	public function kata_sandi() {
	
		$data['entry'] =  $this->m_password->fetchById();
        if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
            redirect('profile');
        } else {
            $data['entry'] = $data['entry'][0];
			$this->load->view('header');
			$data['get_store']= $this->get_store();
			$data['get_address_store']= $this->get_address_store();
			$data['get_address_buyer']= $this->get_address_buyer();
			$data['user_store_name']= $this->user_store()['name'];
			$data['user_profile_name']= $this->user_profile()['name'];
			$data['store_id'] = $this->user_store()['store_id'];
			$data['get_image']= $this->get_person()["image"];
			$data['buyer_name'] = $this->buyer()['name'];
			$data['buyer_job'] = $this->buyer()['job'];
			
			if($this->session->userdata("user_type")==1){
					
				$data['total_order']= count($this->m_order->my_list_order_store($data['store_id']));
				$data['transfer']= count($this->m_transfer->transfer($data['store_id']));
				$data['accept_transfer']= count($this->m_accept_transfer->my_list_order_store($data['store_id']));
				$data['transaction_success']= count($this->m_transaction_success->my_list_order_store($data['store_id']));
				$this->load->view('penjual/navbar', $data);
				$this->load->view('penjual/password/password',$this->inputSetting($data['entry']));
				
			} else if($this->session->userdata("user_type")==2){
				$data['cart'] = $this->m_cart->my_list_cart($this->session->userdata('user_id'));
				$data['detail_order']= count($this->m_order->order_buyer($this->session->userdata('user_id')));
				$data['order_process']= count($this->m_order->order_process_buyer($this->session->userdata('user_id')));
				$data['transaction_success']= count($this->m_transaction_success->transaction_success($this->session->userdata('user_id')));
				$data['transaction_cancel']= count($this->m_transaction_cancel->transaction_cancel($this->session->userdata('user_id')));
				$this->load->view('pembeli/navbar', $data);
				$this->load->view('pembeli/password/password',$this->inputSetting($data['entry']));
			}
			
			$this->load->view('control');
			$this->load->view('footer1');
			$this->load->view('footer2');
        }
		
    }
	
	public function update_katasandi() {
	
		if(md5($this->input->post('password'))==$this->input->post('get_password')){
			
			if($this->validationData()==TRUE){
				$data['password'] = md5($this->input->post('password_baru'));
				
				$this->m_password->update($data);
					
				$this->session->set_flashdata('notif','Password Berhasil diganti  !');
				redirect('password/kata_sandi');
			}else{
				$this->session->set_flashdata('notif2','Password Baru Tidak Sama !');
				redirect('password/kata_sandi');
			}
		}else{
			$this->session->set_flashdata('notif2','Password Lama Tidak Sama !');
			redirect('password/kata_sandi');
		}
		
		
    }
    
}
