<script src="<?php echo base_url();?>/asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
   $(function() {
     $('#datepicker').datepicker({
		 format:'yyyy-mm-dd',
		 autoclose: true
    });
   });
   
    $(function() {
     $('#datepicker2').datepicker({
		 format:'yyyy-mm-dd',
		 autoclose: true
    });
   });
   
   $(function() {
     $('.clockpicker').clockpicker({
		 donetext: 'Done'
	 });
   });
   
   $(function() {
     $('.clockpicker1').clockpicker({
		 donetext: 'Done'
	 });
   });
 </script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><!--<i class="fa fa-dashboard">--></i> Home</a></li>
        <li class="active">Dashboard</li>
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
         Tambah Promo di "<?php echo $user_store_name?>"
        <!--<small>Control panel</small>-->
      </h1>
    </section>

    <!-- Main content -->
	
	
	
      <section class="content">
	   <?php 
			$message = $this->session->flashdata('notif');
						if($message){
							echo '<p class="alert alert-success text-center">'.$message .'</p>';
						}else{}
						
			$catalog_id2 = base64_encode($this->encrypt->encode($catalog_id, $this->session->userdata('encrypt_key')));
						
			if($this->uri->segment(2)=="add_promo"){
				echo form_open_multipart('promo/insert_promo');
			}else if($this->uri->segment(2)=="update_promo"){
				echo form_open_multipart('promo/edit_promo?id='.$catalog_id2);
			}
	  ?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Masukan Promo Toko Anda</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
			  
					<?php echo form_input($user_id)?>
					<?php echo form_input($store_id)?>
                <div class="form-group">
                  <label>Nama Toko</label>
                  <?php echo form_input($store_name)?>
                </div>
				<div class="form-group">
                 <label>Produk</label>
					<?php echo form_dropdown("katalog[]", $category_name, $get_category_name,'class="form-control select2"  multiple="multiple"  required');?>
                  
                </select>
                </div>
				<div class="form-group">
                  <div class="form-group">
					<label>Nama Promo</label>
					<?php echo form_input($nama_promo)?>
					</div>
                </div>
				 <div class="form-group">
					<label>Deskripsi</label>
					<?php echo form_textarea($desc)?>
					</div>
				<div class="form-group">
                  <div class="form-group">
					<label>Jumlah</label>
					<?php echo form_input($qty)?>
					</div>
                </div>
					<div class="form-group">
                  <label for="exampleInputFile">Gambar</label>
						   <?php echo form_input($userfile)?>
						  <p class="help-block">Gambar Promo Anda.</p>
						   <?php 
							if($this->uri->segment(2)=="update_promo"){ ?>
								<br><img src="<?php echo base_url()."upload/product/".$image?>" width="300" height="300">
							<?php }else{}
					  ?>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
			  <div class="form-group">
					<label>Harga</label>
					<?php echo form_input($price)?>
                </div>
                <div class="form-group">
					<label>Valid Dari Tanggal</label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
							<?php echo form_input($valid_date_from)?>
					</div>
                </div>
				 <div class="form-group">
					<label>Valid Sampai Tanggal</label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
							<?php echo form_input($valid_date_to)?>
					</div>
                </div>
				<div class="form-group">
					<label>Valid Dari Jam</label>
					<div class="input-group">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-time"></span>
						</span>
						<?php echo form_input($valid_time_from)?>
					</div>
                </div>
                <div class="form-group">
					<label>Valid Sampai Jam</label>
					<div class="input-group">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-time"></span>
						</span>
						<?php echo form_input($valid_time_to)?>
					</div>
                </div>				
				 <div class="form-group">
					<label>Catatan</label>
					<?php echo form_textarea($note)?>
                </div>
				

                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
				<a href="<?php echo base_url();?>promo" class="btn btn-warning">Kembali</a>
              </div>
              <!-- /.box-footer -->
            <?php echo form_close();?>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
          
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
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