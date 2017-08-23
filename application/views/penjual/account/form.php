<script src="<?php echo base_url();?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><!--<i class="fa fa-dashboard">--></i> Home</a></li>
        <li> <a href="<?php echo base_url();?>product">Produk</a></li>
        <li class="active">Tambah Produk</li>
      </ol>
      <!-- search form -->
      <!--form action="#" method="get" >
        <div class="input-group col-lg-3 ">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form-->
      <!-- /.search form -->
    </section>
	
	<section class="content-header">
      <h1>
        Tambah No Rekening Bank di "<?php echo $user_store_name?>"
        <!--<small>Control panel</small>-->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	  <?php 
			$message = $this->session->flashdata('notif');
						if($message){
							echo '<p class="alert alert-success text-center">'.$message .'</p>';
						}else{}
			
			$qid2 = base64_encode($this->encrypt->encode($qid, $this->session->userdata('encrypt_key')));			
						
			if($this->uri->segment(2)=="add_account"){
				echo form_open('account/insert_account');
			}else if($this->uri->segment(2)=="update_account"){
				echo form_open('account/edit_account?id='.$qid2);
			}
	  ?>
			
		<div class="row">
			<div class="col-lg-2">	
			</div> 
			
			<div class="col-lg-8">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Informasi Produk</h3>
					</div>
				
					<div class="box-body">
						<div class="form-group">
							<?php echo form_input($store_id)?>
						</div>
						<div class="form-group col-sm-6">
							<label>Bank</label>
						  <?php $option = array(
									''=>'- Pilih Bank-',
									'bri'=>'BRI',
									'bni'=>'BNI',
									'mandiri'=>'Mandiri',
									'bca'=>'BCA'
							);
						echo form_dropdown($bank,$option,$get_bank);?>
						</div>
						<div class="form-group col-sm-6">
							<label>No Rekening</label>
							<?php echo form_input($no_account)?>
						</div>
						<div class="form-group col-sm-6">
						</div>
						<div class="form-group col-sm-6">
							<label>Volume</label>
							<?php echo form_input($user_account)?>
						</div>
						
					</div>
				  <!-- /.box-body -->

				  <div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="<?php echo base_url();?>profile" class="btn btn-warning">Kembali</a>
				  </div>
				
				</div>
			</div>
		</div>
		<?php echo form_close();?>
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://technos-studio.com/">Techno's Studio</a>.</strong> All rights
    reserved.
  </footer>
 <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>