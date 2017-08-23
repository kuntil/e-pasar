<?php
$data['ip']=getenv('remote_addr');
$data['user_agent']=$_SERVER['HTTP_USER_AGENT'];
$data['product_id'] = $product_id;
$date=getdate(date("U"));
$day=$date['mday'];
$month=$date['month'];
$year=$date['year'];
$data['date'] = ''.$day.'/'.$month.'/'.$year.'';


setcookie("visitor", $data['ip'], time() +3600);

$cek = $this->m_counter->get($data['ip'],$data['user_agent'],$data['product_id'],$data['date']);
if($cek->tol_records==0){
		$counter = $this->m_counter->insert($data);
}

?>

<script src="<?php echo base_url();?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-12 ">
				<div class="box box-primary box-solid">
					<div class="box-header with-border">
					  <h3 class="box-title">Detail Produk "<b><?php echo $get_name;?></b>"</h3>

					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					  </div>
					  <!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
							<div class="col-lg-9">
								<h2><?php echo $get_name;?></h2>
								<div class="box-footer">
								Bagikan : 
								
								<a target="popup" 
									onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fpasarbumi.com%2Fproduct%2Fdetail_product%3Fid%3D <?php echo $this->input->get('id');?>&amp;src=sdkpreparse','popup','width=600,height=600'); return false;" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fpasarbumi.com%2Fproduct%2Fdetail_product%3Fid%3D <?php echo $this->input->get('id');?>&amp;src=sdkpreparse"><img src="<?php echo base_url();?>asset/dist/img/fb-icon.png" width="30" height="30"></a>
								&nbsp;
								
								<a href="https://twitter.com/share"  target="popup" 
									onclick="window.open('https://twitter.com/share','popup','width=600,height=600'); return false;" data-show-count="false"><img src="<?php echo base_url();?>asset/dist/img/twitter-icon.png" width="30" height="30"></a>
								&nbsp;
								
								<a href="https://plus.google.com/share?url=http://pasarbumi.com/product/detail_product?id=<?php echo $this->input->get('id');?>" target="popup" 
									onclick="window.open('https://plus.google.com/share?url=http://pasarbumi.com/product/detail_product?id=<?php echo $this->input->get('id');?>','popup','width=600,height=600'); return false;">
									<img src="<?php echo base_url();?>asset/dist/img/gplus-icon.png" width="30" height="30">
								</a>&nbsp;
								
								<!--a href="">
									<img src="https://img.clipartfest.com/7ec3784efe2467b324a329c4daa70c84_instagram-png-clipart-clipartfest-instagram-clipart-png_960-960.png" width="30" height="30">
								</a-->&nbsp;
								</div>
								<div class="box-footer">
								</div>
							</div>
							<div class="col-lg-4">
								<!--div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
									  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
									  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
									</ol>
									<div class="carousel-inner">
									  <div class="item active">
										<img src="<?php echo base_url()."upload/product/".$image1?>" alt="First slide" width="420" height="300" style="width: 100%;max-height: 100%">

									  </div>
									  <div class="item">
										<img src="<?php echo base_url()."upload/product/".$image1?>" alt="Second slide" width="420" height="300" style="width: 100%;max-height: 100%">

									  </div>
									  <div class="item">
										<img src="<?php echo base_url()."upload/product/".$image1?>" alt="Third slide" width="420" height="300" style="width: 100%;max-height: 100%">

									  </div>
									</div>
									<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
									  <span class="fa fa-caret-left"></span>
									</a>
									<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
									  <span class="fa fa-caret-right"></span>
									</a>
								 </div-->
								 <?php if($get_qty<=0){?>
										<div class="sale-box">
										<span class="on_sale ">Stok Habis</span></div>	
								<?php } else {?>
										 <div class="sale-box1">
										 <span class="on_sale ">Ready</span></div>
								<?php } ?>
								
								 <img src="<?php echo base_url()."upload/product/".$image1?>" alt="First slide" width="420" height="300" style="width: 100%;max-height: 100%">
								
							
							</div>
							<div class="col-lg-5">
								<br><span class="badge bg-blue">Kategori : 
								<?php 
									$nama_kategori = $this->m_category->get_category_name($product_id);
									foreach ($nama_kategori as $s){
									}
									
									$nama_kategori_terakhir = $s->category_name;
									
									foreach ($nama_kategori as $v){
										if($v->category_name == $nama_kategori_terakhir){
											echo $v->category_name;
										}else{
											echo $v->category_name.", ";
										}
										
									}
									
								?>
								</span><br>
								<br>
								
								<div class="col-sm-12"></div>
								<div class="col-sm-5">
									<div ><i class="fa fa-briefcase"></i>&nbsp;  <b>Volume</b></div>
								</div>
								<div class="col-sm-7">
									<div >: <?php echo $get_volume; ?> <?php echo $get_satuan; ?></div>
								</div>
								<div class="col-sm-5">
									<div ><i class="fa fa-inbox"></i>&nbsp; <b>Jumlah Stok</b></div>
								</div>
								<div class="col-sm-7">
									<div >: <?php echo $get_qty; ?></div>
								</div>
								<div class="col-sm-5"> 
									<div ><i class="fa fa-shopping-cart"></i>&nbsp;  <b>Pemesanan Min.</b></div>
								</div>
								<div class="col-sm-7">
									<div >: <?php echo $get_min_order; ?></div>
								</div>
								<div class="col-sm-5">
									<div ><i class="fa fa-eye"></i>&nbsp;  <b>Lihat </b></div>
								</div>
								<div class="col-sm-7">
									<div >: <?php 
									$counter = $this->m_counter->get_all_count($product_id);
									echo $counter->tol_records;
									?></div>
								</div><br><br><br><br><br>
								<div class="col-sm-12">
									<div ><b>Deskripsi :</b></div>
								</div>
								<div class="col-sm-12">
									<div ><?php echo $get_desc;?></div>
								</div>
								<br><br>
								<br><br><br>
								<br><br><br>
								<br>
								
								<!-- general form elements -->
          
							</div>
							
							
							
							<div class="col-lg-3">
								  <div class="box img-bordered-sm3" style="height: 50px;">
										<p style="float: center; text-align: center;  font-weight:bold; font-size:34px; color:red">
										<?php echo "Rp. ".number_format($get_price,0,'.','.')?></p>
								  </div>
								  
								  <?php $product_id2 = base64_encode($this->encrypt->encode($product_id, $this->session->userdata('encrypt_key')));
								  ?>
								  <a href="<?php echo base_url();?>cart/create_cart?id=<?php echo $product_id2;?>"><p class="alert2 alert-warning text-center" style="font-size:16px; color:#109437"><i class="fa fa-shopping-cart"></i> Beli</p></a>
								  
								  <?php
								  $wishlist = $this->m_wishlist->wishlist_product($product_id, $this->session->userdata('user_id'));
								  if($wishlist){
								  ?>
										<a href="<?php echo base_url();?>wishlist/delete_whislist?id=<?php echo $product_id2;?>&&page=product"><p class="alert2 alert-warning text-center" style="font-size:16px; color:#109437"><i class="fa fa-heart"></i> Favorit</p></a>
								  <?php } else { ?>
										<a href="<?php echo base_url();?>wishlist/insert_whislist?id=<?php echo $product_id2;?>&&page=product"><p class="alert2 alert-warning text-center" style="font-size:16px; color:#109437"><i class="fa fa-heart"></i> Favorit</p></a>
								  <?php }?>
							</div>
							
							
							
							<div class="col-lg-9 ">
									<div class="box-header with-border">
									  <h3 class="box-title"><b>Komentar Produk</b></h3>

									  <!-- /.box-tools -->
									</div>
									<!-- /.box-header -->
									<div class="box-body">							
										
										<div class="clearfix"></div>
										<div class="clearfix space20"></div>
									</div>
										<?php 
										$message = $this->session->flashdata('notif');
										$message2 = $this->session->flashdata('notif2');
										if($message){
											echo '<p class="alert alert-success text-center">'.$message .'</p>';
										}else if($message2){
											echo '<p class="alert alert-danger text-center">'.$message2 .'</p>';
										}else{}
						
										
										echo form_open("comment/insert");?>
										<div class="space20">
										    <input type="hidden" name="product_id" value="<?php echo $product_id?>">
											<textarea name="message" id="text" class="input-md form-control" rows="6" placeholder="Masukan Komentar Anda disini.." maxlength="400"></textarea>
										</div>
										<button type="submit" class="btn btn-block btn-danger">Komentar</button>
										<?php echo form_close();?> 
										 
									
									<h4 class="uppercase space30"><?php echo $count_comment;?> Komentar</h4>
													<div id="results"></div>
										<div align="center">
											<button id="load_more_button"> Tampilkan Lebih Banyak</button>
										</div>
										
								 <br><br>
							</div>

