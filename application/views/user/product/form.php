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
        Tambah Produk di "<?php echo $user_store_name?>"
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
						
			$product_id2 = base64_encode($this->encrypt->encode($product_id, $this->session->userdata('encrypt_key')));
						
			if($this->uri->segment(2)=="add_product"){
				echo form_open_multipart('product/insert_product');
			}else if($this->uri->segment(2)=="update_product"){
				echo form_open_multipart('product/edit_product?id='.$product_id2);
			}
	  ?>
			
		<div class="row">
			<div class="col-lg-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Informasi Produk</h3>
					</div>
					<!--Hidden Form-->
					<?php echo form_input($user_id)?>
					<?php echo form_input($store_id)?>
					<?php echo form_input($store_name)?>
					<div class="box-body">
						<div class="form-group">
						  <label>Nama Produk</label>
						  <?php echo form_input($name)?>
						</div>
						<div class="form-group">
						  <label>Deskripsi/Penjelasan Produk</label>
						  <?php echo form_textarea($desc)?>
						</div>
						<div class="form-group">
						  <label>Catatan</label>
						   <?php echo form_textarea($note)?>
						</div>
					</div>
				</div>
			</div> 
			
			<div class="col-lg-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Informasi Tambahan Produk</h3>
					</div>
				
					<div class="box-body">
						<div class="form-group">
						  <label>Kategori Produk</label>
						  <?php echo form_dropdown("category[]", $category_name, $get_category_name,'class="form-control select2"  multiple="multiple"  required');?>
						</div>
						<div class="form-group">
						  <label>Harga Produk</label>
						  
						  <?php echo form_input($price)?>
						</div>
						<div class="form-group">
						  <label for="exampleInputFile">File Gambar Produk</label>
						   <?php echo form_input($userfile)?>
						  <p class="help-block">Gambar Produk Jualan.</p>
						   <?php 
							if($this->uri->segment(2)=="update_product"){ ?>
								<br><img src="<?php echo base_url()."upload/product/".$image1?>" width="300" height="300">
							<?php }else{}
					  ?>
						</div>
						 <div class="form-group">
		                  <label>Premium</label>
		                  <select name="premium" class="form-control">
		                  	<option>- Silahkan Pilih -</option>  
		                    <option value="Y">Ya</option>
		                    <option value="N">Tidak</option>		                    
		                  </select>
		                </div>
					</div>
				  <!-- /.box-body -->

				  <div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="<?php echo base_url();?>product" class="btn btn-warning">Kembali</a>
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