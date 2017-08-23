<script src="<?php echo base_url();?>/asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
   $(function() {
     $('#datepicker').datepicker({
		 format:'yyyy-mm-dd',
		 autoclose: true
    });
   });
 </script>
 

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengaturan Toko
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Pengaturan Toko</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<?php 	
						$message = $this->session->flashdata('notif');
						if($message){
							echo '<p class="alert alert-success text-center">'.$message .'</p>';
						}else{}
						
						
						if($get_id==$get_store_id){
							echo form_open_multipart("address/update_data", "class='form-horizontal'");
						} else {
							echo form_open_multipart("address/create_data", "class='form-horizontal'");
						}
		?>
		
      <div class="row">
		<div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
			
			  <?php if($get_image){ ?>
					 <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>upload/store/<?php echo $get_image;?>" width='20' height='20' alt="User profile picture">
			  <?php } else { ?>
					<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>asset/dist/img/avatar5.png" width='20' height='20' alt="User profile picture">
			  <?php } ?>

              <h3 class="profile-username text-center">Logo Toko</h3>

			  <?php echo form_input($userfile)?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Pengaturan Toko</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="settings">
               
				
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Nama Toko</label>
						<?php echo form_input($id)?>
						<?php echo form_input($store_id)?>
                    <div class="col-sm-9">
						<?php echo form_input($name)?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">No HP</label>

                    <div class="col-sm-9">
						<?php echo form_input($nohp)?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Tagline Toko</label>

                    <div class="col-sm-9">
						<?php echo form_input($tagline)?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Alamat Lengkap</label>

                    <div class="col-sm-9">
						<?php echo form_textarea($desc)?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-3 control-label">Kode Pos</label>

                    <div class="col-sm-3">
						<?php echo form_input($kode_pos)?>
                    </div>
                  </div>
                  
                  
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" required> Saya Setuju <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Simpan</button>
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
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>