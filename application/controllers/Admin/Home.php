<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 function __construct() {
        parent::__construct();
		$this->load->model("m_login");
        $this->load->helper(array('Form', 'Cookie', 'String'));
		
		if(!$this->session->userdata('user_id')){
			redirect('admin/login');
		}
    }
	
	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/content');
		$this->load->view('admin/footer');
	}
	
}
