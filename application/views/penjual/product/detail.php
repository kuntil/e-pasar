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
					  <h3 class="box-title">Detail Produk "<?php echo $get_name;?>"</h3>

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
							
					<!-- /.box-body -->
				</div>
			</div> 
			
		</div>
			
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<!-- facebook share -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

