<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_profile');			
		$this->load->model('m_bank_account');
		$this->load->model('m_store');
		$this->load->model('m_address_store');
		$this->load->model('m_order');
		$this->load->model('m_transfer');
		$this->load->model('m_accept_transfer');
		$this->load->model('m_transaction_success');
		
		//cek login
		if(!$this->session->userdata('user_id')) {
            redirect();
        }
    }
	
	public function get_store(){
    	$data['get_store']= $this->m_home->get_store();
		$data['get_store2']= count($data['get_store']);
    	return $data['get_store2'];
    }
	
	public function get_address(){
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
	public function getPersonIdLast(){
    	$n="";
    	$last = $this->m_profile->last();
    	foreach($last as $v){
    		$n = $v->person_id;
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
	
	public function inputSetting($data){
		$this->data['user_id'] = array(
				'name'  => 'id',
				'id'    => 'id',
				'type'  => 'hidden',
				'class' => 'form-control',
				'readonly'=> 'readonly',
				'placeholder'=>'id',
				'value' => $data['entry']['user_id']
		);
		$this->data['person_id'] = array(
				'name'  => 'name',
				'id'    => 'name',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'Person id',
				'value' =>  $data['entry']['person_id']
		);
		$this->data['userfile'] = array(
				'name'  => 'userfile',
				'id'    => 'exampleInputFile',
				'type'  => 'file'
		);
		$this->data['name'] = array(
				'name'  => 'name',
				'id'    => 'name',
				'type'  => 'text',
				'class' => 'form-control',
				'required'=> 'required',
				'placeholder'=>'Nama Lengkap',
				'value' =>  $data['entry']['name']
		);
		if( $data['entry']['birth_date']){
			$data['entry']['birth_date2'] = date("d-m-Y",strtotime($data['entry']['birth_date']));
		}else{}
		$this->data['birth_date'] = array(
				'name'  => 'birth_date',
				'id'    => 'datepicker',
				'type'  => 'text',
				'class' => 'form-control pull-right',
				'required'=> 'required',
				'value' => $data['entry']['birth_date2']
		);
		$this->data['no_ktp'] = array(
				'name'  => 'no_ktp',
				'id'    => 'no_ktp',
				'type'  => 'text',
				'maxlength'  => '16',
				'minlength'  => '16',
				'class' => 'form-control',
				'required'=> 'required',
				'placeholder'=>'No. KTP',
				'value' =>  $data['entry']['no_ktp']
		);
		$this->data['blood_type'] = array(
				'name'  => 'blood_type',
				'id'    => 'blood_type',
				'type'  => 'text',
				'class' => 'form-control',
				'required'=> 'required',
				'value' =>  $data['entry']['blood_type']
		);
		$this->data['gender'] = array(
				'name'  => 'gender',
				'id'    => 'gender',
				'type'  => 'text',
				'class' => 'form-control',
				'required'=> 'required',
				'value' =>  $data['entry']['gender'],
		);
		$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'class' => 'form-control',
				'required'=> 'required',
				'value' =>  $data['entry']['email'],
		);
		$this->data['nm_toko'] = array(
				'name'  => 'nm_toko',
				'id'    => 'nm_toko',
				'type'  => 'text',
				'class' => 'form-control',
				'required'=> 'required',
				'value' =>  $data['entry2']['nama_toko'],
		);
		$this->data['alamat'] = array(
				'name'  => 'alamat',
				'id'    => 'alamat',
				'type'  => 'text',
				'class' => 'form-control',
				'required'=> 'required',
				'value' => $data['entry2']['alamat'],
		);
		$this->data['nohp'] = array(
				'name'  => 'nohp',
				'id'    => 'nohp',
				'type'  => 'text',
				'class' => 'form-control',
				'required'=> 'required',
				'value' => $data['entry2']['nohp'],
		);
		$this->data['keterangan'] = array(
				'name'  => 'keterangan',
				'id'    => 'keterangan',
				'type'  => 'text',
				'class' => 'form-control',
				'required'=> 'required',
				'value' => $data['entry2']['keterangan'],
		);
		$this->data['store_id'] = array(
				'name'  => 'store_id',
				'id'    => 'store_id',
				'type'  => 'hidden',
				'class' => 'form-control',
				'value' => $data['entry2']['store_id'],
		);
		
		$this->data['get_user_id'] = $data['entry']['user_id'];
		$this->data['get_blood_type'] = $data['entry']['blood_type'];
		$this->data['get_gender'] = $data['entry']['gender'];
		$this->data['get_image'] = $data['entry']['image'];
		return $this->data;
	}
	
	
	public function index()
	{
		$this->load->view('header');
		
		$data['get_store']= $this->get_store();
		$data['get_address']= $this->get_address();
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_store_id']= $this->user_store()['store_id'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['get_image']= $this->get_person()["image"];
		
		$data['total_order']= count($this->m_order->my_list_order_store($data['user_store_id']));
		$data['transfer']= count($this->m_transfer->transfer($data['user_store_id']));
		$data['accept_transfer']= count($this->m_accept_transfer->my_list_order_store($data['user_store_id']));
		$data['transaction_success']= count($this->m_transaction_success->my_list_order_store($data['user_store_id']));
		
		$this->load->view('penjual/navbar', $data);
		
		$data['entry'] =  $this->m_profile->fetchById();
		$data['entry2'] =  $this->m_profile->fetchById2();
        if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
            $data['entry'] = array(
					'user_id'=>null,
					'person_id'=>null,
					'name'=>null,
					'birth_date'=>null,
					'birth_date2'=>null,
					'no_ktp'=>null,
					'blood_type'=>null,
					'gender'=>null,
					'email'=>null,
					'image'=>null
			);
			$data['entry2'] = $data['entry2'][0];
			$this->load->view('penjual/profile/profile', $this->inputSetting($data));
			$this->load->view('footer1');
			$this->load->view('footer2');
        } else {
            $data['entry'] = $data['entry'][0];
            $data['entry2'] = $data['entry2'][0];
			$this->load->view('penjual/profile/profile',$this->inputSetting($data));
			$this->load->view('footer1');
			$this->load->view('footer2');
        }
		
		
			
		
	}
	
	
	
	public function setting_profile() {
	
		$data['entry'] =  $this->m_profile->fetchById();
		$data['entry2'] =  $this->m_profile->fetchById2();
        if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
            redirect('profile');
        } else {
           
            $data['entry'] = $data['entry'][0];
            $data['entry2'] = $data['entry2'][0];
			
			$this->load->view('header');
			$data['get_store']= $this->get_store();
			$data['get_address']= $this->get_address();
			$data['user_store_name']= $this->user_store()['name'];
			$data['user_store_id']= $this->user_store()['store_id'];
			$data['user_profile_name']= $this->user_profile()['name'];
			$data['get_image']= $this->get_person()["image"];
			
			$data['total_order']= count($this->m_order->my_list_order_store($data['user_store_id']));
			$data['transfer']= count($this->m_transfer->transfer($data['user_store_id']));
			$data['accept_transfer']= count($this->m_accept_transfer->my_list_order_store($data['user_store_id']));
			$data['transaction_success']= count($this->m_transaction_success->my_list_order_store($data['user_store_id']));
		
			
			$this->load->view('penjual/navbar', $data);
			
			$this->load->view('penjual/profile/profile',$this->inputSetting($data));
			$this->load->view('control');
			$this->load->view('footer1');
			$this->load->view('footer2');
			
        }
		
    }
	
	public function create_data() {
	
		$filename = $this->input->post('name')."-".$this->input->post('store_name');
		$config['upload_path'] = './upload/person/';
		$config['allowed_types'] = "gif|jpg|jpeg|png";
		$config['overwrite']="true";
		$config['max_size']="20000000";
		$config['max_width']="10000";
		$config['max_height']="10000";
		$config['file_name'] = ''.$filename;
		$this->upload->initialize($config);

		if(!$this->upload->do_upload()){
				$data['user_id']= $this->session->userdata('user_id');
				$data['person_id']= $this->getPersonIdLast();
				$data['name'] = $this->input->post('name');
				$data['birth_date'] = date("Y-m-d",strtotime($this->input->post('birth_date')));
				$data['no_ktp'] = $this->input->post('no_ktp');
				$data['blood_type'] = $this->input->post('blood_type');
				$data['gender'] = $this->input->post('gender');
				$data['email'] = $this->input->post('email');
					
				$this->m_profile->insert($data);
					
				$this->session->set_flashdata('notif','Profil Disimpan !');
				redirect('profile/setting_profile');

		}else {

			$dat = $this->upload->data();
			$this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => './upload/person/'. $dat['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '100%',
                    'width' => 230,
                    'height' => 230
                ));
			if($this->image_lib->resize())
            {
				$data['user_id']= $this->session->userdata('user_id');
				$data['person_id']= $this->getPersonIdLast();
				$data['name'] = $this->input->post('name');
				$data['birth_date'] = date("Y-m-d",strtotime($this->input->post('birth_date')));
				$data['no_ktp'] = $this->input->post('no_ktp');
				$data['blood_type'] = $this->input->post('blood_type');
				$data['gender'] = $this->input->post('gender');
				$data['email'] = $this->input->post('email');
				$data['image'] = $dat['raw_name'].'_thumb'.$dat['file_ext'];
					
				$this->m_profile->insert($data);
					
				$this->session->set_flashdata('notif','Profil Disimpan !');
				redirect('profile/setting_profile');
			}
				else
            {
                $data['error'] = $this->image_lib->display_errors();
            }
		}
		
		
    }
	
	public function update_data() {
	
	if($_FILES['userfile']['name']==""){
			$data['name'] = $this->input->post('name');
			$data['birth_date'] = date("Y-m-d",strtotime($this->input->post('birth_date')));
			$data['no_ktp'] = $this->input->post('no_ktp');
			$data['blood_type'] = $this->input->post('blood_type');
			$data['gender'] = $this->input->post('gender');
			$data['email'] = $this->input->post('email');
						
			$this->m_profile->update($data);
						
			$this->session->set_flashdata('notif','Profil Disimpan !');
			redirect('profile/setting_profile');
		}else{
			$filename = $this->input->post('name')."-".$this->input->post('store_name');
			$config['upload_path'] = './upload/person/';
			$config['allowed_types'] = "gif|jpg|jpeg|png";
			$config['overwrite']="true";
			$config['max_size']="20000000";
			$config['max_width']="10000";
			$config['max_height']="10000";
			$config['file_name'] = ''.$filename;
			$this->upload->initialize($config);

			if(!$this->upload->do_upload()){
				echo  $this->upload->display_errors();

			}else {

				$dat = $this->upload->data();
				$this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => './upload/person/'. $dat['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '100%',
                    'width' => 230,
                    'height' => 230
                ));
				if($this->image_lib->resize())
				{
					$data['name'] = $this->input->post('name');
					$data['birth_date'] = date("Y-m-d",strtotime($this->input->post('birth_date')));
					$data['no_ktp'] = $this->input->post('no_ktp');
					$data['blood_type'] = $this->input->post('blood_type');
					$data['gender'] = $this->input->post('gender');
					$data['email'] = $this->input->post('email');
					$data['image'] = $dat['raw_name'].'_thumb'.$dat['file_ext'];
						
					$this->m_profile->update($data);
						
					$this->session->set_flashdata('notif','Profil Disimpan !');
					redirect('profile/setting_profile');
		
				}
				else
				{
					$data['error'] = $this->image_lib->display_errors();
				}
			}
		}
		
		
    }
    
    
    public function update_data_awal() {
    	
    		$data['store_id'] = $this->input->post('store_id');
    		$data['desc'] = $this->input->post('alamat');
    		$data['desa'] = $this->input->post('desa');
    
    		$this->m_profile->update_address($data);
    		
    		$data2['store_id'] = $this->input->post('store_id');
    		$data2['name'] = $this->input->post('nm_toko');
    		$data2['nohp'] = $this->input->post('nohp');
    		$data2['desc'] = $this->input->post('keterangan');
    		
    		$this->m_profile->update_store($data2);
    		
    
    		$this->session->set_flashdata('notif','Profil Disimpan !');
    		redirect('profile/setting_profile');
    	
    	}
    
    
    
    
    
}
