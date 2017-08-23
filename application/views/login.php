<!-- Content Wrapper. Contains page content -->
  <!--div class="">
    
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) --><br><br>
      <div class="row">
		  <div class="col-lg-4 ">
		  </div>
        <div class="col-lg-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-warning"></i>

              <h3 class="box-title">Login</h3>
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
                <form action="<?php echo base_url();?>login/login" method="post">
				  <div class="form-group has-feedback">
					<input type="text" name="username" class="form-control" placeholder="Nama" required>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				  </div>
				  <div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				  </div>
					<div class="col-xs-8">
					  <div class="checkbox icheck">
						<label>
						  <input type="checkbox" name="remember"> Ingat saya
						</label>
					  </div>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
					  <button type="submit" class="btn btn-danger btn-block btn-flat">Masuk</button>
					</div>
					<!-- /.col -->
				</form>
				<br><br>
				<!-- /.social-auth-links -->

				<!--<a href="#">I forgot my password</a><br-->
				Belum Punya Akun ?<a href="<?php echo base_url();?>register" class="text-center"> Buat Akun</a>
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