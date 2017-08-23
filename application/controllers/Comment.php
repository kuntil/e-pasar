<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
        $this->load->model("m_home");
        $this->load->model("m_cart");
        $this->load->model("m_order");
        $this->load->model("m_transfer");
        $this->load->model("m_accept_transfer");
        $this->load->model("m_transaction_success");
		$this->load->model('m_transaction_cancel');		
        $this->load->model("m_comment_product");
        $this->load->model("m_comment_sub_product");
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

	public function index() {
		
		$data['get_store']= $this->get_store();
		$data['get_address_store']= $this->get_address_store();
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['store_id'] = $this->user_store()['store_id'];
		$data['get_image']= $this->get_person()["image"];
		$data['buyer_name'] = $this->buyer()['name'];
		$data['buyer_job'] = $this->buyer()['job'];
		$data['transfer']= count($this->m_transfer->transfer($data['store_id']));
		$data['accept_transfer']= count($this->m_accept_transfer->my_list_order_store($data['store_id']));
		$data['transaction_success']= count($this->m_transaction_success->my_list_order_store($data['store_id']));
		$this->load->view('header');	
		
		if($this->session->userdata('user_type')==1){	
		
			$config = array ();
			$config ["base_url"] = base_url () . "comment/index";
			$config ["total_rows"] = $this->m_comment_product->record_count_comment_store($data['store_id']);
			$config ["per_page"] = 25;
			$config ["uri_segment"] = 3;
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
			
			if ($this->uri->segment ( 3 ) == "") {
				$data ['number'] = 0;
			} else {
				$data ['number'] = $this->uri->segment ( 3 );
			}
			
			$this->pagination->initialize ( $config );
			$page = ($this->uri->segment ( 3 )) ? $this->uri->segment ( 3 ) : 0;
			
			$data['comment'] = $this->m_comment_product->comment_store($config ["per_page"], $page, $data['store_id']);
			$data ['links'] = $this->pagination->create_links ();
			$this->load->view('penjual/navbar', $data);
			$this->load->view('penjual/comment/content', $data);
			$this->load->view('control');
			$this->load->view('footer1');
			$this->load->view('footer2');
		
		} else if($this->session->userdata('user_type')==2){	
		
			$config = array ();
			$config ["base_url"] = base_url () . "comment/index";
			$config ["total_rows"] = $this->m_comment_product->record_count_comment_buyer($this->session->userdata('user_id'));
			$config ["per_page"] = 25;
			$config ["uri_segment"] = 3;
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
			
			if ($this->uri->segment ( 3 ) == "") {
				$data ['number'] = 0;
			} else {
				$data ['number'] = $this->uri->segment ( 3 );
			}
			
			$this->pagination->initialize ( $config );
			$page = ($this->uri->segment ( 3 )) ? $this->uri->segment ( 3 ) : 0;
			
			$data['cart'] = $this->m_cart->my_list_cart($this->session->userdata('user_id'));
			$data['total_order']= count($this->m_order->my_list_order_store($data['store_id']));
			$data['comment'] = $this->m_comment_product->comment_buyer($config ["per_page"], $page, $this->session->userdata('user_id'));
			$data ['links'] = $this->pagination->create_links ();
			$data['detail_order']= count($this->m_order->order_buyer($this->session->userdata('user_id')));
			$data['order_process']= count($this->m_order->order_process_buyer($this->session->userdata('user_id')));
			$data['transaction_success']= count($this->m_transaction_success->transaction_success($this->session->userdata('user_id')));
			$data['transaction_cancel']= count($this->m_transaction_cancel->transaction_cancel($this->session->userdata('user_id')));
			$this->load->view('pembeli/navbar', $data);
			$this->load->view('pembeli/comment/content', $data);
			$this->load->view('control');
			$this->load->view('footer1');
			$this->load->view('footer2');
		}else{
			$this->session->set_flashdata('notif2','Login terlebih dahulu !');
			redirect('product/detail_product?id='.$product_id);
		}
		
    }
	
	public function detail_comment() {
		
		$data['get_store']= $this->get_store();
		$data['get_address_store']= $this->get_address_store();
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['store_id'] = $this->user_store()['store_id'];
		$data['get_image']= $this->get_person()["image"];
		$data['buyer_name'] = $this->buyer()['name'];
		$data['buyer_job'] = $this->buyer()['job'];
		
		$this->load->view('header');	
		
		if($this->session->userdata('user_type')==1){	
			$qid = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
			$data['comment'] = $this->m_comment_product->detail_comment_store($data['store_id'], $qid);
			$this->load->view('penjual/navbar', $data);
			$this->load->view('penjual/comment/detail', $data);
			$this->load->view('control');
			$this->load->view('footer1');
			$this->load->view('footer2');
			
		}else if($this->session->userdata('user_type')==2){	
			$qid = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
			$data['cart'] = $this->m_cart->my_list_cart($this->session->userdata('user_id'));
			$data['total_order']= count($this->m_order->my_list_order_buyer($this->session->userdata('user_id')));
			$data['comment'] = $this->m_comment_product->detail_comment_buyer($this->session->userdata('user_id'), $qid);
			$data['detail_order']= count($this->m_order->order_buyer($this->session->userdata('user_id')));
			$data['order_process']= count($this->m_order->order_process_buyer($this->session->userdata('user_id')));
			$data['transaction_success']= count($this->m_transaction_success->transaction_success($this->session->userdata('user_id')));
			$data['transaction_cancel']= count($this->m_transaction_cancel->transaction_cancel($this->session->userdata('user_id')));
			$this->load->view('pembeli/navbar', $data);
			$this->load->view('pembeli/comment/detail', $data);
			$this->load->view('control');
			$this->load->view('footer1');
			$this->load->view('footer2');
			
		}else{
			$this->session->set_flashdata('notif2','Login terlebih dahulu !');
			redirect('product/detail_product?id='.$product_id);
		}
		
    }
	
    public function insert() {
		$product_id = base64_encode($this->encrypt->encode($this->input->post('product_id'), $this->session->userdata('encrypt_key')));
		
		if($this->session->userdata('user_type')==1){				
			$data['store_id'] = $this->user_store()['store_id'];
			$data['product_id'] = $this->input->post('product_id');
			$data['message'] = $this->input->post('message');
			$this->m_comment_product->insert($data);
			
			$this->session->set_flashdata('notif','Komentar Disimpan !');
			redirect('product/detail_product?id='.$product_id);
			
		}else if($this->session->userdata('user_type')==2){				
			$data['user_id'] = $this->session->userdata('user_id');
			$data['product_id'] = $this->input->post('product_id');
			$data['message'] = $this->input->post('message');
			$this->m_comment_product->insert($data);
			
			$this->session->set_flashdata('notif','Komentar Disimpan !');
			redirect('product/detail_product?id='.$product_id);
			
		}else{
			$this->session->set_flashdata('notif2','Login terlebih dahulu !');
			redirect('product/detail_product?id='.$product_id);
		}
		
    }
	
    public function like() {
		$product_id = base64_encode($this->encrypt->encode($this->input->get('product_id'), $this->session->userdata('encrypt_key')));
		
		if($this->session->userdata('user_id')){				
			$data['qid'] = $this->input->get('qid');
			
			$count_like_comment = $this->m_comment_product->record_count_like_comment($this->input->get('qid'));
			$count_like_comment = $count_like_comment[0];
			$data['like'] = $count_like_comment['like'] + 1;
			$this->m_comment_product->update($data);
			
			$this->session->set_flashdata('notif','Komentar Disimpan !');
			redirect('comment/detail_comment?id='.$this->input->get('product_id'));
			
		}else{
			$this->session->set_flashdata('notif2','Login terlebih dahulu !');
			redirect('comment/detail_comment?id='.$this->input->get('product_id'));
		}
		
    }
    
}
