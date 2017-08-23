<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
		$this->load->model("m_home");
        $this->load->model("m_product_store");
        $this->load->model("m_product_category");
        $this->load->model("m_category");
        $this->load->model("m_store");
        $this->load->model("m_wishlist");
        $this->load->model("m_cart");
        $this->load->model("m_order");	
        $this->load->model("m_transfer");
		$this->load->model('m_accept_transfer');	
		$this->load->model('m_transaction_success');
		$this->load->model('m_transaction_cancel');			
		$this->load->model('m_comment_product');	
		$this->load->model('m_comment_sub_product');	
		$this->load->model('m_counter');
		$this->load->model('m_profile');
		$this->load->library('upload');
		
		//cek login
		/*if(!$this->session->userdata('user_id')) {
            redirect();
        }*/
		
    }
	
	public function validationData(){
		
		$this->form_validation->set_rules('name','Nama Produk','alpha_numeric_spaces|max_length[30]|required');
		$this->form_validation->set_rules('desc','Deskripsi/Penjelasan Produk','required');
		$this->form_validation->set_rules('category[]', 'Kategori', 'required');
		$this->form_validation->set_rules('price', 'Harga Produk','greater_than[0]|numeric|required');
		$this->form_validation->set_rules('qty', 'Jumlah Produk','greater_than[0]|numeric|required');
		$this->form_validation->set_rules('satuan', 'Satuan Produk','required');
		$this->form_validation->set_rules('volume', 'Volume Produk','greater_than[0]|numeric|required');
		$this->form_validation->set_rules('min_order', 'Minimal Order','greater_than[0]|numeric|required');
		
		return $this->form_validation->run();
	}
	
	
	public function inputSetting($data){
		$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'kategori id',
				'value' => $this->session->userdata('user_id')
		);
		$this->data['store_id'] = array(
				'name'  => 'store_id',
				'id'    => 'store_id',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'Store Id',
				'value' => $this->user_store()['store_id']
		);
		$this->data['store_name'] = array(
				'name'  => 'store_name',
				'id'    => 'store_name',
				'type'  => 'hidden',
				'class' => 'form-control',
				'placeholder'=>'Nama Store',
				'value' => $this->user_store()['name']
		);
		$this->data['name'] = array(
				'name'  => 'name',
				'id'    => 'name',
				'type'  => 'text',
				'class' => 'form-control',
				'placeholder'=>'Nama Produk',
				'value' => $data['name']
		);
		$this->data['desc'] = array(
				'name'  => 'desc',
				'id'    => 'desc',
				'type'  => 'text',
				'rows'  => '6',
				'class' => 'form-control',
				'placeholder'=>'Deskripsikan Produk yang Anda Jual',
				'value' => $data['desc']
		);
		$this->data['category'] = array(
				'name'  => 'category',
				'id'    => 'category',
				'type'  => 'text',
				'class' => 'form-control',
				'placeholder'=>'Kategori Produk',
				'value' => $data['category_id']
		);
		$this->data['price'] = array(
				'name'  => 'price',
				'id'    => 'price',
				'type'  => 'text',
				'class' => 'form-control',
				'style'=>'text-align: left;', 
				'onkeyup'=>"formatRupiah(this, '.')",
				'placeholder'=>'Harga Produk',
				'value' => number_format($data['price'], 0, ',', '.')
		);
		$this->data['qty'] = array(
				'name'  => 'qty',
				'id'    => 'qty',
				'type'  => 'text',
				'class' => 'form-control',
				'style'=>'text-align: left;', 
				'onkeyup'=>"formatRupiah(this, '.')",
				'placeholder'=>'Jumlah Produk',
				'value' => number_format($data['qty'], 0, ',', '.')
		);
		$this->data['min_order'] = array(
				'name'  => 'min_order',
				'id'    => 'min_order',
				'type'  => 'text',
				'class' => 'form-control',
				'style'=>'text-align: left;', 
				'onkeyup'=>"formatRupiah(this, '.')",
				'placeholder'=>'Jumlah Produk',
				'value' => number_format($data['min_order'], 0, ',', '.')
		);
		$this->data['satuan'] = array(
				'name'  => 'satuan',
				'id'    => 'satuan',
				'type'  => 'text',
				'class' => 'form-control',
				'placeholder'=>'Satuan',
				'value' => $data['satuan']
		);
		$this->data['volume'] = array(
				'name'  => 'volume',
				'id'    => 'volume',
				'type'  => 'text',
				'class' => 'form-control',
				'style'=>'text-align: left;', 
				'onkeyup'=>"formatRupiah(this, '.')",
				'placeholder'=>'Volume',
				'value' => number_format($data['volume'], 0, ',', '.')
		);
		$this->data['userfile'] = array(
				'name'  => 'userfile',
				'id'    => 'exampleInputFile',
				'type'  => 'file',
				'value' => $data['image1']
		);
		$this->data['image1'] = $data['image1'];
		$this->data['product_id'] = $data['product_id'];
		$this->data['category_name'] = $this->m_category->get_category();
		$this->data['get_name'] = $data['name'];
		
		if($data['product_id']){
				$this->data['get_category'] = $this->m_category->get_category_name($data['product_id']);
				foreach ($this->data['get_category'] as $v){
					$this->data['get_category_name'][] = $v->category_id;
				}
		} else {
				$this->data['get_category_name']='';
		}
		
		$this->data['get_desc'] = $data['desc'];
		$this->data['get_qty'] = $data['qty'];
		$this->data['get_price'] = $data['price'];
		$this->data['get_volume'] = $data['volume'];
		$this->data['get_satuan'] = $data['satuan'];
		$this->data['get_min_order'] = $data['min_order'];
		$this->data['get_store_id'] = $data['store_id'];
		$this->data['get_store_name'] = $data['store_name'];
		$this->data['get_store_image'] = $data['store_image'];
		$this->data['get_category_id'] = $data['category_id'];;
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
	
	
	public function getProductIdLast(){
    	$n="";
    	$last = $this->m_product_store->last();
    	foreach($last as $v){
    		$n = $v->product_id;
    		$n = $n+1;
    	}
    	
    	if(strlen($n)==0){
    		$n="00001";
    	}if(strlen($n)==1){
    		$n="0000".$n;
    	}else if (strlen($n)==2){
    		$n="000".$n;
    	}else if (strlen($n)==3){
    		$n="00".$n;
    	}else if (strlen($n)==4){
    		$n="0".$n;
    	}else if (strlen($n)==5){
    		$n;
    	}
    	
    	return $n;
    }
	
	
	public function index()
	{
		if($this->session->userdata('user_id')==1){
			$this->load->view('user/header');
		
			$total_data = $this->m_product_store->get_all_count($this->session->userdata('user_id'));
			$content_per_page = 4; 
			$data['total_data'] = ceil($total_data->tol_records/$content_per_page);
			$data['search'] = $this->input->get('search');
					
			$data['get_store']= $this->get_store();
			$data['get_address']= $this->get_address_store();
			$data['user_store_name']= $this->user_store()['name'];
			$data['user_profile_name']= $this->user_profile()['name'];
			$data['get_image']= $this->get_person()["image"];
			$data['total_order']= count($this->m_order->my_list_order_store($this->user_store()['store_id']));
			$data['accept_order']= count($this->m_accept_order->my_list_order_store($this->user_store()['store_id']));
			$data['accept_transfer']= count($this->m_accept_transfer->my_list_order_store($this->user_store()['store_id']));
			$data['transaction_success']= count($this->m_transaction_success->my_list_order_store($this->user_store()['store_id']));
			$this->load->view('penjual/navbar', $data);
			
			$this->load->view('penjual/product/product', $data);
			$this->load->view('footer1');
			$this->load->view('footer2');
			
		} else if($this->session->userdata('user_id')==2){
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
			
			//result cart in buyer account
			$data['cart'] = $this->m_cart->my_list_cart($this->session->userdata('user_id'));
			$data['detail_order']= count($this->m_order->order_buyer($this->session->userdata('user_id')));
			$data['order_process']= count($this->m_order->order_process_buyer($this->session->userdata('user_id')));
			$data['transaction_success']= count($this->m_transaction_success->transaction_success($this->session->userdata('user_id')));
			$data['transaction_cancel']= count($this->m_transaction_cancel->transaction_cancel($this->session->userdata('user_id')));
		
			$user_id = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
			$store_id = $this->encrypt->decode(base64_decode($this->input->get('store_id')), $this->session->userdata('encrypt_key'));
			$total_data = $this->m_product_store->get_all_count($user_id);
			$content_per_page = 4; 
			$data['total_data'] = ceil($total_data->tol_records/$content_per_page);
			$data['entry'] =  $this->m_store->get($store_id);
			$data['entry'] = $data['entry'][0];
			$data['entry2'] =  $this->m_profile->fetchById($user_id);
			if($data['entry2']){
				$data['entry2'] = $data['entry2'][0];
			} else {
				$data['entry2'] = array("name"=>null,"job"=>null);
			}
				
			$this->load->view('pembeli/navbar', $data);
			
			$this->load->view('product_store', $data);
			$this->load->view('footer1');
			$this->load->view('footer2');
		}else{
			$this->load->view('header');
		
			$user_id = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
			$store_id = $this->encrypt->decode(base64_decode($this->input->get('store_id')), $this->session->userdata('encrypt_key'));
			$total_data = $this->m_product_store->get_all_count($user_id);
			$content_per_page = 4; 
			$data['total_data'] = ceil($total_data->tol_records/$content_per_page);
			$data['entry'] =  $this->m_store->get($store_id);
			$data['entry'] = $data['entry'][0];
			$data['entry2'] =  $this->m_profile->fetchById($user_id);
			if($data['entry2']){
				$data['entry2'] = $data['entry2'][0];
			} else {
				$data['entry2'] = array("name"=>null,"job"=>null);
			}
				
			$this->load->view('navbar', $data);
			
			$this->load->view('product_store', $data);
			$this->load->view('footer1');
			$this->load->view('footer2');
		}
		
	}
	
	public function search()
	{
		$this->load->view('user/header');
		
		$total_data = $this->m_product_store->get_all_count_search($this->session->userdata('user_id'), $this->input->get('search'));
		$content_per_page = 8; 
		$data['total_data'] = ceil($total_data->tol_records/$content_per_page);
		$data['search'] = $this->input->get('search');
				
		$data['get_store']= $this->get_store();
		$data['get_address']= $this->get_address_store();
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['get_image']= $this->get_person()["image"];
		//$data['product']=$this->m_product_store->my_list_product($this->session->userdata('user_id'));
		$this->load->view('user/navbar', $data);
		
		$this->load->view('user/sidebar');
		$this->load->view('user/product/product_result', $data);
		$this->load->view('control');
		$this->load->view('footer1');
		$this->load->view('footer2');
	}
	
	
	//Call Form Add Product
	public function add_product()
	{
		if($this->session->userdata('user_id')){
			$this->load->view('header');
			$data['get_store']= $this->get_store();
			$data['get_address']= $this->get_address_store();
			$data['user_store_name']= $this->user_store()['name'];
			$data['user_profile_name']= $this->user_profile()['name'];
			$data['get_image']= $this->get_person()["image"];
			$data['user_id']=$this->session->userdata('user_id');
			$data['store_id']=$this->user_store();
			$this->load->view('penjual/navbar', $data);
			
			$data = array(
					'name'=>null,
					'desc'=>null,
					'category'=>null,
					'category_id'=>null,
					'get_category_name'=>null,
					'price'=>null,
					'min_order'=>null,
					'qty'=>null,
					'volume'=>null,
					'satuan'=>null,
					'get_satuan'=>null,
					'image1'=>null,
					'product_id'=>null,
					'premium'=>null,
					'store_id'=>null,
					'store_name'=>null,
					'store_image'=>null,
			);
			
			$this->load->view('penjual/product/form',$this->inputSetting($data));
			$this->load->view('user/control');
			$this->load->view('user/footer');
		}else{
			$this->load->view('login');
		}
	}
	
	//Function Input
	public function insert_product(){
		
		$product = "PRD-".$this->input->post('store_id')."".date('YmdHis')."".date("his");
		if($this->validationData()==TRUE){
			
			$filename = $product;
			$config['upload_path'] = './upload/product/';
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
						'source_image' => './upload/product/'. $dat['file_name'],
						'maintain_ratio' => false,
						'create_thumb' => true,
						'quality' => '70%',
						'width' => 230,
						'height' => 230
					));
				if($this->image_lib->resize())
				{
					$data['user_id'] = $this->input->post('user_id');
					$data['store_id'] = $this->input->post('store_id');
					$data['product_id'] = $product;
					$data['name'] = $this->input->post('name');
					$data['desc'] = $this->input->post('desc');
					$data['price'] = str_replace(".", "", $this->input->post('price'));
					$data['min_order'] = str_replace(".", "", $this->input->post('min_order'));
					$data['qty'] = str_replace(".", "", $this->input->post('qty'));
					$data['satuan'] = $this->input->post('satuan');
					$data['volume'] = str_replace(".", "", $this->input->post('volume'));
					$data['image1'] = $dat['file_name'];
					$data['image2'] = $dat['raw_name'].'_thumb'.$dat['file_ext'];
					$this->m_product_store->insert($data);
					
					$jumlah = count($this->input->post('category'));
					
					for($i=0;$i<$jumlah;$i++) {
						$data2['product_id'] =  $product;
						$data2['category_id'] = $this->input->post('category')[$i];
						$this->m_product_category->insert($data2);
					}
					
					$this->session->set_flashdata('notif','Data Produk Disimpan !');
					redirect();
				}
					else
				{
					$data['error'] = $this->image_lib->display_errors();
				}
			}
		
		} else {
			$this->session->set_flashdata('message', validation_errors());
			redirect('product/add_product');
		}
	}
	
	
	//Call Form Update Product
	public function update_product()
	{
		$produk_id = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
		
		if($this->session->userdata('user_id')){
			
			$data['entry'] =  $this->m_product_store->get($produk_id);
			if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
				redirect();
			} else {
				$data['entry'] = $data['entry'][0];
				$this->load->view('header');
				$data['get_store']= $this->get_store();
				$data['get_address']= $this->get_address_store();
				$data['user_store_name']= $this->user_store()['name'];
				$data['user_profile_name']= $this->user_profile()['name'];
				$data['get_image']= $this->get_person()["image"];
				$data['user_id']=$this->session->userdata('user_id');
				$data['store_id']=$this->user_store();
				$this->load->view('penjual/navbar', $data);
				$this->load->view('penjual/product/form',$this->inputSetting($data['entry']));
				$this->load->view('control');
				$this->load->view('footer1');
				$this->load->view('footer2');
			}
			
		}else{
			$this->load->view('login');
		}
	}
	
	
	//Function Edit Product
	public function edit_product(){
		
		$produk_id = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
		
		if($this->validationData()==TRUE){	
			if($_FILES['userfile']['name']==""){
				$data['user_id'] = $this->input->post('user_id');
				$data['store_id'] = $this->input->post('store_id');
				$data['product_id'] = $produk_id;
				$data['name'] = $this->input->post('name');
				$data['desc'] = $this->input->post('desc');
				$data['price'] = str_replace(".", "", $this->input->post('price'));
				$data['min_order'] = str_replace(".", "", $this->input->post('min_order'));
				$data['qty'] = str_replace(".", "", $this->input->post('qty'));
				$data['satuan'] = $this->input->post('satuan');
				$data['volume'] = str_replace(".", "", $this->input->post('volume'));
				$this->m_product_store->update($data);
				$this->m_product_category->delete($produk_id);
				
				$jumlah = count($this->input->post('category'));
					
					for($i=0;$i<$jumlah;$i++) {
						$data2['product_id'] =  $produk_id;
						$data2['category_id'] = $this->input->post('category')[$i];
						$this->m_product_category->insert($data2);
					}
					
				$this->session->set_flashdata('notif','Data Produk Disimpan !');
				redirect('product/update_product?id='.$this->input->get('id'));
			}else{
				$filename = $produk_id;
				$config['upload_path'] = './upload/product/';
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
						'source_image' => './upload/product/'. $dat['file_name'],
						'maintain_ratio' => false,
						'create_thumb' => true,
						'quality' => '70%',
						'width' => 230,
						'height' => 230
					));
					if($this->image_lib->resize())
					{
						$data['user_id'] = $this->input->post('user_id');
						$data['store_id'] = $this->input->post('store_id');
						$data['product_id'] = $produk_id;
						$data['name'] = $this->input->post('name');
						$data['desc'] = $this->input->post('desc');
						$data['price'] = str_replace(".", "", $this->input->post('price'));
						$data['min_order'] = str_replace(".", "", $this->input->post('min_order'));
						$data['qty'] = str_replace(".", "", $this->input->post('qty'));
						$data['satuan'] = $this->input->post('satuan');
						$data['volume'] = str_replace(".", "", $this->input->post('volume'));
						$data['image1'] = $dat['file_name'];
						$data['image2'] = $dat['raw_name'].'_thumb'.$dat['file_ext'];
						$this->m_product_store->update($data);
						$this->m_product_category->delete($produk_id);
				
						$jumlah = count($this->input->post('category'));
							
							for($i=0;$i<$jumlah;$i++) {
								$data2['product_id'] =  $produk_id;
								$data2['category_id'] = $this->input->post('category')[$i];
								$this->m_product_category->insert($data2);
							}
					
						$this->session->set_flashdata('notif','Data Produk Disimpan !');
						redirect('product/update_product?id='.$this->input->get('id'));
					}
					else
					{
						$data['error'] = $this->image_lib->display_errors();
					}
				}
			}
		} else {
			$this->session->set_flashdata('message', validation_errors());
			redirect('product/update_product?id='.$this->input->get('id'));
		}
		
	}
	
	//Call Form Update Product
	public function detail_product(){
		
		$produk_id = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
		
		if($this->session->userdata('user_type')==1){
			
			$data['entry'] =  $this->m_product_store->get($produk_id);
			if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
				redirect();
			} else {
				$data['entry'] = $data['entry'][0];
				$this->load->view('header');
				$data['get_store']= $this->get_store();
				$data['get_address']= $this->get_address_store();
				$data['user_store_name']= $this->user_store()['name'];
				$data['user_profile_name']= $this->user_profile()['name'];
				$data['get_image']= $this->get_person()["image"];
				$data['user_id']=$this->session->userdata('user_id');
				$data['store_id'] = $this->user_store()['store_id'];
				$data['count_comment']=$this->m_comment_product->record_count($produk_id);
				$data['transfer']= count($this->m_transfer->transfer($data['store_id']));
				$data['accept_transfer']= count($this->m_accept_transfer->my_list_order_store($data['store_id']));
				$data['transaction_success']= count($this->m_transaction_success->my_list_order_store($data['store_id']));
				$this->load->view('penjual/navbar', $data);
				$this->load->view('penjual/product/detail',$this->inputSetting($data['entry']));
				$this->load->view('footer1');
			}
			
		} else if($this->session->userdata('user_type')==2){
			
			$data['entry'] =  $this->m_product_store->get($produk_id);
			if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
				redirect();
			} else {
				$data['entry'] = $data['entry'][0];
				$this->load->view('header');
				$data['get_store']= $this->get_store();
				$data['get_address_store']= $this->get_address_store();
				$data['get_address_buyer']= $this->get_address_buyer();
				$data['user_store_name']= $this->user_store()['name'];
				$data['user_profile_name']= $this->user_profile()['name'];
				$data['get_image']= $this->get_person()["image"];
				$data['user_id']=$this->session->userdata('user_id');
				$data['store_id']=$this->user_store();
				$data['cart'] = $this->m_cart->my_list_cart($this->session->userdata('user_id'));
				$data['detail_order']= count($this->m_order->order_buyer($this->session->userdata('user_id')));
				$data['order_process']= count($this->m_order->order_process_buyer($this->session->userdata('user_id')));
				$data['transaction_success']= count($this->m_transaction_success->transaction_success($this->session->userdata('user_id')));
				$data['transaction_cancel']= count($this->m_transaction_cancel->transaction_cancel($this->session->userdata('user_id')));
				$data['count_comment']=$this->m_comment_product->record_count($produk_id);
				$this->load->view('pembeli/navbar', $data);
				$this->load->view('detail_product',$this->inputSetting($data['entry']));
				$this->load->view('footer1');
			}
			
		}else{
			$data['entry'] =  $this->m_product_store->get($produk_id);
			if(!isset($data['entry'][0]) || $data['entry'][0] == ""){
				redirect();
			} else {
				$data['entry'] = $data['entry'][0];
				$this->load->view('header');
				$data['get_store']= $this->get_store();
				$data['get_address']= $this->get_address_store();
				$data['user_store_name']= $this->user_store()['name'];
				$data['user_profile_name']= $this->user_profile()['name'];
				$data['get_image']= $this->get_person()["image"];
				$data['user_id']=$this->session->userdata('user_id');
				$data['store_id']=$this->user_store();
				$data['count_comment']=$this->m_comment_product->record_count($produk_id);
				$this->load->view('navbar', $data);
				$this->load->view('detail_product',$this->inputSetting($data['entry']));
				$this->load->view('footer1');
			}
		}
	}
	
	public function delete_product() {
		
		$produk_id = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
		
        if($produk_id!="") {
			
			$image = $this->m_product_store->link_gambar($produk_id);
			if ($image->num_rows() > 0)
			{
				$row = $image->row();			
				$file_gambar = $row->image1;
				$file_gambar2 = $row->image2;
				$path_file = './upload/product/';
				unlink($path_file.$file_gambar);
				unlink($path_file.$file_gambar2);
			}
			
            $this->m_product_store->delete($produk_id);
            $this->m_product_category->delete($produk_id);
		}
        //redirect to page
        redirect();

    }
	
	public function load_more()
    {
        if($this->session->userdata('user_type')==1){
			if(isset($_POST["page"])){
			$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
			if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
				}else{
					$page_number = 1; //if there's no page number, set it to 1
				}
			
			$data['count']= $this->m_product_store->get_all_content_store($this->user_store()['store_id']);
			$get_total_rows = count($data['count']); //hold total records in variable
			$item_per_page = 10;
			//break records into pages
			$total_pages = ceil($get_total_rows/$item_per_page);
			
			//get starting position to fetch the records
			$page_position = (($page_number-1) * $item_per_page);
			
			$data['result']= $this->m_product_store->get_all_content_store_result($page_position, $item_per_page, $this->user_store()['store_id']);
			
			//Display records fetched from database.
			$no=1;
			foreach($data['result'] as $content){
				$product_id = base64_encode($this->encrypt->encode($content->product_id, $this->session->userdata('encrypt_key')));
						 echo '
							<div class="col-lg-13">
							   <!-- small box -->';
							   if($content->qty<=0){
										echo	'<div class="sale-box">
												<span class="on_sale ">Stok Habis</span></div>';
									 } else {
										echo	'<div class="sale-box1">
												<span class="on_sale ">Ready</span></div>';
									 } 
			echo' 			<div class="small-box bg-white img-bordered-sm2">
								<div class="inner">
								 <center>
								<img src="'.base_url().'/upload/product/'.$content->image1.'" width="220" height="150" style="width: 100%;max-height: 100%" align="center"></center>
									<h4>
										<div class="col-sm-12">
											<div style="float: left; text-align: left;  font-size: 14px;"><b>'.$content->name.'</b></div>
										</div><br>
										<div class="col-sm-12">
											<div style="float: left; text-align: left;  color: #ff5722; font-size: 14px;" >Rp. '.number_format($content->price,0,'.','.').'</div>
										</div><br>
									<p></p>
									</h4>
								</div>	  
								<div class="box-footer">
									<div class="col-sm-3">
											<div style="float: left; text-align: left;  font-size: 12px;">Berat</div>
										</div>
										<div class="col-sm-9">
											<div style="float: left; text-align: left;  font-size: 12px;">: '.$content->volume.' '.$content->satuan.'</div>
										</div>
										<div class="col-sm-12"></div>
										<div class="col-sm-3">
											<div style="float: left; text-align: left;  font-size: 12px;">Stok</div>
										</div>
										<div class="col-sm-9">
											<div style="float: left; text-align: left;  font-size: 12px;"> : '.$content->qty.'</div>
										</div>
								</div>  
								<div class="box-footer">
									<a href="'.site_url('product/update_product?id='.$product_id).'" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-edit"></i></a>
										<a href="'.site_url('product/detail_product?id='.$product_id).'" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-search-plus"></i></a>
									<div style="float: right; ">
										<a href="'.site_url('product/delete_product?id='.$product_id).'" class="btn btn-warning btn-flat btn-sm" onClick=\'return confirm("Apakah anda ingin menghapus produk ini?")\'><i class="fa fa-trash"></i></a>
								   </div>
								</div>
							  </div>
							</div>
						 ';                              
				} 
					
				$no++;
				echo '<br>';
				echo '<div class="row">';
				echo '<div class="col-lg-12">';
				echo '<div align="center">';
				echo $this->paging->paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
				echo '</div>';
				echo '</div>';
				echo '</div>';
		}else{
			
			if(isset($_POST["page"])){
				$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
			if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
				}else{
					$page_number = 1; //if there's no page number, set it to 1
				}
			
			$store_id = $this->encrypt->decode(base64_decode($this->input->post('store_id')), $this->session->userdata('encrypt_key'));
			
			$data['count']= $this->m_product_store->get_all_content_store($store_id);
			$get_total_rows = count($data['count']); //hold total records in variable
			$item_per_page = 10;
			//break records into pages
			$total_pages = ceil($get_total_rows/$item_per_page);
			
			//get starting position to fetch the records
			$page_position = (($page_number-1) * $item_per_page);
			
			$data['result']= $this->m_product_store->get_all_content_store_result($page_position, $item_per_page, $store_id);
			
			//Display records fetched from database.
			$no=1;
			foreach($data['result'] as $content){
			$product_id = base64_encode($this->encrypt->encode($content->product_id, $this->session->userdata('encrypt_key')));
					echo '
						<div class="col-lg-13">
						  <!-- small box -->';
						   if($content->qty<=0){
									echo	'<div class="sale-box">
											<span class="on_sale ">Stok Habis</span></div>';
								 } else {
									echo	'<div class="sale-box1">
											<span class="on_sale ">Ready</span></div>';
								 } 
		echo' 			<div class="small-box bg-white img-bordered-sm2">
							<div class="inner">
							 <center>
							<img src="'.base_url().'/upload/product/'.$content->image1.'" width="220" height="150" style="width: 100%;max-height: 100%" align="center"></center>
								<h4>
									<div class="col-sm-12">
										<div style="float: left; text-align: left;  font-size: 14px;"><b>'.$content->name.'</b></div>
									</div><br>
									<div class="col-sm-12">
										<div style="float: left; text-align: left;  color: #ff5722; font-size: 14px;" >Rp. '.number_format($content->price,0,'.','.').'</div>
									</div><br>
								<p></p>
								</h4>
							</div>	  
							<div class="box-footer">
								<div class="col-sm-3">
										<div style="float: left; text-align: left;  font-size: 12px;">Berat</div>
									</div>
									<div class="col-sm-9">
										<div style="float: left; text-align: left;  font-size: 12px;">: '.$content->volume.' '.$content->satuan.'</div>
									</div>
									<div class="col-sm-12"></div>
									<div class="col-sm-3">
										<div style="float: left; text-align: left;  font-size: 12px;">Stok</div>
									</div>
									<div class="col-sm-9">
										<div style="float: left; text-align: left;  font-size: 12px;"> : '.$content->qty.'</div>
									</div>
							</div>  
							<div class="box-footer">
												';
												
								if($content->qty<=0){
									echo	'<a class="btn btn-warning btn-flat btn-sm"><i class="fa fa-shopping-cart"></i></a>';
								 } else {
									echo	'<a href="'.site_url('cart/create_cart?id='.$product_id).'" class="btn btn-warning btn-flat btn-sm" onClick=\'return confirm("Apakah anda ingin membeli produk ini ?")\'><i class="fa fa-shopping-cart"></i></a>';
								 } 
								 
		echo'					<a href="'.site_url('product/detail_product?id='.$product_id).'" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-search-plus"></i></a>';
									if(count($data)==true){
										echo	'<div style="float: right; ">
													<!--a href="'.site_url('').'" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-eye"></i></a-->
													<a href="'.site_url('wishlist/delete_whislist?id='.$product_id).'" class="btn btn-warning btn-flat btn-sm" 		onClick=\'return confirm("Apakah anda ingin menghapus produk ini sebagai produk favorit?")\'><i class="fa fa-heart"></i></a>
												</div>';
									} else {
										echo	'<div style="float: right; ">
													
													<a href="'.site_url('wishlist/insert_whislist?id='.$product_id).'" class="btn btn-warning btn-flat btn-sm" 		onClick=\'return confirm("Apakah anda ingin menjadikan produk ini sebagai produk favorit?")\'><i class="fa fa-heart-o"></i></a>
												</div>';
									}
					echo '	</div>	
						   </div>   
						  </div>
						</div>
					 ';                        
			}
				$no++;
				echo '<br>';
				echo '<div class="row">';
				echo '<div class="col-lg-12">';
				echo '<div align="center">';
				echo $this->paging->paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
				echo '</div>';
				echo '</div>';
				echo '</div>';			
		}
    }
	
	public function load_more_search()
    {
        if($this->session->userdata('user_id')){
			$group_no = $this->input->post('group_no');
			$search = $this->input->post('search');
			$content_per_page = 4;
			$start = ceil($group_no * $content_per_page);
			$all_content = $this->m_product_store->get_all_content_search($start,$content_per_page,$this->session->userdata('user_id'), $search);
			if(isset($all_content) && is_array($all_content) && count($all_content)) { 
				foreach ($all_content as $key => $content) :
				$product_id = base64_encode($this->encrypt->encode($content->product_id, $this->session->userdata('encrypt_key')));
					 echo '
						<div class="col-lg-3">
						  <!-- small box -->
						  <div class="small-box bg-white img-bordered-sm2">
							<div class="inner">
							<center><img src="'.base_url().'/upload/product/'.$content->image1.'" width="220" height="230" style="width: 100%;max-height: 100%" align="center"></center>
							 <div id="container" style="background-image:url('.base_url().'/upload/product/'.$content->image1.')">
</div>
								<h4>
									<div style="float: left; text-align: left;  font-size: 18px;">'.$content->name.'</div>
									<div style="float: right; text-align: right;  color: #ff5722; font-size: 18px;" >Rp. '.number_format($content->price,0,'.','.').'</div>
								<p></p>
								</h4>
								<br><br>
								
									<a href="'.site_url('product/update_product?id='.$product_id).'" class="btn btn-default btn-flat">Edit</a>
									<a href="'.site_url('product/detail_product?id='.$product_id).'" class="btn btn-default btn-flat">View</a>
								<div style="float: right; ">
									<a href="'.site_url('product/delete_product?id='.$product_id).'" class="btn btn-default btn-flat" onClick=\'return confirm("Apakah anda ingin menghapus produk ini?")\'><i class="fa fa-trash"></i></a>
							   </div>
							  </div> 
						  </div>
						</div>
					 ';  
				endforeach;                                
			} 
		}else{
			$this->load->view('login');
		}
    }
	
	public function load_more_comment(){
		
		$page_number = $this->input->post("page");
		$id_product = $this->input->post("id_product");
		$id_product2 = $this->input->post("id_product2");
		$item_per_page = 2;

		//get current starting point of records
		 $position = (($page_number-1) * $item_per_page);

		//fetch records using page position and item per page. 
		$results = $this->m_comment_product->get($position, $item_per_page, $id_product);

		foreach($results as $results){
			echo '
									<div class="panel panel-primary post panel-shadow">
										<div class="post-heading">
											<div class="pull-left image">';
											
		if ($results->image){
							echo '<img src="'.base_url().'upload/person/'.$results->image.'" class="img-circle avatar" alt="user profile image">';
		} else {						
							echo '<img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">';
		}
												
		echo '</div>
											<div class="pull-left meta">
												<div class="title h5">
													<a href="#"><b>'.$results->buyer_name.'</b></a>
													<span class="label label-success">Pembeli</span>
												</div>
												<h6 class="text-muted time">1 minute ago</h6>
											</div>
										</div> 
										<div class="post-description"> 
											<p>'.$results->message.'</p>
											<div class="stats">
												<!--a href="#" class="btn btn-default stat-item">
													<i class="fa fa-thumbs-up icon"></i>2
												</a-->
												<a href="#" class="btn btn-default stat-item">
													<i class="fa fa-share icon"></i>'.
													$count_comment_sub = $this->m_comment_sub_product->record_count($results->qid)
													.'
												</a>
											</div>
										</div>
										<div class="post-footer">
											<form action="'.base_url().'comment_sub/insert" method="post">
											<div class="input-group"> 
												<input type="hidden" name="page" value="'.$this->uri->segment(1).'">
												<input type="hidden" name="product_id" value="'.$id_product2.'">
												<input type="hidden" name="comment_id" value="'.$results->qid.'">
												<input class="form-control" name="message" placeholder="Add a comment" type="text">
												<span class="input-group-addon">
													<!--a href="#"><i class="fa fa-edit"></i></a-->  
													<button type="submit"><i class="fa fa-edit"></i></button>
												</span>
											</div>
											</form>';
											
			$sub_comment = $this->m_comment_sub_product->comment_sub_store($results->qid);
			$no_store = 0;
			$no_buyer = 0;
			foreach ($sub_comment as $sub_comment) {
												
						if($sub_comment->store_id) {
										$store = $this->m_comment_sub_product->comment_sub_get_store($results->qid);
										$store = $store[$no_store++];	
											
echo'											<ul class="comments-list">
												<li class="comment">
													<a class="pull-left" href="#">';
													if ($store['image']){
													echo '<img src="'.base_url().'upload/store/'.$store['image'].'" class="img-circle avatar" alt="user profile image">';
													} else {						
													echo '<img src="'.base_url().'upload/store/no_image.png" class="img-circle avatar" alt="user profile image">';
													}

echo'													</a>
													<div class="comment-body">
														<div class="comment-heading">
															<h4 class="user">'.$store['store_name'].'</h4>
															<span class="label label-warning">Penjual</span>
															<h5 class="time">5 minutes ago</h5>
														</div>
														<p>'.$store['message'].'</p>
													</div>
												</li>
											</ul>';
						
											
							} else { 
											$buyer = $this->m_comment_sub_product->comment_sub_get_buyer($results->qid);
											$buyer = $buyer[$no_buyer++];
echo'											<ul class="comments-list">
												<li class="comment">
													<a class="pull-left" href="#">';
													if ($buyer['image']){
													echo '<img src="'.base_url().'upload/person/'.$buyer['image'].'" class="img-circle avatar" alt="user profile image">';
													} else {						
													echo '<img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">';
													}
													
echo'													</a>
													<div class="comment-body">
														<div class="comment-heading">
															<h4 class="user">'.$buyer['buyer_name'].'</h4>
															<span class="label label-success">Pembeli</span>
															<h5 class="time">5 minutes ago</h5>
														</div>
														<p>'.$buyer['message'].'</p>
													</div>
												</li>
											</ul>';
								
						
							} 					
				}
echo'										</div>
									</div>							
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>
							<div class="col-sm-12"></div>';	
		}
	}
	

    
}
