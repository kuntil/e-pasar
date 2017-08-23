<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	 public function __construct(){  
        parent::__construct();
		$this->load->model('m_home');	
		$this->load->model('m_product_category');	
		$this->load->model('m_wishlist');	
		
    }
	
	public function index(){
		
			$this->load->view('header');
		
			$category_id = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
			$total_data = $this->m_product_category->get_all_count($this->input->get('id'));
			$content_per_page = 4; 
			$data['total_data'] = ceil($total_data->tol_records/$content_per_page);
			$this->load->view('navbar', $data);
			
			$this->load->view('product_category', $data);
			$this->load->view('footer1');
			$this->load->view('footer2');
	}
	
	public function load_more()
    {
		if(isset($_POST["page"])){
			$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
		}else{
				$page_number = 1; //if there's no page number, set it to 1
		}
		
		
		$category_id = $this->encrypt->decode(base64_decode($this->input->post('category_id')), $this->session->userdata('encrypt_key'));
		 
		$data['total_data']= $this->m_product_category->get_all_count($category_id);
			
		$get_total_rows = $data['total_data']->tol_records; //hold total records in variable
		$item_per_page = 10;
		//break records into pages
		$total_pages = ceil($get_total_rows/$item_per_page);
		
		//get starting position to fetch the records
		$page_position = (($page_number-1) * $item_per_page);
		
		$data['result'] = $this->m_product_category->get_all_content($page_position, $item_per_page,$category_id);
			
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
	
}