<script type="text/javascript">
		var track_page = 1; //track user click as page number, righ now page number 1
		var id_product = '<?php echo $product_id?>'; 
		var id_product2 = '<?php echo $this->input->get('id')?>'; 
		load_contents(track_page); //load content

		$("#load_more_button").click(function (e) { //user clicks on button
			track_page++; //page number increment everytime user clicks load button
			load_contents(track_page); //load content
		});

		//Ajax load function
		function load_contents(track_page){
			$('.animation_image').show(); //show loading image
			$.post( '<?php echo base_url();?>product/load_more_comment', {'page': track_page,'id_product': id_product,'id_product2': id_product2}, function(data){
			
				
				if(data.trim().length == 0){
					//display text and disable load button if nothing to load
					$("#load_more_button").text("Tampilkan Komentar").prop("disabled", true);
				}
				
				$("#results").append(data); //append data into #results element
				
				//scroll page to button element
				$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 800);
			
				//hide loading image
				$('.animation_image').hide(); //hide loading image once data is received
			});
		}
</script>
							
							<div class="col-lg-3 ">
								<div class="box box-primary box-solid">
									<div class="box-header with-border">
									  <h3 class="box-title"><b>INFORMASI PENJUAL</b></h3>
									</div>
									<!-- /.box-header -->
									<!-- form start -->
									<form role="form">
									  <div class="box-body">
										<center>	
										  <?php if($get_store_image){ ?>
												 <img src="<?php echo base_url();?>upload/person/<?php echo $get_store_image;?>" width="220" height="220" style="width: 80%;max-height: 100%" align="center">
										  <?php } else { ?>
												 <img src="<?php echo base_url();?>upload/store/shop.png"width="220" height="220" style="width: 80%;max-height: 100%" align="center">
										  <?php } ?><br><br>
										  <p style="font-size:18px;"><?php echo $get_store_name?><p>
										  </center>
									  </div>
									  <!-- /.box-body -->

									  <!--div class="box-footer">
										<button type="submit" class="btn btn-primary">Submit</button>
									  </div-->
									</form>
								 </div>
							</div>

