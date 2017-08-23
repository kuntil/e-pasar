<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
		$this->load->model('m_home');	
		$this->load->model('m_person');	
		$this->load->model('m_cart');	
		$this->load->model('m_product_store');	
		$this->load->model('m_product_buyer');	
		$this->load->model('m_address_buyer');
		$this->load->model('m_transaction_success');
		$this->load->model('m_transaction_cancel');			
		$this->load->model('m_wishlist');	
		
		//cek login
		if(!$this->session->userdata('user_id')) {
            redirect();
        }
		
    }
	
	public function getAddressBuyerIdLast(){
    	$n="";
    	$last = $this->m_address_buyer->last();
    	foreach($last as $v){
    		$n = $v->address_id;
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
	
	public function getPersonIdLast(){
    	$n="";
    	$last = $this->m_person->last();
    	foreach($last as $v){
    		$n = $v->person_id;
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
	
	public function create_data() {
	
		$data['user_id']= $this->session->userdata('user_id');
		$data['person_id']= $this->getPersonIdLast();
		$data['name'] = $this->input->post('name');
		$data['birth_date'] = date("Y-m-d",strtotime($this->input->post('birth_date')));
		$data['no_ktp'] = $this->input->post('no_ktp');
		$data['blood_type'] = $this->input->post('blood_type');
		$data['gender'] = $this->input->post('gender');
		$data['job'] = $this->input->post('job');
			
		$this->m_person->insert($data);
		
		$data2['user_id']= $this->session->userdata('user_id');
		$data2['address_id']= $this->getAddressBuyerIdLast();
		$data2['desc'] = $this->input->post('address');
		
		$this->m_address_buyer->insert($data2);
		
		redirect();
		
    }
	
	function read_more(){
		
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
