<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tips_belanja extends CI_Controller {

	 function __construct() {
        parent::__construct();
		$this->load->model("m_login");
		$this->load->model("admin/m_tips_belanja");
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
		
		$this->data['userfile'] = array(
				'name'  => 'userfile',
				'id'    => 'exampleInputFile',
				'type'  => 'file',
				'value' => $data['image']
		);
		$this->data['qid'] = array(
				'name'  => 'qid',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'Isi',
				'value' => $data['qid'],
		);
		$this->data['qid2'] = $data['qid'];
		$this->data['image2'] = $data['image'];
		return $this->data;
	}
	
	
	public function index(){
			$config = array ();
			$config ["base_url"] = base_url () . "admin/tips_belanja/index";
			$config ["total_rows"] = $this->m_tips_belanja->record_count ();
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
			
			
			$data ['tips_belanja'] = $this->m_tips_belanja->fetchAll($config ["per_page"], $page);
			$data ['links'] = $this->pagination->create_links ();
			$this->load->view('admin/header');
			$this->load->view('admin/navbar');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/tips_belanja/content', $data);
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
			$config ["base_url"] = base_url () . "admin/tips_belanja/find/".$query."/".$column;
			$config ["total_rows"] = $this->m_tips_belanja->search_count($column,$query);
			$config ["per_page"] = 25;
			$config ["uri_segment"] = 6;
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
				
			if ($this->uri->segment ( 6 ) == "") {
				$data ['number'] = 0;
			} else {
				$data ['number'] = $this->uri->segment ( 6 );
			}
				
			$this->pagination->initialize ( $config );
			$page = ($this->uri->segment ( 6 )) ? $this->uri->segment ( 6 ) : 0;
				
			$data ['tips_belanja'] = $this->m_tips_belanja->search($column,$query,$config ["per_page"], $page);
			$data ['links'] = $this->pagination->create_links ();
			$this->load->view('admin/header');
			$this->load->view('admin/navbar');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/tips_belanja/content', $data);
			$this->load->view('admin/footer');

	}
	
	public function add(){
			$data = array(
				'title'=>null,
				'content'=>null,
				'image'=>null,
				'qid'=>null,
			);
			$this->load->view('admin/header');
			$this->load->view('admin/navbar');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/tips_belanja/form', $this->inputSetting($data));
			$this->load->view('admin/footer');
		
	}
	
	
	public function insert(){
		$count = $this->m_tips_belanja->record_count ();
		$filename = $count+1;
		$config['upload_path'] = './upload/pages/shopping_tips/';
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
			/*$this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => './upload/pages/shopping_tips/'. $dat['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '70%',
                    'width' => 230,
                    'height' => 230
                ));*/
			if($this->image_lib->resize())
            {
				$data['title'] = $this->input->post('title');
				$data['content'] = $this->input->post('content');
				$data['image'] = $dat['file_name'];
				$this->m_tips_belanja->insert($data);
				
				$this->session->set_flashdata('notif','Data Cara Belanja Disimpan !');
				redirect('admin/tips_belanja');
			}
				else
            {
                $data['error'] = $this->image_lib->display_errors();
            }
		}
		
		
	}
	
	
	public function modify()
	{
		$qid = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
		
			$data['entry'] =  $this->m_tips_belanja->get($qid);
			if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
				redirect();
			} else {
				$data['entry'] = $data['entry'][0];
				$this->load->view('admin/header');
				$this->load->view('admin/navbar');
				$this->load->view('admin/sidebar');
				$this->load->view('admin/tips_belanja/form', $this->inputSetting($data['entry']));
				$this->load->view('admin/footer');
			}
	
	}
	
	public function update(){
		$qid = base64_encode($this->encrypt->encode($this->input->post('qid'), $this->session->userdata('encrypt_key')));
		
		if($_FILES['userfile']['name']==""){
			$data['qid'] = $this->input->post('qid');
			$data['title'] = $this->input->post('title');
			$data['content'] = $this->input->post('content');
			$this->m_tips_belanja->update($data);
			
			$this->session->set_flashdata('notif','Data Cara Belanja Disimpan !');
			redirect('admin/tips_belanja/modify?id='.$qid);
		}else{
			$filename = $this->input->post('qid');
			$config['upload_path'] = './upload/pages/shopping_tips/';
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
				/*$this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => './upload/pages/shopping_tips/'. $dat['file_name'],
                    'maintain_ratio' => false,
                    'create_thumb' => true,
                    'quality' => '70%',
                    'width' => 230,
                    'height' => 230
                ));*/
				if($this->image_lib->resize())
				{
					$data['qid'] = $this->input->post('qid');
					$data['title'] = $this->input->post('title');
					$data['content'] = $this->input->post('content');
					$data['image'] = $dat['file_name'];
					$this->m_tips_belanja->update($data);
					
					$this->session->set_flashdata('notif','Data Cara Belanja Disimpan !');
					redirect('admin/tips_belanja/modify?id='.$qid);
				}
				else
				{
					$data['error'] = $this->image_lib->display_errors();
				}
			}
		}
		
		
	}
	
	
	
	
	public function delete() {
		
		$qid = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
		
        if($qid!="") {
			
			$image = $this->m_tips_belanja->link_gambar($qid);
			if ($image->num_rows() > 0)
			{
				$row = $image->row();			
				$file_gambar = $row->image;
				echo $file_gambar;
				$path_file = './upload/pages/shopping_tips/';
				unlink($path_file.$file_gambar);
			}
			
             $this->m_tips_belanja->delete($qid);
		
		}
		
		redirect('admin/tips_belanja');
    }
	
}
