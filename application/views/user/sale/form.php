<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <ol class="breadcrumb">
        <li><a href="#"><!--<i class="fa fa-dashboard">--></i> Home</a></li>
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
        Laporan Transaksi di "<?php echo $user_store_name?>"
        <!--<small>Control panel</small>-->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->	
		<?php echo form_open('report');?>	
		<div class="row">
			<div class="col-lg-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">laporan Transaksi</h3>
					</div>
					<?php echo form_input($store_id)?>
					<div class="box-body">
						<div class="form-group">
						  <label>Tahun</label>
						  <?php 
						  
						  for($i=2017;$i<=date('Y');$i++){
							  $option[$i] = $i;
						  }
						  
						  foreach ($option as $value) {
						  }
						  
						  echo form_dropdown($year,$option,date('Y'));
							?>
						</div>
						<div class="form-group">
						  <label>Bulan</label>
						  <?php $option = array(
									'1'=>'Januari',
									'2'=>'Februari',
									'3'=>'Maret',
									'4'=>'April',
									'5'=>'Mei',
									'6'=>'Juni',
									'7'=>'Juli',
									'8'=>'Agustus',
									'9'=>'September',
									'10'=>'Oktober',
									'11'=>'November',
									'12'=>'Desember'
							); 
							echo form_dropdown($month,$option,date('m'));?>
						  
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