<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	 function __construct() {
        parent::__construct();
		$this->load->model('m_register');	
    }
	
	public function validationData(){
		
		$this->form_validation->set_rules('username','Nama','alpha_numeric_spaces|max_length[50]|required');
		$this->form_validation->set_rules('password','Password','alpha_numeric|required');
		$this->form_validation->set_rules('ulang_password', 'Ulangi Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'Email','max_length[60]|valid_email|required');
		
		return $this->form_validation->run();
	}
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('register');
		$this->load->view('control');
		$this->load->view('footer2');
	}
	
	public function getUserIdLast(){
    	$n="";
    	$last = $this->m_register->last();
    	foreach($last as $v){
    		$n = $v->user_id;
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
	
	public function create_data()
	{
		if($this->validationData()==TRUE){

			$email = $this->m_register->get_email($this->input->post('email'));
			$count_email = count($email);
			
			if($count_email){
				$this->session->set_flashdata('notif','Email sudah terdaftar, <br>Silahkan masukkan email yang lain !');
				redirect('register');
			} else {
				
				$data['user_id']= $this->getUserIdLast();
				$data['username'] = $this->input->post('username');
				/*$options = [
					'cost' => 10
				];
				$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT, $options);*/
				$data['password'] = md5($this->input->post('password'));
				$data['email'] = $this->input->post('email');
				$data['type'] = $this->input->post('type');
				$data['create_date'] = date('Y-m-d H:i:s');
				$data['status'] = 0;
				
				
				$id = $this->getUserIdLast();
				$this->m_register->insert($data);
			
				//enkripsi id
				$encrypted_id = md5($id);
				
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
				$this->email->subject("Verifikasi Akun");
				$this->email->message(
					" username : ".$data['username']."<br>
					password : ".$data['password']."<br><br>
					Terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
					site_url("register/verification/$encrypted_id")
				);
				
				if($this->email->send())
				{
					$this->session->set_flashdata('notif2','Registrasi berhasil, silahkan cek email kamu !');
					redirect('login');
				}else
				{
					$this->session->set_flashdata('notif2','Registrasi Gagal !');
					redirect('login');
				}
			}
			
		}else{
			$this->load->view('header');
			$this->load->view('navbar');
			$this->load->view('register');
			$this->load->view('control');
			$this->load->view('footer2');
		}
	}
	
	public function verification($key)
	{
		$this->m_register->changeActiveState($key);
		$this->session->set_flashdata('notif2','Selamat kamu telah memverifikasi akun kamu!');
		redirect('login');
	}
	
}
