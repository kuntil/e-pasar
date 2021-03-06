<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	 function __construct() {
        parent::__construct();
		$this->load->model("admin/m_login");
        $this->load->helper(array('Form', 'Cookie', 'String'));
    }
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('admin/login');
		$this->load->view('admin/footer');
	}
	
	public function login(){
		if($_POST) {
            $data['username'] = $this->input->post('username');
            $data['password'] = md5($this->input->post('password'));
            $data['remember'] = $this->input->post('remember');
			
            $result = $this->m_login->login($data);
            if($result) {
				if ($data['remember']) {
					$key = random_string('alnum', 64);
					set_cookie('technoscode', $key, 3600*24*30); // set expired 30 hari kedepan
					
					// simpan key di database
					$update_key = array(
						'cookie' => $key
					);
					$this->m_login->update($update_key, $result->user_id);
				}
				
				$this->_daftarkan_session($result);
            } else {
                $this->session->set_flashdata('notif', 'Username atau password salah!');
                redirect('admin/login');
            }
		}

    }
	
	public function _daftarkan_session($result) {
        // Daftarkan Session
        $sess = array(
            'logged' => TRUE,
            'qid' => $result->qid,
            'user_id' => $result->user_id,
            'username' => $result->username,
            'year' => $result->year,
            'month' => $result->month,
            'user_type' => $result->type
        );
        $this->session->set_userdata($sess);
            
        //Redirect ke home
        redirect('admin/home');        
    }
    
    public function logout() {
		delete_cookie('technoscode');
        $this->session->sess_destroy();
        redirect('admin/login');
    }
	
}
