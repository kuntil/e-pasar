<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Premium extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
        $this->load->model("m_home");
        $this->load->model("m_premium");
        $this->load->model("m_product_store");
        $this->load->model("m_store");
        $this->load->model("m_profile");
        $this->load->model("m_order");
        $this->load->model("m_transfer");
        $this->load->model("m_accept_transfer");
        $this->load->model("m_transaction_success");
		$this->load->model('m_transaction_cancel');		
        $this->load->model("m_village");
        $this->load->model("m_premium_user");
        $this->load->model("m_pilih_bank");
    }
    
    public function inputSetting($data){
    	$this->data['userfile'] = array(
    			'name'  => 'userfile',
    			'id'    => 'exampleInputFile',
    			'type'  => 'file'
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
					'email'=>null,
					
			);
		}
		
		return $data;
	}
	
	public function account(){
		$accountID=$this->m_premium_user->get_rekening($this->user_store()['store_id']);
		$count = count($accountID);
	
		if($count){
			foreach($accountID as $acc){
				$data['store_id']=$acc->store_id;
				$data['no_account']=$acc->no_account;
			}
		}else{
			$data = array(
					'store_id'=>null,
					'no_account'=>null,
					
			);
		}
	
		return $data;
	}
	
	public function bukti(){
		$bukti_pmbyrn=$this->m_premium_user->get_toko($this->user_store()['store_id']);
		$count = count($bukti_pmbyrn);
	
		if($count){
			foreach($bukti_pmbyrn as $bkt){
				$data['store_id']=$bkt->store_id;
				$data['bukti_transfer']=$bkt->bukti_transfer;
			}
		}else{
			$data = array(
					'store_id'=>null,
					'bukti_transfer'=>null,
			);
		}
	
		return $data;
	}
	
	public function aktif(){
		$toko_aktif=$this->m_premium_user->get_toko_aktif($this->user_store()['store_id']);
		$count = count($toko_aktif);
		
		if($count){
			foreach($toko_aktif as $on){
				$data['store_id']=$on->store_id;
				$data['aktif']=$on->aktif;
			}
		}else{
			$data = array(
					'store_id'=>null,
					'aktif'=>null,
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
	
	public function upgrade() {
		
		$data['get_store']= $this->get_store();
		$data['get_address_store']= $this->get_address_store();
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['store_id'] = $this->user_store()['store_id'];
		$data['get_image']= $this->get_person()["image"];
		$data['buyer_name'] = $this->buyer()['name'];
		$data['email'] = $this->buyer()['email'];
		$data['no_account'] = $this->account()['no_account'];
		$data['bukti_transfer'] = $this->bukti()['bukti_transfer'];
		$data['aktif'] = $this->aktif()['aktif'];
		$data['up']=$this->m_premium->upgrade();
		$data['upgrade'] = $this->input->post('userfile');
		$this->load->view("header");
		
		if($this->session->userdata("user_type")==1){
				
			$total_data = $this->m_product_store->get_all_count($this->session->userdata('user_id'));
			$content_per_page = 4;
			$data['total_data'] = ceil($total_data->tol_records/$content_per_page);
			$data['entry'] =  $this->m_store->get($data['store_id']);
			if($data['entry']){
				$data['entry'] = $data['entry'][0];
			}else{
				$data['entry'] = null;
			}
			$data['entry2'] =  $this->m_profile->fetchById($this->session->userdata('user_id'));
			if($data['entry2']){
				$data['entry2'] = $data['entry2'][0];
			} else {
				$data['entry2'] = array("name"=>null,"job"=>null);
			}
			$data['total_order']= count($this->m_order->my_list_order_store($data['store_id']));
			$data['transfer']= count($this->m_transfer->transfer($data['store_id']));
			
			$get_toko_bukti_transfer_bronze= $this->m_premium_user->get_toko_bukti_transfer_bronze($this->user_store()['store_id']);
			$data['count_bronze'] = count($get_toko_bukti_transfer_bronze);
			$data['upgrade'] =  $this->inputSetting($data);
						
			$get_toko_bukti_transfer_silver= $this->m_premium_user->get_toko_bukti_transfer_silver($this->user_store()['store_id']);
			$data['count_silver'] = count($get_toko_bukti_transfer_silver);
			$data['upgrade'] =  $this->inputSetting($data);
			
			$get_toko_bukti_transfer_gold= $this->m_premium_user->get_toko_bukti_transfer_gold($this->user_store()['store_id']);
			$data['count_gold'] = count($get_toko_bukti_transfer_gold);			
			$data['upgrade'] =  $this->inputSetting($data);
			
			$get_toko_aktif= $this->m_premium_user->get_toko_aktif($this->user_store()['store_id']);
			$data['count_aktif'] = count($get_toko_aktif);
			
			$get_toko_belum_aktif= $this->m_premium_user->get_toko_belum_aktif($this->user_store()['store_id']);
			$data['count_belum_aktif'] = count($get_toko_belum_aktif);
			
			$data['village']= $this->m_village->get_village();
			
			$this->load->view('penjual/navbar', $data);
			$this->load->view('penjual/premium/upgrade',  $data);	
			$this->load->view('footer1');
			$this->load->view('footer2');
				
		}	
		
		
    }
    
    
    public function pilih_bank_bronze() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['email'] = $this->buyer()['email'];
    	$data['bukti_transfer'] = $this->bukti()['bukti_transfer'];
    	$data['no_account'] = $this->account()['no_account'];
    	$data['pilih']=$this->m_pilih_bank->pilih_bank();
    	
    	$get_toko= $this->m_premium_user->get_toko($this->user_store()['store_id']);
    	$data ['count'] = count($get_toko);
    	
    	$this->load->view("header");
    
    	if($this->session->userdata("user_type")==1){
    
    		$total_data = $this->m_product_store->get_all_count($this->session->userdata('user_id'));
    		$content_per_page = 4;
    		$data['total_data'] = ceil($total_data->tol_records/$content_per_page);
    		$data['entry'] =  $this->m_store->get($data['store_id']);
    		if($data['entry']){
    			$data['entry'] = $data['entry'][0];
    		}else{
    			$data['entry'] = null;
    		}
    		$data['entry2'] =  $this->m_profile->fetchById($this->session->userdata('user_id'));
    		if($data['entry2']){
    			$data['entry2'] = $data['entry2'][0];
    		} else {
    			$data['entry2'] = array("name"=>null,"email"=>null);
    		}
    		$data['total_order']= count($this->m_order->my_list_order_store($data['store_id']));
    		$data['transfer']= count($this->m_transfer->transfer($data['store_id']));
    		$data['village']= $this->m_village->get_village();
    			
    		$this->load->view('penjual/navbar', $data);
    		$this->load->view('penjual/premium/pilih_bank_bronze',  $this->inputSetting($data));
    		$this->load->view('footer1');
			$this->load->view('footer2');
    
    	}
    
    
    }
    
    public function pilih_bank_silver() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['email'] = $this->buyer()['email'];
    	$data['bukti_transfer'] = $this->bukti()['bukti_transfer'];
    	$data['no_account'] = $this->account()['no_account'];
    	$data['pilih']=$this->m_pilih_bank->pilih_bank();
    	 
    	$get_toko= $this->m_premium_user->get_toko($this->user_store()['store_id']);
    	$data ['count'] = count($get_toko);
    	 
    	$this->load->view("header");
    
    	if($this->session->userdata("user_type")==1){
    
    		$total_data = $this->m_product_store->get_all_count($this->session->userdata('user_id'));
    		$content_per_page = 4;
    		$data['total_data'] = ceil($total_data->tol_records/$content_per_page);
    		$data['entry'] =  $this->m_store->get($data['store_id']);
    		if($data['entry']){
    			$data['entry'] = $data['entry'][0];
    		}else{
    			$data['entry'] = null;
    		}
    		$data['entry2'] =  $this->m_profile->fetchById($this->session->userdata('user_id'));
    		if($data['entry2']){
    			$data['entry2'] = $data['entry2'][0];
    		} else {
    			$data['entry2'] = array("name"=>null,"email"=>null);
    		}
    		$data['total_order']= count($this->m_order->my_list_order_store($data['store_id']));
    		$data['transfer']= count($this->m_transfer->transfer($data['store_id']));
    		$data['village']= $this->m_village->get_village();
    		 
    		$this->load->view('penjual/navbar', $data);
    		$this->load->view('penjual/premium/pilih_bank_silver',  $this->inputSetting($data));
    		$this->load->view('footer1');
			$this->load->view('footer2');
    
    	}
    
    
    }
    
    public function pilih_bank_gold() {
    
    	$data['get_store']= $this->get_store();
    	$data['get_address_store']= $this->get_address_store();
    	$data['get_address_buyer']= $this->get_address_buyer();
    	$data['user_store_name']= $this->user_store()['name'];
    	$data['user_profile_name']= $this->user_profile()['name'];
    	$data['store_id'] = $this->user_store()['store_id'];
    	$data['get_image']= $this->get_person()["image"];
    	$data['buyer_name'] = $this->buyer()['name'];
    	$data['email'] = $this->buyer()['email'];
    	$data['bukti_transfer'] = $this->bukti()['bukti_transfer'];
    	$data['no_account'] = $this->account()['no_account'];
    	$data['pilih']=$this->m_pilih_bank->pilih_bank();
    
    	$get_toko= $this->m_premium_user->get_toko($this->user_store()['store_id']);
    	$data ['count'] = count($get_toko);
    
    	$this->load->view("header");
    
    	if($this->session->userdata("user_type")==1){
    
    		$total_data = $this->m_product_store->get_all_count($this->session->userdata('user_id'));
    		$content_per_page = 4;
    		$data['total_data'] = ceil($total_data->tol_records/$content_per_page);
    		$data['entry'] =  $this->m_store->get($data['store_id']);
    		if($data['entry']){
    			$data['entry'] = $data['entry'][0];
    		}else{
    			$data['entry'] = null;
    		}
    		$data['entry2'] =  $this->m_profile->fetchById($this->session->userdata('user_id'));
    		if($data['entry2']){
    			$data['entry2'] = $data['entry2'][0];
    		} else {
    			$data['entry2'] = array("name"=>null,"email"=>null);
    		}
    		$data['total_order']= count($this->m_order->my_list_order_store($data['store_id']));
    		$data['transfer']= count($this->m_transfer->transfer($data['store_id']));
    		$data['village']= $this->m_village->get_village();
    		 
    		$this->load->view('penjual/navbar', $data);
    		$this->load->view('penjual/premium/pilih_bank_gold',  $this->inputSetting($data));
    		$this->load->view('footer1');
			$this->load->view('footer2');
    
    	}
    
    
    }
    
    public function bukti_transfer()
    {
    	$get_toko= $this->m_premium_user->get_toko($this->user_store()['store_id']);
    	$count = count($get_toko);
    	 
    		$data['store_id'] = $this->user_store()['store_id'];
    		$data['bukti_transfer'] = $this->input->post('userfile');
    		
    		$this->m_premium_user->update($data);
    		
    		$this->session->set_flashdata('notif3','Terima kasih, permintaan anda akan segera di verifikasi !');
    		redirect('premium/upgrade');
    }    
   
    
    public function create_data_bronze()
    {
    	$get_toko= $this->m_premium_user->get_toko($this->user_store()['store_id']);
    	$count = count($get_toko);
    	
    	if($count){
	    	 $this->session->set_flashdata('notif1','Maaf, Anda Masih Berlangganan Di Paket Super Toko !');
	    	 redirect('premium/upgrade');
    	 }else{
	    	$data['store_id'] = $this->input->post('store_id');
	    	$data['email'] = $this->input->post('email');
	    	$data['no_account'] = $this->input->post('no_account');
	    	$data['tipe_premium'] = 3; 
	    	$data['aktif'] = 'T';
	    
	    	$this->m_premium_user->insert($data);
	    	
	    	
	    	//enkripsi id
	    	//$encrypted_id = md5($id);
	    	
	    	$this->load->library('email');
	    	$config = array();
	    	$config['charset'] = 'utf-8';
	    	$config['useragent'] = 'Codeigniter';
	    	$config['protocol']= "smtp";
	    	$config['mailtype']= "html";
	    	$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
	    	$config['smtp_port']= "465";
	    	$config['smtp_timeout']= "400";
	    	$config['smtp_user']= "cs.pasarbumi@gmail.com"; // isi dengan email kamu
	    	$config['smtp_pass']= "p45412bum1"; // isi dengan password kamu
	    	$config['crlf']="\r\n";
	    	$config['newline']="\r\n";
	    	$config['wordwrap'] = TRUE;
	    	//memanggil library email dan set konfigurasi untuk pengiriman email
	    	
	    	$this->email->initialize($config);
	    	
	    	//konfigurasi pengiriman
	    	$this->email->from($config['smtp_user']);
	    	$this->email->to($data['email']);
	    	$this->email->subject("Pembayaran Paket Super Toko");
	    	$this->email->message(
	    			" Segera lakukan pembayaran paket super toko bronze via transfer rekening. Total pembayaran anda adalah Rp 300.000.<br><br>
					Rekening 213132435 atas nama technos studio. Batas pembayaran adalah 24 jam.<br><br>
					Login ke akun Pasarbumi Kamu http://pasarbumi.com/"
	    			);
	    
	    	if($this->email->send())
	    	{
	    		$this->session->set_flashdata('notif2','Silahkan upload bukti pembayaran super toko !');
	    		redirect('premium/pilih_bank_bronze');
	    	}else
	    	{
	    		
	    	}
	    	
	    	
    	 }
    
    }
    
    public function create_data_silver()
    {
    	$get_toko= $this->m_premium_user->get_toko($this->user_store()['store_id']);
    	$count = count($get_toko);
    	
    	if($count){
    		$this->session->set_flashdata('notif1','Maaf, Anda Masih Berlangganan Di Paket Super Toko !');
    		redirect('premium/pilih_bank');
    	}else{
	    	$data['store_id'] = $this->input->post('store_id');
	    	$data['email'] = $this->input->post('email');
	    	$data['no_account'] = $this->input->post('no_account');
	    	$data['tipe_premium'] = 2;
	    	$data['aktif'] = 'T';
	    	 
	    	$this->m_premium_user->insert($data);
	    	 
	    	$this->load->library('email');
	    	$config = array();
	    	$config['charset'] = 'utf-8';
	    	$config['useragent'] = 'Codeigniter';
	    	$config['protocol']= "smtp";
	    	$config['mailtype']= "html";
	    	$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
	    	$config['smtp_port']= "465";
	    	$config['smtp_timeout']= "400";
	    	$config['smtp_user']= "cs.pasarbumi@gmail.com"; // isi dengan email kamu
	    	$config['smtp_pass']= "p45412bum1"; // isi dengan password kamu
	    	$config['crlf']="\r\n";
	    	$config['newline']="\r\n";
	    	$config['wordwrap'] = TRUE;
	    	//memanggil library email dan set konfigurasi untuk pengiriman email
	    	
	    	$this->email->initialize($config);
	    	
	    	//konfigurasi pengiriman
	    	$this->email->from($config['smtp_user']);
	    	$this->email->to($data['email']);
	    	$this->email->subject("Pembayaran Paket Super Toko");
	    	$this->email->message(
	    			" Segera lakukan pembayaran paket super toko silver via transfer rekening. Total pembayaran anda adalah Rp 600.000.<br><br>
					Rekening 213132435 atas nama technos studio. Batas pembayaran adalah 24 jam.<br><br>
					Login ke akun Pasarbumi Anda http://pasarbumi.com/"
	    			);
	    	
	    	if($this->email->send())
	    	{
	    		$this->session->set_flashdata('notif2','Silahkan upload bukti pembayaran super toko !');
	    		redirect('premium/pilih_bank_silver');
	    	}else
	    	{
	    		
	    	}
    	}
    	 
    }
    
    public function create_data_gold()
    {
    	$get_toko= $this->m_premium_user->get_toko($this->user_store()['store_id']);
    	$count = count($get_toko);
    	
    	if($count){
    		$this->session->set_flashdata('notif1','Maaf, Anda Masih Berlangganan Di Paket Super Toko !');
    		redirect('premium/pilih_bank');
    	}else{    		
    		$data['store_id'] = $this->input->post('store_id');
    		$data['email'] = $this->input->post('email');
    		$data['no_account'] = $this->input->post('no_account');
    		$data['tipe_premium'] = 1;
    		$data['aktif'] = 'T';
    		    			
    		$this->m_premium_user->insert($data);
    			
    		$this->load->library('email');
    		$config = array();
    		$config['charset'] = 'utf-8';
    		$config['useragent'] = 'Codeigniter';
    		$config['protocol']= "smtp";
    		$config['mailtype']= "html";
    		$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
    		$config['smtp_port']= "465";
    		$config['smtp_timeout']= "400";
    		$config['smtp_user']= "cs.pasarbumi@gmail.com"; // isi dengan email kamu
    		$config['smtp_pass']= "p45412bum1"; // isi dengan password kamu
    		$config['crlf']="\r\n";
    		$config['newline']="\r\n";
    		$config['wordwrap'] = TRUE;
    		//memanggil library email dan set konfigurasi untuk pengiriman email
    		
    		$this->email->initialize($config);
    		
    		//konfigurasi pengiriman
    		$this->email->from($config['smtp_user']);
    		$this->email->to($data['email']);
    		$this->email->subject("Pembayaran Paket Super Toko");
    		$this->email->message(
    				" Segera lakukan pembayaran paket super toko gold via transfer rekening. Total pembayaran anda adalah Rp 900.000.<br><br>
					Rekening 213132435 atas nama technos studio. Batas pembayaran adalah 24 jam.<br><br>
					Login ke akun Pasarbumi Kamu http://pasarbumi.com/"
    				);
    		
    		if($this->email->send())
    		{
    			$this->session->set_flashdata('notif2','Silahkan upload bukti pembayaran super toko !');
    			redirect('premium/pilih_bank_gold');
    		}else
    		{
    			
    		}
    	}		
    	
    }
        
    
}
