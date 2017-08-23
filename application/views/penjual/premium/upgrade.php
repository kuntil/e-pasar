

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-12 ">
				 <div class="box box-upgrade box-solid">
            		
					<!-- /.box-header -->
					<div class="box-body">
					
				<?php
						$message1 = $this->session->flashdata('notif1');
						$message2 = $this->session->flashdata('notif2');
						$message3 = $this->session->flashdata('notif3');
						if($message1){
							echo '<p class="alert alert-danger text-center">'.$message1 .'</p>';	
						}else if ($message2){
							echo '<p class="alert alert-success text-center">'.$message2 .'</p>';	
						}else if ($message3){
							echo '<p class="alert alert-success text-center">'.$message3 .'</p>';
						}
					?>
				
		
		 <?php if($count_gold||$count_silver ||$count_bronze) {?>
		 
		 <section class="content">
								            <div class="box-footer">
								              <div class="row">
								                <?php echo form_open("premium/bukti_transfer")?>
								                <!-- /.col -->
								                <div class="col-sm-12">
								                 	
								                  	<span><font size ="5">Upload Bukti Pembayaran</font></span>
								                    <span><?php echo form_input($upgrade['userfile'])?></span>	                    
								                    
								                    <input type="hidden" name="bukti_transfer" value="<?php echo $bukti_transfer?>">
								                    <center><button type="submit" class="btn btn-default btn-sm">upload</button></center>
								                  	 
								                </div>
								                <?php echo form_close();?>
								                <!-- /.col -->
								                
								                <!-- /.col -->
								              </div>
								              <!-- /.row -->
								            </div>
								            </section>
								            
		<?php }else if($count_aktif) {?>
		 
		 <section class="content">
								            <div class="content">
								              <div class="row">
								                <!-- /.col -->
								                <div class="col-sm-12">
								                 	<center>
								                 	<span><font size ="5">Oops.. Anda Masih Berlangganan Di Salah Satu Paket Super Toko</font></span>
								                 	</center>
								                    <input type="hidden" name="aktif" value="<?php echo $aktif?>">
								                </div>
								              </div>
								              <!-- /.row -->
								            </div>
								            </section>
								            
		<?php }else if($count_belum_aktif) {?>
		 
		 <section class="content">
								            <div class="content">
								              <div class="row">
								                <!-- /.col -->
								                <div class="col-sm-12">
								                 	<center>
								                 	<span><font size ="5">Permintaan Paket Super Toko Anda Sedang Dalam Proses Verifikasi Oleh Sistem Kami</font></span>
								                 	</center>
								                 	<input type="hidden" name="bukti_transfer" value="<?php echo $bukti_transfer?>">
								                    <input type="hidden" name="aktif" value="<?php echo $aktif?>">
								                </div>
								              </div>
								              <!-- /.row -->
								            </div>
								            </section>						            	
		 
		 <?php }else {?>
		 					
					 <?php foreach($up as $up){ ?>
							<center><b><font size ="10"> Yuk Buat Tokomu Menjadi <u><font color="#FFD15C">Super Toko</font></u>!</font></b></center><br>
							<center><h4><?php echo $up->content;?></h4></center>
							<center><img src="<?php echo base_url();?>asset/dist/img/super.png" width="280" height="280"/></center>
							
					 <?php }?>
                </div>
					<!-- /.box-body -->
				</div>
			</div> 
			
		</div>	
			</section>
		</div>
		
		   <section class="content">
				<div class="row">
					<div class="col-lg-12" style='margin-top: -145px'>
						 <div class="box box-upgrade box-solid">
		            		<div class="box-body">
		            		
							<!-- Box 1 -->				 
							  <div class="col-md-3" style='margin-left: 160px'>
								   <div class="box box-upgrade box-solid">
						            <div class="box-header with-border">
						              <center><h3 class="box-title"><font color="#C9841A"><b>Super Toko</b></font></h3></center>
						             
						            </div>
						            <!-- /.box-header -->
						            <div class="box-body">
						              <ul class="products-list product-list-in-box">
						              		<center><img src="<?php echo base_url();?>asset/dist/img/gold.png"  width="100" height="90"></center>
						                    
						                    <div style='margin-top: 10px'>
						                    <center><span>Rp.</span></center>
						                    <center><span>300.000</span></center>
						                    
						                	</div>
						                  
						                <!-- /.item -->
						                
						              </ul>
						            </div>
						            <!-- /.box-body -->
						            <div class="box-footerr">
						            
						            <div class="col-sm-6" style='margin-left: 70px'>
						             <button type="button" class="btn btn-block btn-warning btn-md" data-toggle="modal" data-target="#Modal1">Berlangganan</button>
						            </div>
						            </div>
						            <!-- /.box-footer -->
						          </div>
          </div>
          
        
        <div id="Modal1" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Paket Super Toko 3 Bulan</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>Apakah Anda yakin akan berlangganan paket ini ?</p>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">					
					<button type="button" class="btn btn-default outline pull-left" data-dismiss="modal">Tidak</button>
					<a href="<?php echo base_url();?>premium/pilih_bank_bronze" button type="button" class="btn btn-default">Ya</button></a>
				</div>
			</div>
		</div>
	</div>
	
          
          <!-- Box 2 -->
          <div class="col-md-3">
								   <div class="box box-upgrade box-solid">
						            <div class="box-header with-border">
						              <center><h3 class="box-title"><font color="#C9841A"><b>Super Toko</b></font></h3></center>
						             
						            </div>
						            <!-- /.box-header -->
						            <div class="box-body">
						              <ul class="products-list product-list-in-box">
						              		<center><img src="<?php echo base_url();?>asset/dist/img/gold.png"  width="100" height="90"></center>
						                    
						                    <div style='margin-top: 10px'>
						                    <center><span>Rp.</span></center>
						                    <center><span>600.000</span></center>
						                	</div>
						                  
						                <!-- /.item -->
						                
						              </ul>
						            </div>
						            <!-- /.box-body -->
						            <div class="box-footerr">
						            
						            <div class="col-sm-6" style='margin-left: 70px'>
						             <button type="button" class="btn btn-block btn-warning btn-md" data-toggle="modal" data-target="#Modal2">Berlangganan</button>
						            </div>
						            </div>
						            <!-- /.box-footer -->
						          </div>
          </div>
          
          <?php echo form_open("premium/create_data_silver")?>
          <div id="Modal2" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Paket Super Toko 6 Bulan</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>Apakah Anda yakin akan berlangganan paket ini ?</p>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<input type="hidden" name="store_id" value="<?php echo $store_id?>">
					<input type="hidden" name="email" value="<?php echo $email?>">  
					<button type="button" class="btn btn-default outline pull-left" data-dismiss="modal">Tidak</button>
					<a href="<?php echo base_url();?>premium/pilih_bank_silver" button type="submit" class="btn btn-default">Ya</button></a>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close();?>
	
	<!-- Box 3 -->
          <div class="col-md-3">
								   <div class="box box-upgrade box-solid">
						            <div class="box-header with-border">
						              <center><h3 class="box-title"><font color="#C9841A"><b>Super Toko</b></font></h3></center>
						             
						            </div>
						            <!-- /.box-header -->
						            <div class="box-body">
						              <ul class="products-list product-list-in-box">
						              		<center><img src="<?php echo base_url();?>asset/dist/img/gold.png"  width="100" height="90"></center>
						                    
						                    <div style='margin-top: 10px'>
						                    <center><span>Rp.</span></center>
						                    <center><span>900.000</span></center>
						                	</div>
						                  
						                <!-- /.item -->
						                
						              </ul>
						            </div>
						            <!-- /.box-body -->
						            <div class="box-footerr">
						            
						            <div class="col-sm-6" style='margin-left: 70px'>
						             <button type="button" class="btn btn-block btn-warning btn-md" data-toggle="modal" data-target="#Modal3">Berlangganan</button>
						            </div>
						            </div>
						            <!-- /.box-footer -->
						          </div>
          </div>
          
          <?php echo form_open("premium/create_data_gold")?>
          <div id="Modal3" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Paket Super Toko 12 Bulan</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>Apakah Anda yakin akan berlangganan paket ini ?</p>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<input type="hidden" name="store_id" value="<?php echo $store_id?>">
					<input type="hidden" name="email" value="<?php echo $email?>">  
					<button type="button" class="btn btn-default outline pull-left" data-dismiss="modal">Tidak</button>
					<a href="<?php echo base_url();?>premium/pilih_bank_gold" button type="submit" class="btn btn-default">Ya</button></a>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close();?>
          
          
					
                </div>
						 </div>
					</div>
				</div>
			</section>
		
    
		 <?php }?>
    
   