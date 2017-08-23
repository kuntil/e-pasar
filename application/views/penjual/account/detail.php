<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	  <form>
		<div class="row">
			<div class="col-lg-12 ">
				<div class="box box-warning box-solid">
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
							<div class="col-lg-6">
								<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
									  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
									  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
									</ol>
									<div class="carousel-inner">
									  <div class="item active">
										<img src="<?php echo base_url()."upload/product/".$image1?>" alt="First slide" width="300" height="300" style="width: 100%;max-height: 100%">

									  </div>
									  <div class="item">
										<img src="<?php echo base_url()."upload/product/".$image1?>" alt="Second slide" width="300" height="300" style="width: 100%;max-height: 100%">

									  </div>
									  <div class="item">
										<img src="<?php echo base_url()."upload/product/".$image1?>" alt="Third slide" width="300" height="300" style="width: 100%;max-height: 100%">

									  </div>
									</div>
									<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
									  <span class="fa fa-caret-left"></span>
									</a>
									<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
									  <span class="fa fa-caret-right"></span>
									</a>
								 </div>
							
							</div>
							<div class="col-lg-6">
								<h2><?php echo $get_name;?></h2>
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
								
								<div class="col-sm-5">
									<div style="font-size: 18px;">Deskripsi/Penjelasan Produk</div>
								</div>
								<div class="col-sm-7">
									<div style="font-size: 18px;">: <?php echo $get_desc;?></div>
								</div>
								<div class="col-sm-12"></div>
								<div class="col-sm-5">
									<div style="font-size: 18px;">Catatan</div>
								</div>
								<div class="col-sm-7">
									<div style="font-size: 18px;">: <?php echo $get_note;?></div>
								</div>
								<div class="col-sm-12"></div>
								<div class="col-sm-5">
									<div style="font-size: 18px;">Harga</div>
								</div>
								<div class="col-sm-7">
									<div style="font-size: 18px;">: <?php echo "Rp. ".number_format($get_price,0,'.','.')?></div>
								</div>
								<div class="col-sm-12"></div>
								<div class="col-sm-5">
									<div style="font-size: 18px;">Jumlah: </div>
								</div>
								<div class="col-sm-7">
									<div style="font-size: 18px;">: <?php echo $get_qty; ?></div>
								</div>
								<br><br>
								<br>
							
							</div>
					
							<!--a href="<?php echo base_url();?>" class="btn btn-warning">Kembali</a-->
					  
					</div>
					<!-- /.box-body -->
				</div>
			</div> 
			
		</div>
		</form>
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://technos-studio.com/">Techno's Studio</a>.</strong> All rights
    reserved.
  </footer>