<script src="<?php echo base_url();?>/asset/plugins/jQuery/jquery-1.11.0.min.js"></script>
<script src="<?php echo base_url();?>/asset/plugins/carousel/responsiveCarousel.min.js"></script>

	
		<div class="row">
			<div class="col-md-12">
				<!-- general form elements -->
				  <div class="box box-primary box-solid">
					<div class="box-header with-border">
					 <h3 class="box-title"> <b>PRODUK LAIN DARI <?php echo $get_store_name?></b></h3>
					</div>
					 <div class="box-body">
						<div id="w">
							
							
							<div class="crsl-items" data-navigation="navbtns">
							  <div class="crsl-wrap">
							  <?php 
							  
							  $product=$this->m_product_store->get_all_content_store($get_store_id);
							  foreach($product as $product) {
								 $product_id = base64_encode($this->encrypt->encode($product->product_id, $this->session->userdata('encrypt_key')));
								 $data = $this->m_wishlist->wishlist_product($product->product_id, $this->session->userdata('user_id')); 
								  ?>
							  
								<div class="crsl-item">
								<div class="col-lg-12">
										<?php if($product->qty<=0){ ?>
											<div class="sale-box">
											<span class="on_sale ">Stok Habis</span></div>
										<?php } else { ?> 
											<div class="sale-box1">
											<span class="on_sale ">Ready</span></div>
										<?php } ?>								
										  <div class="small-box bg-white img-bordered-sm2">
											<div class="inner">
											 <center><img src="<?php echo base_url()?>/upload/product/<?php echo $product->image1?>" width="220" height="170" style="width: 100%;max-height: 100%" align="center"></center>
												<h4>
													<div class="col-sm-12">
														<div style="float: left; text-align: left;  font-size: 16px;"><b><?php echo $product->name?></b></div>
													</div>
													<div class="col-sm-12">
														<div style="float: left; text-align: left;  color: #ff5722; font-size: 16px;" ><b>Rp. <?php echo number_format($product->price,0,'.','.')?></b></div>
													</div><br>
												<p></p>
												</h4>
												
													
											</div>  
											<div class="box-footer">
													<div class="col-sm-6">
														<div style="float: left; text-align: left;  font-size: 12px;">Volume/Berat</div>
													</div>
													<div class="col-sm-6">
														<div style="float: left; text-align: left;  font-size: 12px;">: <?php echo $product->volume?> <?php echo $product->satuan?></div>
													</div>
													<div class="col-sm-12"></div>
													<div class="col-sm-6">
														<div style="float: left; text-align: left;  font-size: 12px;">Jumlah stok</div>
													</div>
													<div class="col-sm-6">
														<div style="float: left; text-align: left;  font-size: 12px;"> : <?php echo $product->qty?></div>
													</div>
											</div>  
											<!--
											<div class="box-footer">
											
												
											<?php if($product->qty<=0){ ?>
												<a class="btn btn-warning btn-flat"><i class="fa fa-shopping-cart"></i></a>
											<?php } else { ?>							 
												<a href="<?php echo base_url()?>cart/create_cart?id=<?php echo $product_id?>" class="btn btn-warning btn-flat" onClick=\'return confirm("Apakah anda ingin membeli produk ini ?")\'><i class="fa fa-shopping-cart"></i></a>
											<?php } ?>			 
											 
											<a href="<?php echo base_url()?>product/detail_product?id=<?php echo $product_id?>" class="btn btn-warning btn-flat"><i class="fa fa-search-plus"></i></a>
					
											<?php if(count($data)==true){ ?>							
													<div style="float: right; ">
																<a href="<?php echo base_url()?>product/detail_product?id=<?php echo $product_id?>" class="btn btn-warning btn-flat"><i class="fa fa-eye"></i></a>
																<a href="<?php echo base_url()?>wishlist/delete_whislist?id=<?php echo $product_id?>" class="btn btn-warning btn-flat" 		onClick=\'return confirm("Apakah anda ingin menghapus produk ini sebagai produk favorit?")\'><i class="fa fa-heart"></i></a>
															</div>
											<?php } else { ?>		
													<div style="float: right; ">
																<a href="<?php echo base_url()?>product/detail_product?id=<?php echo $product_id?>" class="btn btn-warning btn-flat"><i class="fa fa-eye"></i></a>
																<a href="<?php echo base_url()?>wishlist/insert_whislist?id=<?php echo $product_id?>" class="btn btn-warning btn-flat" 		onClick=\'return confirm("Apakah anda ingin menjadikan produk ini sebagai produk favorit?")\'><i class="fa fa-heart-o"></i></a>
															</div>
											<?php } ?>		
											</div>-->											
									   </div>
								
								</div>
								</div>
							  <?php } ?>
								
								
							</div><!-- @end .crsl-items -->
							<nav class="slidernav">
							  <div id="navbtns" class="clearfix">
								<a href="#" class="previous left carousel-control " style="float: left;height: 100px;top: 140px"><span class="fa fa-caret-left"></a>
								<a href="#" class="next right carousel-control" style="float: right;height: 100px;top: 140px"><span class="fa fa-caret-right"></a>
							  </div>
							</nav>
						  </div><!-- @end #w -->
						  <div style="float: right; text-align: right;  font-size: 12px;">
						   <?php 
								$user_id = base64_encode($this->encrypt->encode($product->user_id, $this->session->userdata('encrypt_key')));
								$get_store_id2 = base64_encode($this->encrypt->encode($get_store_id, $this->session->userdata('encrypt_key')));
								$get_store_name2 = base64_encode($this->encrypt->encode($get_store_name, $this->session->userdata('encrypt_key')));
						   ?>
							<a href="<?php echo base_url()?>product?id=<?php echo $user_id?>&&name=<?php echo $get_store_name2?>&&store_id=<?php echo $get_store_id2?>" class="btn btn-primary btn-flat">LIHAT SEMUA</i></a>
						  </div>
					</div>
				  </div>
				  <!-- /.box -->
				  
						  
					</div>
		</div>
	
