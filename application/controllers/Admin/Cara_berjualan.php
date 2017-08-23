<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cara_berjualan extends CI_Controller {

	 function __construct() {
        parent::__construct();
		$this->load->model("m_login");
		$this->load->model("admin/m_cara_berjualan");
        $this->load->helper(array('Form', 'Cookie', 'String'));
		
		if(!$this->session->userdata('user_id')){
			redirect('admin/login');
		}
    }
	
	/* Setup Property column */
	public function inputSetting($data){
		$this->data['title'] = array(
				'name'  => 'title',
				'type'  => 'text',
				'class' => 'form-control',
				'required' => 'required',
				'placeholder'=>'Judul',
				'value' => $data['title'],
		);
		$this->data['content'] = array(
				'name'  => 'content',
				'type'  => 'text',
				'class' => 'form-control',
				'required'=>'required',
				'placeholder'=>'Isi',
				'value' => $data['content'],
		);
		$this->data['content'] = array(
				'name'  => 'content',
				'id'    => 'editor1',
				'type'  => 'text',
				'rows'  => '10',
				'cols'  => '80',
				'class' => 'form-control',
				'required' => 'required',
				'placeholder'=>'Deskripsikan Produk yang Anda Jual',
				'value' => $data['content']
		);
		$this->data['qid'] = array(
				'name'  => 'qid',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'Isi',
				'value' => $data['qid'],
		);
		$this->data['qid2'] = $data['qid'];
		return $this->data;
	}
	
	
	public function index(){
			$config = array ();
			$config ["base_url"] = base_url () . "admin/cara_berjualan/index";
			$config ["total_rows"] = $this->m_cara_berjualan->record_count ();
			$config ["per_page"] = 25;
			$config ["uri_segment"] = 4;
			$choice = $config ["total_rows"] / $config ["per_page"];
			$config ["num_links"] = 5;
			
			// config css for pagination
			$config ['full_tag_open'] = '<ul class="pagination pagination-sm">';
			$config ['full_tag_close'] = '</ul>';
			$config ['first_link'] = 'First';
			$config ['last_link'] = 'Last';
			$config ['first_tag_open'] = '<li>';
			$config ['first_tag_close'] = '</li>';
			$config ['prev_link'] = 'Previous';
			$config ['prev_tag_open'] = '<li class="prev">';
			$config ['prev_tag_close'] = '</li>';
			$config ['next_link'] = 'Next';
			$config ['next_tag_open'] = '<li>';
			$config ['next_tag_close'] = '</li>';
			$config ['last_tag_open'] = '<li>';
			$config ['last_tag_close'] = '</li>';
			$config ['cur_tag_open'] = '<li class="active"><a href="#">';
			$config ['cur_tag_close'] = '</a></li>';
			$config ['num_tag_open'] = '<li>';
			$config ['num_tag_close'] = '</li>';
			
			if ($this->uri->segment ( 4 ) == "") {
				$data ['number'] = 0;
			} else {
				$data ['number'] = $this->uri->segment ( 4 );
			}
			
			$this->pagination->initialize ( $config );
			$page = ($this->uri->segment ( 4 )) ? $this->uri->segment ( 4 ) : 0;
			
			
			$data ['cara_berjualan'] = $this->m_cara_berjualan->fetchAll($config ["per_page"], $page);
			$data ['links'] = $this->pagination->create_links ();
			$this->load->view('admin/header');
			$this->load->view('admin/navbar');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/cara_berjualan/content', $data);
			$this->load->view('admin/footer');
		
	}
	
	public function find(){
		
			if($this->input->post('submit')){
				$column = $this->input->post('column');
				$query = $this->input->post('data');
				
				$option = array(
					'user_column'=>$column,
					'user_data'=>$query
				);
				$this->session->set_userdata($option);
			}else{
			   $query = $this->uri->segment ( 4 );
			   $column = $this->uri->segment ( 5 );
			}
			
			/* Get all users */
		
			$config = array ();
			$config ["base_url"] = base_url () . "admin/cara_berjualan/find/".$query."/".$column;
			$config ["total_rows"] = $this->m_cara_berjualan->search_count($column,$query);
			$config ["per_page"] = 25;
			$config ["uri_segment"] = 6;
			$choice = $config ["total_rows"] / $config ["per_page"];
			$config ["num_links"] = 5;
				
			// config css for pagination
			$config ['full_tag_open'] = '<ul class="pagination">';
			$config ['full_tag_close'] = '</ul>';
			$config ['first_link'] = 'First';
			$config ['last_link'] = 'Last';
			$config ['first_tag_open'] = '<li>';
			$config ['first_tag_close'] = '</li>';
			$config ['prev_link'] = 'Previous';
			$config ['prev_tag_open'] = '<li class="prev">';
			$config ['prev_tag_close'] = '</li>';
			$config ['next_link'] = 'Next';
			$config ['next_tag_open'] = '<li>';
			$config ['next_tag_close'] = '</li>';
			$config ['last_tag_open'] = '<li>';
			$config ['last_tag_close'] = '</li>';
			$config ['cur_tag_open'] = '<li class="active"><a href="#">';
			$config ['cur_tag_close'] = '</a></li>';
			$config ['num_tag_open'] = '<li>';
			$config ['num_tag_close'] = '</li>';
				
			if ($this->uri->segment ( 6 ) == "") {
				$data ['number'] = 0;
			} else {
				$data ['number'] = $this->uri->segment ( 6 );
			}
				
			$this->pagination->initialize ( $config );
			$page = ($this->uri->segment ( 6 )) ? $this->uri->segment ( 6 ) : 0;
				
			$data ['cara_berjualan'] = $this->m_cara_berjualan->search($column,$query,$config ["per_page"], $page);
			$data ['links'] = $this->pagination->create_links ();
			$this->load->view('admin/header');
			$this->load->view('admin/navbar');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/cara_berjualan/content', $data);
			$this->load->view('admin/footer');

	}
	
	public function add(){
		if($this->input->post('submit')){
			
			$data = array(
				'title'=>$this->input->post('title'),
				'content'=>$this->input->post ('content')
				
			);
			$this->pegawai_model->createnoimage($data);
			redirect('admin/cara_berjualan');
			
		} else {
			
			$data = array(
				'title'=>null,
				'content'=>null,
				'qid'=>null,
			);
			$this->load->view('admin/header');
			$this->load->view('admin/navbar');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/cara_berjualan/form', $this->inputSetting($data));
			$this->load->view('admin/footer');
		}
	}
	
	
	public function insert(){
		
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		$this->m_cara_berjualan->insert($data);
		
		$this->session->set_flashdata('notif','Data Cara Berjualan Disimpan !');
		redirect('admin/cara_berjualan');
	}
	
	
	public function modify()
	{
		$qid = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
		
			$data['entry'] =  $this->m_cara_berjualan->get($qid);
			if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
				redirect();
			} else {
				$data['entry'] = $data['entry'][0];
				$this->load->view('admin/header');
				$this->load->view('admin/navbar');
				$this->load->view('admin/sidebar');
				$this->load->view('admin/cara_berjualan/form', $this->inputSetting($data['entry']));
				$this->load->view('admin/footer');
			}
	
	}
	
	public function update(){
		$qid = base64_encode($this->encrypt->encode($this->input->post('qid'), $this->session->userdata('encrypt_key')));
		$data['qid'] = $this->input->post('qid');
		$data['title'] = $this->input->post('title');
		$data['content'] = $this->input->post('content');
		$this->m_cara_berjualan->update($data);
		
		$this->session->set_flashdata('notif','Data Cara Berjualan Disimpan !');
		redirect('admin/cara_berjualan/modify?id='.$qid);
	}
	
	
	public function delete() {
		
		$qid = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
		
        if($qid!="") {
            $this->m_cara_berjualan->delete($qid);
		}
		
        redirect('admin/cara_berjualan');

    }
	
}
