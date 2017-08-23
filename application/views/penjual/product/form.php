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
        Tambah Produk di "<?php echo $user_store_name?>"
        <!--<small>Control panel</small>-->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	  
		<?php if($this->session->flashdata('message')){ ?>
			<div class="alert alert-danger alert-dismissible">
			<?php echo $this->session->flashdata('message'); ?>
			</div>
		<?php }?>
      
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
				<div class="box box-primary box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Informasi Produk</h3>
					</div>
					<!--Hidden Form-->
					<?php echo form_input($user_id)?>
					<?php echo form_input($store_id)?>
					<?php echo form_input($store_name)?>
					<div class="box-body">
						<div class="form-group col-sm-12">
						  <label>Nama Produk</label>
						  <?php echo form_input($name)?>
						</div>
						<div class="form-group col-sm-12">
						  <label>Deskripsi/Penjelasan Produk</label>
						  <?php echo form_textarea($desc)?>
						</div>
					</div>
				</div>
			</div> 
			
			<div class="col-lg-6">
				<div class="box box-primary box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Informasi Produk</h3>
					</div>
				
					<div class="box-body">
						<div class="form-group col-sm-12">
						  <label>Kategori Produk</label>
						  <?php echo form_dropdown("category[]", $category_name, $get_category_name,'class="form-control select2"  multiple="multiple" ');?>
						</div>
						<div class="form-group col-sm-6">
							<label>Harga Produk</label>
							<?php echo form_input($price)?>
						</div>
						<div class="form-group col-sm-6">
							<label>Jumlah Produk</label>
							<?php echo form_input($qty)?>
						</div>
						<div class="form-group col-sm-6">
							<label>Satuan</label>
							<?php $option = array(
									''=>'- Pilih Satuan-',
									'Buah'=>'Buah',
									'Ekor'=>'Ekor',
									'Kg'=>'Kg',
									'Liter'=>'Liter',
									'Ton'=>'Ton'
							); 
							echo form_dropdown($satuan,$option,$get_satuan);?>
						</div>
						<div class="form-group col-sm-6">
							<label>Volume</label>
							<?php echo form_input($volume)?>
						</div>
						
						<div class="form-group col-sm-6">
						</div>
						
						<div class="form-group col-sm-6">
							<label>Min. Pemesanan</label>
							<?php echo form_input($min_order)?>
						</div>
						
						<div class="form-group col-sm-6">
						  <label for="exampleInputFile">File Gambar Produk</label>
						   <?php echo form_input($userfile)?>
						  <p class="help-block">Gambar Produk Jualan.</p>
						   <?php 
							if($this->uri->segment(2)=="update_product"){ ?>
								<br><img src="<?php echo base_url()."upload/product/".$image1?>" width="300" height="300">
							<?php }else{}
					  ?>
						</div>
					</div>
				  <!-- /.box-body -->

				  <div class="box-footer ">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="<?php echo base_url();?>" class="btn btn-danger">Kembali</a>
				  </div>
				
				</div>
			</div>
		</div>
		<?php echo form_close();?>
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
 <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>