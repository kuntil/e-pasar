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
        Pengaturan Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Pengaturan Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
				<?php 	
						$message = $this->session->flashdata('notif2');
						$message2 = $this->session->flashdata('notif');
						if($message){
							echo '<p class="alert alert-danger text-center">'.$message .'</p>';
						}else if($message2){
							echo '<p class="alert alert-success text-center">'.$message2 .'</p>';
						}						
						else{
							
						}
						if($get_user_id==$this->session->userdata('user_id')){
							echo form_open_multipart("password/update_katasandi", "class='form-horizontal'");
						} /*else {
							echo form_open_multipart("profile/create_data", "class='form-horizontal'");
						}*/
				?>
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
             
			  <?php if($get_image){ ?>
			  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>upload/person/<?php echo $get_image;?>" alt="User profile picture">
			  <?php } else { ?>
			   <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>asset/dist/img/avatar5.png" alt="User profile picture">
			  <?php } ?>
              

               
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Kata Sandi</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="settings">
              
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Masukan Password Lama</label>                    
                    <div class="col-sm-9">
                      <?php echo form_input($password)?>
                      <?php echo form_input($get_password)?>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Password Baru</label>                    
                    <div class="col-sm-9">
                      <?php echo form_input($password_baru)?>
                    </div>
                  </div> 
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Ulangi Password</label>                    
                    <div class="col-sm-9">
                      <?php echo form_input($ulang_password)?>
                    </div>
                  </div>                  
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" required> Saya setuju dengan perubahan <a href="#">terms and conditions</a>
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