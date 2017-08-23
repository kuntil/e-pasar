<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <ol class="breadcrumb">
        <li><a href="#"><!--<i class="fa fa-dashboard">--></i> Home</a></li>
        <li class="active">Dashboard</li>
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
        Detail Promo di "<?php echo $user_store_name?>"
        <!--<small>Control panel</small>-->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	  <form>
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-warning box-solid">
					<div class="box-header with-border">
					  <h3 class="box-title">Detail Promo "<?php echo $get_name;?>"</h3>

					  <div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					  </div>
					  <!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
							<div class="col-lg-6">
								<h2><?php echo $get_name;?>
								<!--br><span class="badge bg-blue">Kategori : <!--?php echo $get_category_name;?></span><br-->
								<h6></h6>
								<br><img src="<?php echo base_url()."upload/product/".$image?>" width="500" height="400" style="width: 100%;max-height: 100%">
							
							</div>
							<div class="col-lg-6">
								<br><h2>Produk Promo:<br>
								<h4><?php echo $get_note;?></h4>
								<h2>Deskripsi/Penjelasan Produk:<br>
								<h4><?php echo $get_desc;?></h4>
								
								<br><h2>Catatan:<br>
								<h4><?php echo $get_note;?></h4>
								<br><h2>Harga: <?php echo "Rp. ".number_format($get_price,0,'.','.')?><br>
								<br>
							
							</div>
							<a href="<?php echo base_url();?>promo" class="btn btn-warning">Kembali</a>
					
					  
					</div>
					<!-- /.box-body -->
				</div>
			</div> 
			
			
		</div>
		</form>
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