<script type="text/javascript">
$(function(){
  $('.crsl-items').carousel({
    visible: 5,
    itemMinWidth: 180,
    itemEqualHeight: 370,
    itemMargin: 9,
  });
  
  $("a[href=#]").on('click', function(e) {
    e.preventDefault();
  });
});
</script>
					  
					</div>
					
					
<!--		<div class="row">
			<div class="col-md-12">
				<!-- general form elements -->
<!--				  <div class="box box-primary">
					<div class="box-header with-border">
					 <h3 class="box-title"> <b>PRODUK LAIN DENGAN KATEGORI YANG SAMA</b></h3>
					</div>
					 <div class="box-body">
						<div id="w">
							
							
							<div class="crsl-items2" data-navigation="navbtns">
							  <div class="crsl-wrap">
							  <?php 
							  
							  $product=$this->m_product_category->get_all_content_store($get_category_id);
							  foreach($product as $product) {
								 $product_id = base64_encode($this->encrypt->encode($product->product_id, $this->session->userdata('encrypt_key')));
								 $data = $this->m_wishlist->wishlist_product($product->product_id, $this->session->userdata('user_id')); 
								  ?>
							  
								<div class="crsl-item">
								<div class="col-lg-12">
										<?php if($product->qty<=0){ ?>
											<div class="sale-box">
											<span class="on_sale ">Stok Habis</span></div>
										<?php } else { ?> 
											<div class="sale-box1">
											<span class="on_sale ">Ready</span></div>
										<?php } ?>								
										  <div class="small-box bg-white img-bordered-sm2">
											<div class="inner">
											 <center><img src="<?php echo base_url()?>/upload/product/<?php echo $product->image1?>" width="220" height="170" style="width: 100%;max-height: 100%" align="center"></center>
												<h4>
													<div class="col-sm-12">
														<div style="float: left; text-align: left;  font-size: 16px;"><b><?php echo $product->name?></b></div>
													</div>
													<div class="col-sm-12">
														<div style="float: left; text-align: left;  color: #ff5722; font-size: 16px;" ><b>Rp. <?php echo number_format($product->price,0,'.','.')?></b></div>
													</div><br>
												<p></p>
												</h4>
												
													
											</div>  
											<div class="box-footer">
													<div class="col-sm-6">
														<div style="float: left; text-align: left;  font-size: 12px;">Volume/Berat</div>
													</div>
													<div class="col-sm-6">
														<div style="float: left; text-align: left;  font-size: 12px;">: <?php echo $product->volume?> <?php echo $product->satuan?></div>
													</div>
													<div class="col-sm-12"></div>
													<div class="col-sm-6">
														<div style="float: left; text-align: left;  font-size: 12px;">Jumlah stok</div>
													</div>
													<div class="col-sm-6">
														<div style="float: left; text-align: left;  font-size: 12px;"> : <?php echo $product->qty?></div>
													</div>
											</div>  
											<!--
											<div class="box-footer">
											
												
											<?php if($product->qty<=0){ ?>
												<a class="btn btn-warning btn-flat"><i class="fa fa-shopping-cart"></i></a>
											<?php } else { ?>							 
												<a href="<?php echo base_url()?>cart/create_cart?id=<?php echo $product_id?>" class="btn btn-warning btn-flat" onClick=\'return confirm("Apakah anda ingin membeli produk ini ?")\'><i class="fa fa-shopping-cart"></i></a>
											<?php } ?>			 
											 
											<a href="<?php echo base_url()?>product/detail_product?id=<?php echo $product_id?>" class="btn btn-warning btn-flat"><i class="fa fa-search-plus"></i></a>
					
											<?php if(count($data)==true){ ?>							
													<div style="float: right; ">
																<a href="<?php echo base_url()?>product/detail_product?id=<?php echo $product_id?>" class="btn btn-warning btn-flat"><i class="fa fa-eye"></i></a>
																<a href="<?php echo base_url()?>wishlist/delete_whislist?id=<?php echo $product_id?>" class="btn btn-warning btn-flat" 		onClick=\'return confirm("Apakah anda ingin menghapus produk ini sebagai produk favorit?")\'><i class="fa fa-heart"></i></a>
															</div>
											<?php } else { ?>		
													<div style="float: right; ">
																<a href="<?php echo base_url()?>product/detail_product?id=<?php echo $product_id?>" class="btn btn-warning btn-flat"><i class="fa fa-eye"></i></a>
																<a href="<?php echo base_url()?>wishlist/insert_whislist?id=<?php echo $product_id?>" class="btn btn-warning btn-flat" 		onClick=\'return confirm("Apakah anda ingin menjadikan produk ini sebagai produk favorit?")\'><i class="fa fa-heart"></i></a>
															</div>
											<?php } ?>		
											</div>-->											
<!--									   </div>
								
								</div>
								</div>
							  <?php } ?>
								
								
							</div><!-- @end .crsl-items -->
