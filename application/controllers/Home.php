<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model("m_home");
        $this->load->model("m_village");
		$this->load->model("m_product_store");
		$this->load->model("m_product_buyer");
		$this->load->model("m_cart");
		$this->load->model('m_wishlist');	
		$this->load->model('m_store');	
		$this->load->model('m_order');	
		$this->load->model('m_transfer');	
		$this->load->model('m_accept_transfer');	
		$this->load->model('m_transaction_success');	
		$this->load->model('m_transaction_cancel');
		$this->load->model('m_profile');	
		$this->load->helper(array('Form', 'Cookie', 'String'));
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
					'email'=>null
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
	
	public function index()
	{
		$data['get_store']= $this->get_store();
		$data['get_address_store']= $this->get_address_store();
		$data['get_address_buyer']= $this->get_address_buyer();
		$data['user_store_name']= $this->user_store()['name'];
		$data['user_profile_name']= $this->user_profile()['name'];
		$data['store_id'] = $this->user_store()['store_id'];
		$data['get_image']= $this->get_person()["image"];
		$data['buyer_name'] = $this->buyer()['name'];
		$data['buyer_email'] = $this->buyer()['email'];
		$this->load->view('header');
		
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
			$data['accept_transfer']= count($this->m_accept_transfer->my_list_order_store($data['store_id']));
			$data['transaction_success']= count($this->m_transaction_success->my_list_order_store($data['store_id']));
			$data['village']= $this->m_village->get_village();
			$this->load->view('penjual/navbar', $data);
			$this->load->view('penjual/content', $data);
			$this->load->view('control');
			$this->load->view('footer1');
			$this->load->view('footer2');
			
		}else if($this->session->userdata("user_type")==2){
			
			//result all product in buyer account
			$total_data = $this->m_product_buyer->get_all_count_buyer();
			$content_per_page = 4; 
			$data['total_data'] = ceil($total_data->tol_records/$content_per_page);
			$data['search'] = $this->input->get('search');
			
			//result cart in buyer account
			$data['cart'] = $this->m_cart->my_list_cart($this->session->userdata('user_id'));
			$data['detail_order']= count($this->m_order->order_buyer($this->session->userdata('user_id')));
			$data['order_process']= count($this->m_order->order_process_buyer($this->session->userdata('user_id')));
			$data['transaction_success']= count($this->m_transaction_success->transaction_success($this->session->userdata('user_id')));
			$data['transaction_cancel']= count($this->m_transaction_cancel->transaction_cancel($this->session->userdata('user_id')));
			$this->load->view('pembeli/navbar', $data);
			$this->load->view('pembeli/content', $data);
			$this->load->view('control');
			$this->load->view('footer1');
			$this->load->view('footer2');
		
		} else {
			$html = $this->harga_pasar->file_get_html('https://ews.kemendag.go.id/');
 

				$data['gambar']  = $html->find('.sp2kpindexhargaimg img');
				$data['nama_barang'] = $html->find('.titleharga');
				$data['harga_sekarang'] = $html->find('.hargaskg');
				$data['harga_kemarin'] = $html->find('.sp2kpindexhargacontentkemarin');
				 
				//Begin Filter Kebutuhan Nama Barang
				$data['x']=0;$a=0;
				$data['ambilNamaBarang']=array();
				foreach ($data['nama_barang'] as $key => $value) {
					$y=1;
					$data['ambilNamaBarang'][$a]=$value->plaintext;
					$a++;
					$data['x']=$data['x']+$y;
				}
				//End Filter Nama Barang
				//Begin Filter Harga Sekarang

				$data['ambilHargaSekarang']=array();$b=0;
				foreach ($data['harga_sekarang']  as $key => $value) {
					
					$data['ambilHargaSekarang'][$b]=$value->plaintext;
					$b++;
					
				}
				
				//End Filter Harga Sekarang Harga Kemarin : Rp. 11.000/Kg

				//Begin Filter Harga Kemarin

				$data['ambilHargaKemarin']=array();$c=0;
				$data['pecahHargaKemarin']=array();
				foreach ($data['harga_kemarin'] as $key => $value) {
					$data['pecahHargaKemarin'][$c]=explode("Harga Kemarin : ",$value->plaintext);
					$data['ambilHargaKemarin'][$c]=$data['pecahHargaKemarin'][$c][1];
					$c++;
					
				}
				//End Filter Harga Kemarin
				
				$data['ambilGambar']=array();$d=0;
				foreach ($data['gambar']  as $key => $value) {
					
					$data['ambilGambar'][$d]=$value->src;
					$d++;
					
				}
				
			
			$this->load->view('navbar', $data);
			$this->load->view('content');
			$this->load->view('control');
			$this->load->view('footer1');
		}
		
	}
	
	function read_more_product(){
		
		if(isset($_POST["page"])){
			$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
			}else{
				$page_number = 1; //if there's no page number, set it to 1
			}
		
		$data['cart']= $this->m_product_buyer->get_all_content_buyer();
		$get_total_rows = count($data['cart']); //hold total records in variable
		$item_per_page = 10;
		//break records into pages
		$total_pages = ceil($get_total_rows/$item_per_page);
		
		//get starting position to fetch the records
		$page_position = (($page_number-1) * $item_per_page);
		
		$data['result']= $this->m_product_buyer->get_all_content_buyer_result($page_position, $item_per_page);
		
		//Display records fetched from database.
		$no=1;
		foreach($data['result'] as $content){
			$product_id = base64_encode($this->encrypt->encode($content->product_id, $this->session->userdata('encrypt_key')));
			$user_id = base64_encode($this->encrypt->encode($content->user_id, $this->session->userdata('encrypt_key')));
			$name = base64_encode($this->encrypt->encode($content->name, $this->session->userdata('encrypt_key')));
			$store_id = base64_encode($this->encrypt->encode($content->store_id, $this->session->userdata('encrypt_key')));
			$data = $this->m_wishlist->wishlist_product($content->product_id, $this->session->userdata('user_id'));
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
									<!--div class="col-sm-12"></div>
									<div class="col-sm-3">
										<div style="float: left; text-align: left;  font-size: 12px;">Min. Pemesanan</div>
									</div>
									<div class="col-sm-9">
										<div style="float: left; text-align: left;  font-size: 12px;"> : '.$content->min_order.' '.$content->satuan.'</div>
									</div-->
									<div class="col-sm-12"></div>
									<div class="col-sm-3">
										<div style="float: left; text-align: left;  font-size: 12px;">Toko</div>
									</div>
									<div class="col-sm-9">
										<div style="float: left; text-align: left;  font-size: 12px;"><a href="'.site_url('product?id='.$user_id.'&&name='.$name.'&&store_id='.$store_id).'"> : '.$content->store_name.'</a></div>
									</div>
									<!--div class="col-sm-12"></div>
									<div class="col-sm-3">
										<div style="float: left; text-align: left;  font-size: 12px;">Desa</div>
									</div>
									<div class="col-sm-9">
										<div style="float: left; text-align: left;  font-size: 12px;"> : '.$content->desa.'</div>
									</div-->
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
													<a href="'.site_url('').'" class="btn btn-warning btn-flat btn-sm"><i class="fa fa-eye"></i></a>
													<a href="'.site_url('wishlist/delete_whislist?id='.$product_id).'" class="btn btn-warning btn-flat btn-sm" 		onClick=\'return confirm("Apakah anda ingin menghapus produk ini sebagai produk favorit?")\'><i class="fa fa-heart"></i></a>
												</div>';
									} else {
										echo	'<div style="float: right; ">
													
													<a href="'.site_url('wishlist/insert_whislist?id='.$product_id).'" class="btn btn-warning btn-flat btn-sm" 		onClick=\'return confirm("Apakah anda ingin menjadikan produk ini sebagai produk favorit?")\'><i class="fa fa-heart"></i></a>
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
	
	function read_more_store(){
		
		if(isset($_POST["page"])){
			$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
			}else{
				$page_number = 1; //if there's no page number, set it to 1
			}
		
		$data['cart']= $this->m_store->get_all_store();
		$get_total_rows = count($data['cart']); //hold total records in variable
		$item_per_page = 10;
		//break records into pages
		$total_pages = ceil($get_total_rows/$item_per_page);
		
		//get starting position to fetch the records
		$page_position = (($page_number-1) * $item_per_page);
		
		$data['result']= $this->m_store->get_all_store_result($page_position, $item_per_page);
		
		//Display records fetched from database.
		$no=1;
		foreach($data['result'] as $content){
			$user_id = base64_encode($this->encrypt->encode($content->user_id, $this->session->userdata('encrypt_key')));
			$name = base64_encode($this->encrypt->encode($content->name, $this->session->userdata('encrypt_key')));
			$store_id = base64_encode($this->encrypt->encode($content->store_id, $this->session->userdata('encrypt_key')));
			 echo '
						<div class="col-lg-13">
						  <!-- small box -->
						  <div class="small-box bg-white img-bordered-sm2">
							<div class="inner">
							<center><img src="'.base_url().'/upload/store/shop.png" width="220" height="160" style="width: 80%;max-height: 100%" align="center"></center>
								<h4>
									<div style="float: left; text-align: left;  font-size: 18px;">'.$content->name.'</div><br>
								<p></p>
								</h4>
								
								<div style="float: right; ">
										<a href="'.site_url('product?id='.$user_id.'&&name='.$name.'&&store_id='.$store_id).'" target="_blank" class="btn btn-warning btn-flat btn-sm")\'>View</a>
								</div>
								<br>
								<br>';
						
					echo		'</div>   
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
