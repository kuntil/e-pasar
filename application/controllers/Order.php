<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
		$this->load->model('m_home');	
		$this->load->model('m_order');	
		$this->load->model('m_transfer');	
		$this->load->model('m_accept_transfer');	
		$this->load->model('m_delivery');	
		$this->load->model('m_transaction_success');	
		$this->load->model('m_transaction_cancel');	
		$this->load->model('m_cart');	
		$this->load->model('m_bank_account');	
		
    }
	
	public function inputSetting($data){
		$this->data['user_id'] = array(
				'name'  => 'user_id',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'Product id'
		);
		$this->data['order_id'] = array(
				'name'  => 'order_id',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'Product id'
		);
		$this->data['product_id'] = array(
				'name'  => 'product_id',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'Product id'
		);
		$this->data['store_id'] = array(
				'name'  => 'store_id',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'store id'
		);
		$this->data['total'] = array(
				'name'  => 'total',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'Jumlah'
		);
		$this->data['qid'] = array(
				'name'  => 'qid',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'Jumlah'
		);
		$this->data['image1'] = array(
				'name'  => 'image1',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'image1'
		);
		$this->data['image2'] = array(
				'name'  => 'image2',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'image2'
		);
		$this->data['userfile'] = array(
				'name'  => 'userfile',
				'id'    => 'exampleInputFile',
				'class' => 'btn btn-xs btn-flat',
				'type'  => 'file',
				'required'  => 'required'
		);
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
	
//PENJUAL	

	//ORDERAN MASUK (SUDAH DI TRANSFER)
	public function transfer_result(){
		
		$data['get_store']= $this->get_store();
		$data['get_address']= $this->get_address_store();
		$data['user_store_name']= $this->user_store()['name'];
		$data['store_id']= $this->user_store()['store_id'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['get_image']= $this->get_person()["image"];
		$data['order']= $this->m_transfer->transfer($data['store_id']);
		$data['total_order']= count($this->m_order->my_list_order_store($data['store_id']));
		$data['transfer']= count($this->m_transfer->transfer($data['store_id']));
		$data['accept_transfer']= count($this->m_accept_transfer->my_list_order_store($data['store_id']));
		$data['transaction_success']= count($this->m_transaction_success->my_list_order_store($data['store_id']));
		$data['qty']= $this->inputSetting($data);
			
		$this->load->view('header');
		$this->load->view('penjual/navbar', $data);
		$this->load->view('penjual/order/accept_order', $data);
		$this->load->view('control');
		$this->load->view('footer1');
		$this->load->view('footer2');
	}
	
	// SETUJUI TRANSFER
	public function accept_transfer() {
	if($this->session->userdata('user_id')) {
				
			$data['user_id']= $this->input->post('user_id');
			$data['store_id'] = $this->input->post('store_id');
			$data['order_id'] = $this->input->post('order_id');
			$data['total'] = $this->input->post('total');
			$data['qid'] = $this->input->post('qid');
			$data['image1'] = $this->input->post('image1');
			$data['image2'] = $this->input->post('image2');
			$this->m_accept_transfer->insert($data);
					
			$data2['user_id']= $this->input->post('user_id');
			$data2['order_id'] = $this->input->post('order_id');
			
			$this->m_transfer->delete($data2['order_id'],$data2['user_id']);
			
			$this->session->set_flashdata('notif','Data Produk Disimpan !');
			redirect('order/accept_transfer_result');
				
			
        } else {
			redirect('login');
		}
		
		
    }
	
	// ORDERAN YANG TELAH DI SETUJUI
	public function accept_transfer_result(){
		
		$data['get_store']= $this->get_store();
		$data['get_address']= $this->get_address_store();
		$data['user_store_name']= $this->user_store()['name'];
		$data['store_id']= $this->user_store()['store_id'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['get_image']= $this->get_person()["image"];
		$data['order']= $this->m_accept_transfer->my_list_order_store($data['store_id']);
		$data['total_order']= count($this->m_order->my_list_order_store($data['store_id']));
		$data['transfer']= count($this->m_transfer->transfer($data['store_id']));
		$data['accept_transfer']= count($this->m_accept_transfer->my_list_order_store($data['store_id']));
		$data['transaction_success']= count($this->m_transaction_success->my_list_order_store($data['store_id']));
		$data['qty']= $this->inputSetting($data);
			
		$this->load->view('header');
		$this->load->view('penjual/navbar', $data);
		$this->load->view('penjual/order/accept_transfer', $data);
		$this->load->view('control');
		$this->load->view('footer1');
		$this->load->view('footer2');
	}
	
	public function accept_order() {
	
		if($this->session->userdata('user_id')) {
				
			$data['user_id']= $this->input->post('user_id');
			$data['product_id'] = $this->input->post('product_id');
			$data['store_id'] = $this->input->post('store_id');
			$data['date'] = $this->input->post('date');
			$data['qty'] = $this->input->post('qty');
			$data['total'] = $this->input->post('price')*$this->input->post('qty');
			$data['qid'] = $this->input->post('qid');
			
			$this->m_accept_order->insert($data);
			
			$data2['status'] = '2';
			$data2['qid'] = $this->input->post('qid');
			
			$this->m_order->update($data2);
			redirect('order/accept_order_result');
			
        } else {
			redirect('login');
		}
		
    }
	
	public function transaction_success_store(){
		
		$data['get_store']= $this->get_store();
		$data['get_address']= $this->get_address_store();
		$data['user_store_name']= $this->user_store()['name'];
		$data['store_id']= $this->user_store()['store_id'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['get_image']= $this->get_person()["image"];
		$data['order']= $this->m_transaction_success->my_list_order_store($data['store_id']);
		$data['total_order']= count($this->m_order->my_list_order_store($data['store_id']));
		$data['transfer']= count($this->m_transfer->transfer($data['store_id']));
		$data['accept_transfer']= count($this->m_accept_transfer->my_list_order_store($data['store_id']));
		$data['transaction_success']= count($this->m_transaction_success->my_list_order_store($data['store_id']));
		//$data['qty']= $this->inputSetting($data);
		
		$this->load->view('header');
		$this->load->view('penjual/navbar', $data);
		$this->load->view('penjual/order/transaction_success', $data);
		$this->load->view('control');
		$this->load->view('footer1');
		$this->load->view('footer2');
	}

//PEMBELI

	// TAMPILKAN ORDER DETAIL
	public function order_detail(){
		
		$data['get_store']= $this->get_store();
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['get_image']= $this->get_person()["image"];
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['cart'] = $this->m_cart->my_list_cart($this->session->userdata('user_id'));
		$data['order']= $this->m_order->order_buyer($this->session->userdata('user_id'));
		
		$data['detail_order']= count($this->m_order->order_buyer($this->session->userdata('user_id')));
		$data['order_process']= count($this->m_order->order_process_buyer($this->session->userdata('user_id')));
		$data['transaction_success']= count($this->m_transaction_success->transaction_success($this->session->userdata('user_id')));
		$data['transaction_cancel']= count($this->m_transaction_cancel->transaction_cancel($this->session->userdata('user_id')));
		
		$data['qty']= $this->inputSetting($data);
		
		$this->load->view('header');
		$this->load->view('pembeli/navbar', $data);
		$this->load->view('pembeli/order/order_detail', $data);
		$this->load->view('control');
		$this->load->view('footer1');
		$this->load->view('footer2');
	}
	
	//UNGGAH BUKTI PEMBAYARAN
	public function transfer() {
	if($this->session->userdata('user_id')) {
				
			$filename = $this->input->post('user_id')."-".$this->input->post('qid');
			$config['upload_path'] = './upload/transfer/';
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
						'source_image' => './upload/transfer/'. $dat['file_name'],
						'maintain_ratio' => false,
						'create_thumb' => true,
						'quality' => '70%',
						'width' => 230,
						'height' => 230
					));
				if($this->image_lib->resize())
				{
					$data['user_id']= $this->input->post('user_id');
					$data['store_id'] = $this->input->post('store_id');
					$data['order_id'] = $this->input->post('order_id');
					$data['total'] = $this->input->post('total');
					$data['image1'] = $dat['file_name'];
					$data['image2'] = $dat['raw_name'].'_thumb'.$dat['file_ext'];
					$data['qid'] = $this->input->post('qid');
					$this->m_transfer->insert($data);
					
					$data2['status']= 2;
					$data2['order_id'] = $this->input->post('order_id');
			
					$this->m_order->update($data2);
			
					$this->session->set_flashdata('notif','Data Produk Disimpan !');
					redirect('order/order_process');
				}
					else
				{
					$data['error'] = $this->image_lib->display_errors();
				}
			}
			
        } else {
			redirect('login');
		}
		
		
    }
	
	// ORDERAN YANG DI PROSES
    public function order_process(){
		
		$data['get_store']= $this->get_store();
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['get_image']= $this->get_person()["image"];
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['cart'] = $this->m_cart->my_list_cart($this->session->userdata('user_id'));
		$data['order']= $this->m_order->order_process_buyer($this->session->userdata('user_id'));
		
		$data['detail_order']= count($this->m_order->order_buyer($this->session->userdata('user_id')));
		$data['order_process']= count($this->m_order->order_process_buyer($this->session->userdata('user_id')));
		$data['transaction_success']= count($this->m_transaction_success->transaction_success($this->session->userdata('user_id')));
		$data['transaction_cancel']= count($this->m_transaction_cancel->transaction_cancel($this->session->userdata('user_id')));
		
		$data['qty']= $this->inputSetting($data);
		
		$this->load->view('header');
		$this->load->view('pembeli/navbar', $data);
		$this->load->view('pembeli/order/process', $data);
		$this->load->view('control');
		$this->load->view('footer1');
		$this->load->view('footer2');
	}
	
	// KONFIRMASI BARANG YANG TIBA
	public function confirm() {
	if($this->session->userdata('user_id')) {
			
			$data['user_id']= $this->input->post('user_id');
			$data['store_id'] = $this->input->post('store_id');
			$data['order_id'] = $this->input->post('order_id');
			$data['total'] = $this->input->post('total');
			$data['qid'] = $this->input->post('qid');
			$data['image1'] = $this->input->post('image1');
			$data['image2'] = $this->input->post('image2');
			$this->m_transaction_success->insert($data);
					
			$data2['user_id']= $this->input->post('user_id');
			$data2['order_id'] = $this->input->post('order_id');
			
			$this->m_delivery->delete($data2['order_id'],$data2['user_id']);
			
			$data3['status'] = '3';
			$data3['order_id'] = $this->input->post('order_id');
			
			$this->m_order->update($data3);
			
			$this->session->set_flashdata('notif','Data Produk Disimpan !');
			redirect('order/transaction_success');
			
        } else {
			redirect('login');
		}
		
		
    }
	
	// TRANSAKSI SELESAI
	public function transaction_success() {
		$data['get_store']= $this->get_store();
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['get_image']= $this->get_person()["image"];
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['cart'] = $this->m_cart->my_list_cart($this->session->userdata('user_id'));
		$data['order']= $this->m_transaction_success->transaction_success($this->session->userdata('user_id'));
		
		$data['detail_order']= count($this->m_order->order_buyer($this->session->userdata('user_id')));
		$data['order_process']= count($this->m_order->order_process_buyer($this->session->userdata('user_id')));
		$data['transaction_success']= count($this->m_transaction_success->transaction_success($this->session->userdata('user_id')));
		$data['transaction_cancel']= count($this->m_transaction_cancel->transaction_cancel($this->session->userdata('user_id')));
		
		$data['qty']= $this->inputSetting($data);
		
		$this->load->view('header');
		$this->load->view('pembeli/navbar', $data);
		$this->load->view('pembeli/order/transaction_success', $data);
		$this->load->view('control');
		$this->load->view('footer1');
		$this->load->view('footer2');
		
		
    }
	
	// TRANSAKSI DIBATALKAN
	public function transaction_cancel() {
		$data['get_store']= $this->get_store();
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['get_image']= $this->get_person()["image"];
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['cart'] = $this->m_cart->my_list_cart($this->session->userdata('user_id'));
		$data['order']= $this->m_transaction_cancel->transaction_cancel($this->session->userdata('user_id'));
		
		$data['detail_order']= count($this->m_order->order_buyer($this->session->userdata('user_id')));
		$data['order_process']= count($this->m_order->order_process_buyer($this->session->userdata('user_id')));
		$data['transaction_success']= count($this->m_transaction_success->transaction_success($this->session->userdata('user_id')));
		$data['transaction_cancel']= count($this->m_transaction_cancel->transaction_cancel($this->session->userdata('user_id')));
		
		$data['qty']= $this->inputSetting($data);
		
		$this->load->view('header');
		$this->load->view('pembeli/navbar', $data);
		$this->load->view('pembeli/order/transaction_cancel', $data);
		$this->load->view('control');
		$this->load->view('footer1');
		$this->load->view('footer2');
		
		
    }
	
	
	
    
}
