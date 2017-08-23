
 <!-- Main content -->
    <section class="content">
      
	  <div class="row">
	  <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Tips Berbelanja</h3>
            </div>
			 <div class="box-body">
			 <table class="table">
			  <?php foreach($tips_belanja as $tips_belanja){ ?>
				<tr>
				
					<td style="width: 10px">
						<div class="col-md-12">
							<img src="<?php echo base_url();?>asset/dist/img/tips_shopping.png" width="120" height="120">
							
						</div>
					</td>
					<td>
						<div class="col-md-12">
							 <h3><?php echo $tips_belanja->title;?></h3>
							 <?php echo $tips_belanja->content;?>
						</div>
						
					</td>
					
				</tr>
			 <?php }?>
			 </table>
				
            </div>
          </div>
          <!-- /.box -->

        </div> 
			
      </div>
      
     <footer class="main-footer">
    <div class="container">
						<div class="row">
							
							<div class="col-md-2 margin-bottom-xs-30">
								<h4 class="space30"><b>Pasar Bumi</b></h4>
								<a href="<?php echo base_url();?>pages/tentang_kami" target="blank"><p><h8>Tentang Kami</a></p>								
								<a href="<?php echo base_url();?>pages/aturan_penggunaan" target="blank"><p>Aturan Penggunaan</a></p>								
								<a href="<?php echo base_url();?>pages/berita_pengumuman" target="blank"><p>Berita & Pengumuman</a></p>
								<a href="<?php echo base_url();?>pages/karir" target="blank"><p>Karir</a></p>
							</div>
							
							<div class="col-md-2 margin-bottom-xs-30">
								<h4 class="space30"><b>Pembeli</b></h4>
								<a href="<?php echo base_url();?>pages/cara_belanja" target="blank"><p><h8>Cara Belanja</a></p>
								<a href="#"><p>Pembayaran</a></p>
								<a href="#"><p>Pengembalian Dana</a></p-->
								<a href="#"><p>Jaminan Aman</a></p>
								<a href="<?php echo base_url();?>pages/tips_berbelanja" target="blank"><p>Tips Berbelanja</a></p>
							</div>
							
							<div class="col-md-2 margin-bottom-xs-30">
								<h4 class="space30"><b>Penjual</b></h4>
								<a href="#"><p><h8>Cara Berjualan</a></p>
								<a href="#"><p>Penarikan Dana</a></p>
								<a href="<?php echo base_url();?>pages/tips_berjualan" target="blank"><p>Tips Berjualan</a></p>
								<a href="#"><p><h8>Kisah Sukses</a></p>
							</div>
							
							<div class="col-md-2 margin-bottom-xs-30">
								<h4 class="space30"><b>Bantuan</b></h4>
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
	 
    </section>
