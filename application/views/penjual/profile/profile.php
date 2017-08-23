<script src="<?php echo base_url();?>/asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
   $(function() {
     $('#datepicker').datepicker({
		 format:'dd-mm-yyyy',
		 autoclose: true
    });
   });
 </script>
 

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Profil Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
				<?php 	
						$message = $this->session->flashdata('notif');
						if($message){
							echo '<p class="alert alert-success text-center">'.$message .'</p>';
						}else{}
						
						
						if($get_user_id==$this->session->userdata('user_id')){
							echo form_open_multipart("profile/update_data", "class='form-horizontal'");
						} else {
							echo form_open_multipart("profile/create_data", "class='form-horizontal'");
						}
				?>
      <div class="row">
        

          <!-- Profile Image -->
          <!--div class="box box-widget widget-user">
            <div class="box-body box-profile"  style="background: url('<?php echo base_url();?>asset/dist/img/photo1.png') center center;">
             
			  <?php if($get_image){ ?>
			  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>upload/person/<?php echo $get_image;?>" alt="User profile picture">
			  <?php } else { ?>
			   <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>asset/dist/img/avatar5.png" alt="User profile picture">
			  <?php } ?>
              <h3 class="profile-username text-center">Foto</h3>

               <?php echo form_input($userfile)?>
            </div>
            <!-- /.box-body -->
          </div-->
          <!-- /.box -->
          
          <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('<?php echo base_url();?>asset/dist/img/photo1.png') center center;">
              <h3 class="widget-user-username"><?php echo $user_profile_name?></h3>
              <h5 class="widget-user-desc"><?php echo $user_store_name?></h5>
            </div>
            <div class="widget-user-image">
            	 	<?php if($get_image){ ?>
              		<img class="img-circle" src="<?php echo base_url();?>upload/person/<?php echo $get_image;?>" alt="User Avatar">
              		<?php } else { ?>
              		<img class="img-circle" src="<?php echo base_url();?>asset/dist/img/avatar5.png" alt="User Avatar">
              		<?php } ?>
              		 
            </div>
            <div class="box-footer">
              <div class="row">
                
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <?php echo form_input($userfile)?>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
          
		  
       
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Tentang Saya</a></li>
              <li ><a href="#awal" data-toggle="tab">Data Awal</a></li>
              <li ><a href="#account" data-toggle="tab">No Rekening Bank</a></li>
            </ul>
            <div class="tab-content">
              
             <!-- TAB 1 -->
              <div class="active tab-pane" id="settings">		  	
				
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Nama Lengkap</label>

                    <div class="col-sm-9">
					  <?php echo form_input($user_id)?>
					  <?php echo form_input($person_id)?>
					  <?php echo form_input($name)?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">Tanggal Lahir</label>

                    <div class="col-sm-3">
						<div class="input-group date ">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
								<?php echo form_input($birth_date)?>
						</div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">No. KTP</label>

                    <div class="col-sm-9">
                      <?php echo form_input($no_ktp)?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Gol. Darah</label>

                    <div class="col-sm-3">
						<?php $option = array(
									''=>'- Gol. Darah -',
									'1'=>'A',
									'2'=>'B',
									'3'=>'AB',
									'4'=>'O'
							); 
							echo form_dropdown($blood_type,$option,$get_blood_type);?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-3 control-label">Jenis Kelamin</label>

                    <div class="col-sm-3">
						<?php $option = array(
									''=>'- Jenis Kelamin -',
									'1'=>'Pria',
									'2'=>'Wanita'
							); 
							echo form_dropdown($gender,$option,$get_gender);?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <?php echo form_input($email)?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" required> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                <?php echo form_close();?>
              </div>
              <!-- /.tab-pane -->
              
              <!-- TAB 2 -->
              <div class="tab-pane" id="awal">	
                  
                  <?php 	
							echo form_open_multipart("profile/update_data_awal", "class='form-horizontal'");
						
				?>
                  <div class="form-group">
                   <label for="inputEmail" class="col-sm-2 control-label">Nama Toko</label>
                    <div class="col-sm-9">
                    <?php echo form_input($store_id)?>
					  <?php echo form_input($nm_toko)?>
                    </div>
                  </div>
                  
                  <div class="form-group">
                   <label for="inputEmail" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-9">
                       <?php echo form_input($alamat)?>
                       </div>            
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Telepon</label>
                     <div class="col-sm-9">
                    	<?php echo form_input($nohp)?>
                    </div>
                  </div>
                  
                  <div class="form-group">
                   <label for="inputEmail" class="col-sm-2 control-label">Keterangan</label>
                   <div class="col-sm-9">
                    	<?php echo form_input($keterangan)?>
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" required> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                <?php echo form_close();?>
              </div>
			  
			  <!-- TAB 3 -->
			  <div class="tab-pane" id="account">
					<!-- Main content -->
					<section class="content">
						<!-- /.row -->
							  <div class="row">
							<div class="col-sm-1">
							  </div >
								<div class="col-xs-10">
								  <div class="box box-primary">
									<div class="box-header">
									  <a href="<?php echo base_url();?>account/add_account" class="btn btn-primary btn-sm">Tambah Rekening</a>

									  <!--div class="box-tools">
										<div class="input-group input-group-sm" style="width: 200px;">
										  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

										  <div class="input-group-btn">
											<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
										  </div>

										</div>

									  </div-->
									</div>
									<!-- /.box-header -->
									<div class="box-body table-responsive no-padding">
									  <table class="table table-hover">
										<tr>
										  <th>Bank</th>
										  <th>No Rekening</th>
										  <th>Nama Pemilik Rekening</th>
										  <th>#</th>
										</tr>
										<?php 
										$account = $this->m_bank_account->get_account($user_store_id);
										foreach($account as $account){
										?>
										<tr>
										  <td><center>
											<?php switch($account->bank){
											case "bri" : echo '<img src="'.base_url().'upload/bank/bri.png" width="100px" height="100px">';break;
											case "bni" : echo '<img src="'.base_url().'upload/bank/bni.jpg" width="100px" height="100px">';break;	
											case "mandiri" : echo '<img src="'.base_url().'upload/bank/mandiri.png" width="150px" height="100px">';break;	
											case "bca" : echo '<img src="'.base_url().'upload/bank/bca.jpg" width="130px" height="80px">';break;	
											}?></center>
										  </td>
										  <td><?php echo $account->no_account;?></td>
										  <td><?php echo $account->user_account;?></td>
										  <td>
											<?php $qid = base64_encode($this->encrypt->encode($account->qid, $this->session->userdata('encrypt_key'))); ?>
											<a href="<?php echo base_url();?>account/update_account?id=<?php echo $qid;?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
											<a href="<?php echo base_url();?>account/delete_account?id=<?php echo $qid;?>" class="btn btn-danger btn-sm" onClick="return confirm('Apakah Anda benar-benar mau menghapusnya?')"><i class="fa fa-trash"></i></button>
										  </td>
										</tr>
										<?php 
										}
										?>
									  </table>
									</div>
									<!-- /.box-body -->
								  </div>
								  <!-- /.box -->
								</div>
							  </div>
					</section>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

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