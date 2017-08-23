<!-- Content Wrapper. Contains page content -->
  <!--div class="">
    
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) --><br><br>
      <div class="row">
		  <div class="col-lg-4 col-xs-6">
		  </div>
        <div class="col-lg-4 col-xs-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-warning"></i>

              <h3 class="box-title">Registrasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			
				<?php
					$message = $this->session->flashdata('notif');
					$message2 = $this->session->flashdata('notif2');
					if($message){
						echo '<p class="alert alert-danger text-center">'.$message .'</p>';	
					}else if ($message2){
						echo '<p class="alert alert-success text-center">'.$message2 .'</p>';	
					}else{
						
					}
				?>
				
                <form action="<?php echo base_url();?>register/create_data" method="post">
				  <div class="form-group has-feedback">
					<?php echo form_error('username'); ?>
					<input type="text" name="username" class="form-control" placeholder="Nama" required>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<?php echo form_error('email'); ?>
					<input type="email" name="email" class="form-control" placeholder="Email" required>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<?php echo form_error('password'); ?>
					<input type="password" name="password" maxlength="30" class="form-control" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<?php echo form_error('ulang_password'); ?>
					<input type="password" name="ulang_password" maxlength="30" class="form-control" placeholder="Ulangi Password" required>
					<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<select name="type" class="form-control" required >
						<option value = "">- Pilih User -</option>
						<option value = "1"> Penjual</option>
						<option value = "2"> Pembeli</option>
					</select>
					<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
				  </div>
				  
					<div class="col-xs-8">
					  <div class="checkbox icheck">
						<label>
						  <input type="checkbox" required> Saya Setuju <a href="<?php echo base_url();?>Terms/terms"  target="_blank">terms</a>
						</label>
					  </div>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
					  <button type="submit" class="btn btn-danger btn-block btn-flat">Registrasi</button>
					</div>
					<!-- /.col -->
				</form>
              
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- ./col -->
      <!--/div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
  <!--/div>
  <!-- /.content-wrapper -->
  <!--footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer-->