<!--							<nav class="slidernav">
							  <div id="navbtns" class="clearfix">
								<a href="#" class="previous left carousel-control " style="float: left;height: 100px;top: 140px"><span class="fa fa-caret-left"></a>
								<a href="#" class="next right carousel-control" style="float: right;height: 100px;top: 140px"><span class="fa fa-caret-right"></a>
							  </div>
							</nav>
						  </div><!-- @end #w -->
<!--						  <div style="float: right; text-align: right;  font-size: 12px;">
						   <?php 
								$user_id = base64_encode($this->encrypt->encode($product->user_id, $this->session->userdata('encrypt_key')));
								$get_store_id2 = base64_encode($this->encrypt->encode($get_store_id, $this->session->userdata('encrypt_key')));
								$get_store_name2 = base64_encode($this->encrypt->encode($get_store_name, $this->session->userdata('encrypt_key')));
						   ?>
							<a href="<?php echo base_url()?>product?id=<?php echo $user_id?>&&name=<?php echo $get_store_name2?>&&store_id=<?php echo $get_store_id2?>" class="btn btn-primary btn-flat">LIHAT SEMUA</i></a>
						  </div>
					</div>
				  </div>
				  <!-- /.box -->
				  
						  
<!--					</div>
		</div> 
	
<script type="text/javascript">
$(function(){
  $('.crsl-items2').carousel({
    visible: 5,
    itemMinWidth: 180,
    itemEqualHeight: 370,
    itemMargin: 9,
  });
  
  $("a[href=#]").on('click', function(e) {
    e.preventDefault();
  });
});
</script>-->
					  
					</div>
					<!-- /.box-body -->
				</div>
			</div> 
			
		</div>
			
		</div>
    </section>
    <!-- /.content -->
  </div>
<!-- facebook share -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

