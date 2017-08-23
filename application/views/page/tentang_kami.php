<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-12 ">
				 <div class="box box-warning box-solid">
            		<div class="box-header with-border">
					  <h3 class="box-title">TENTANG KAMI</h3>

					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					  </div>
					  <!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					 <?php foreach($tentang as $tentang){ ?>
							<center> <img src="<?php echo base_url();?>asset/dist/img/team.png" width="320" height="320"/></center>
							<center><h3><?php echo $tentang->content;?></h3></center>
							<center>
							 <iframe width="800" height="512"
								src="https://www.youtube.com/embed/<?php echo $tentang->youtube_url;?>?controls=0">
							</iframe>
							</center>
					 <?php }?>
                </div>
					<!-- /.box-body -->
				</div>
			</div> 
			
		</div>
		<div class="row">
			
					
					<!-- /.box-body -->
				
			</div> 
			
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <footer class="main-footer">
    <div class="container">
						<div class="row">
							
							<div class="col-md-2 margin-bottom-xs-30">
								<h4 class="space30"><b>Pasar Bumi</b></h5>
								<a href="<?php echo base_url();?>pages/tentang_kami" target="blank"><p><h8>Tentang Kami</a></p>								
								<a href="#"><p>Aturan Penggunaan</a></p>								
								<a href="#"><p>Berita & Pengumuman</a></p>
								<a href="#"><p>Karir</a></p>
							</div>
							
							<div class="col-md-2 margin-bottom-xs-30">
								<h4 class="space30"><b>Pembeli</b></h5>
								<a href="#"><p><h8>Cara Belanja</a></p>
								<a href="#"><p><h8>Pembayaran</a></p>
								<a href="#"><p>Pengembalian Dana</a></p-->
								<a href="#"><p>Jaminan Aman</a></p>
								<a href="<?php echo base_url();?>pages/tips_berbelanja"><p>Tips Berbelanja</a></p>
							</div>
							
							<div class="col-md-2 margin-bottom-xs-30">
								<h4 class="space30"><b>Penjual</b></h5>
								<a href="#"><p><h8>Cara Berjualan</a></p>
								<a href="#"><p><h8>Penarikan Dana</a></p>
								<a href="#"><p>Tips Berjualan</a></p>
								<a href="#"><p><h8>Kisah Sukses</a></p>
							</div>
							
							<div class="col-md-2 margin-bottom-xs-30">
								<h4 class="space30"><b>Bantuan</b></h5>
								<a href="#"><p><h8>Syarat & Ketentuan</a></p>								
								<a href="#"><p>Kebijakan Privasi</a></p>
								<a href="#"><p>Hubungi Kami</a></p>
								<a href="#"><p>Panduan Keamanan</a></p>
							</div>
							
							
							<div class="col-md-2 pull-right">
							 	 <img src="<?php echo base_url();?>asset/dist/img/technos.png" width="130" alt=""/>
							</div>
							<div class="col-md-2 pull-right">
							 	 <img src="<?php echo base_url();?>asset/dist/img/pasarbumi.png" width="130" alt=""/>
							</div>
						</div>
					</div>
  </footer>
 