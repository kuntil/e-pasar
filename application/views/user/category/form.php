<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <ol class="breadcrumb">
        <li><a href="#"><!--<i class="fa fa-dashboard">--></i> Home</a></li>
        <li class="active">Kategori</li>
      </ol>
      <!-- search form -->
      <form action="#" method="get" >
        <div class="input-group col-lg-3 ">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
    </section>
	
	<section class="content-header">
      <h1>
        Tambah Kategori di "<?php echo $store_id['name'];?>"
        <!--<small>Control panel</small>-->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	  <?php 
			if($this->uri->segment(2)=="add_category"){
				echo form_open_multipart('category/insert_category');
			}else if($this->uri->segment(2)=="update_category"){
				echo form_open_multipart('category/edit_category/'.$this->uri->segment(3));
			}
			?>
		<div class="row">
			<div class="col-lg-12 col-xs-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Informasi Tambahan Produk</h3>
					</div>
				
					<div class="box-body">
						<div class="form-group">
						  <label>Nama Kategori</label>
						  <?php echo form_input($category_id)?>
						  <?php echo form_input($category_name)?>
						</div>
					</div>
				  <!-- /.box-body -->

				  <div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="<?php echo base_url();?>category" class="btn btn-warning">Kembali</a>
				  </div>
				
				</div>
			</div>
		</div>
		<?php echo form_close();?>
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