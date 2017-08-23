

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
							<center><b><font size ="6"> Metode Pembayaran</font></b></center><br>
                	</div>
					<!-- /.box-body -->
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
					
					
								  <div class="box box-primary">
									<div class="box-header">
									  <a href="#" class="btn btn-primary btn-sm">Via Transfer</a>

									  <!--div class="box-tools">
										<div class="input-group input-group-sm" style="width: 200px;">
										  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

										  <div class="input-group-btn">
											<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
										  </div>

										</div>

									  </div-->
									</div>
									
									<?php 
			
									if ($count){
											
									?>
											<div style='margin-top: -40px'>
											<section class="content">
								            <div class="box-footer">
								              <div class="row">
								                <?php echo form_open("premium/bukti_transfer")?>
								                <!-- /.col -->
								                <div class="col-sm-12">
								                 	
								                  	<span><font size ="5">Upload Bukti Pembayaran</font></span>
								                    <span><?php echo form_input($userfile)?></span>	                    
								                    
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
											</div>
										</div>
										  
									<?php 			
											
									}else {
									
									?>
			
									
									<!-- /.box-header -->
									<?php echo form_open("premium/create_data_gold")?>
									<div class="box-body table-responsive no-padding">
									  <table class="table table-hover">
										<tr>
										  <th><center>Bank</center></th>
										  <th><center>No Rekening</center></th>
										  <th><center>Nama Pemilik Rekening</center></th>
										  <th><center>#</center></th>
										</tr>
										<?php foreach($pilih as $pilih){ ?>
										<tr>
										  <td><center><img src="<?php echo base_url()?>asset/dist/img/logo_bni.png" height="100" width="140" >
											</center>
										  </td>
										  <td><center><?php echo $pilih->no_rek;?></center></td>
										  <td><center><?php echo $pilih->atas_nama;?></center></td>
										  <td>
										  	<input type="hidden" name="store_id" value="<?php echo $store_id?>">
											<input type="hidden" name="email" value="<?php echo $email?>">  
											<input type="hidden" name="no_account" value="<?php echo $no_account?>">  
											<center><button type="submit" class="btn btn-warning btn-sm">Pilih Bank</button></center>											
										  </td>
										</tr>
										<?php }?>
									  </table>
									</div>
									<?php echo form_close();?>
									<!-- /.box-body -->
									
									 <?php 			
			
										} 
									?>
								  </div>
								  <!-- /.box -->
								
				</div>
			</div> 
			
		</div>	
			</section>
			
			     
					
                </div>
						 </div>
					</div>
				</div>
			</section>
		
    
    
   