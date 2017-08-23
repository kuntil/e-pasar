

<!-- Main content -->
    <section class="content">
      <div class="row">
		
		<!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
              <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-money"></i> Histori Transaksi</h3>
            </div><br>
			<div class=row>
						<?php echo form_open("report/find");?>
						<div class='col-md-8'>
							</div>
						<div class="col-md-4" align='right'>
							
							<div class='col-md-5'>
							<?php $option = array(
									''=>'- Pilih Bulan -',
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
							echo form_dropdown('month',$option,'','class="form-control"');?>
							</div>
							<div class='col-md-5'>
							<?php 
							  
							  for($i=2016;$i<=date('Y');$i++){
								  $option2[$i] = $i;
							  }
							  
							  foreach ($option2 as $value) {
							  }
							  
							  echo form_dropdown('year',$option2,date('Y'),'class="form-control"');
								?>
							</div>
							<div class="col-md-1"><input type="submit" name="submit" class="btn btn-info btn-flat" title="Cari Data" value="Go"></div>
						</div>
						<?php echo form_close();?>
			</div><br>
            <!-- /.box-header -->
				
			 <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
	  
    </section>