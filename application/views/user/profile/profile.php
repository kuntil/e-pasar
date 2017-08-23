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
              <h5 class="widget-user-desc">Toko <?php echo $user_store_name?></h5>
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
            </ul>
            <div class="tab-content">
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
                    <label for="inputSkills" class="col-sm-3 control-label">Pekerjaan</label>

                    <div class="col-sm-9">
                      <?php echo form_input($job)?>
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