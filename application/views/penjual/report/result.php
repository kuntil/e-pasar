

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
						<div class='col-md-8'>&nbsp;&nbsp;&nbsp;&nbsp;
						<div class="btn-group">
							<?php echo anchor('report/add?month='.$month.'&&year='.$year.'', 
							'<button type="button" class="btn btn-success btn-flat" data-toggle="tooltip" data-placement="top" title="Cetak Laporan"><i class="fa fa-print"></i> Cetak</button>' );?>
							</div>
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
							echo form_dropdown('month',$option,$month,'class="form-control"');?>
							</div>
							<div class='col-md-5'>
							<?php 
							  
							  for($i=2016;$i<=date('Y');$i++){
								  $option2[$i] = $i;
							  }
							  
							  foreach ($option2 as $value) {
							  }
							  
							  echo form_dropdown('year',$option2,$year,'class="form-control"');
								?>
							</div>
							<div class="col-md-1"><input type="submit" name="submit" class="btn btn-info btn-flat" data-toggle="tooltip" data-placement="top" title="Cari" value="Go"></div>
						</div>
						<?php echo form_close();?>
			</div><br>
            <!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-hover">
                <tr>
                  <th style="width: 150px">Data Pembeli</th>
                  <th style="width: 350px">Produk Terjual</th>
                  <th style="width: 100px">Total Transaksi</th>
                  <th style="width: 100px">Tanggal Transaksi</th>
                  <th style="width: 100px">#</th>
                </tr>
				
				
				<?php 
				if ($order){
				$no = 1;
		
				foreach($order as $order) { 
				$qid = base64_encode($this->encrypt->encode($order->qid, $this->session->userdata('encrypt_key')));
				
				?>
					
					
					<tr>
						
						
						<td><?php echo $order->buyer_name;?><br>
													
												
						</td>
						<td style="width: 200px">
							<div class="col-sm-12">
							
										<?php $detail_order= $this->m_report->report($order->order_id,$order->user_id); 
										$no2 = 1; 
										foreach ($detail_order as $detail_order){
										?>
										<?php 
										echo $no2++.'. ';
										echo $detail_order->name;?><br>
										<?php } ?>
								<!--span class='label label-success'>Transaksi Selesai </span-->
							</div>
						</td>
						<td>
							Rp. <?php echo number_format($order->total,0,'.','.');?>
							
						</td>
						<td><?php echo date("d-m-Y",strtotime($detail_order->date)); ?></td>
						<td>
							<button type="button" name="submit" class="btn btn-success btn-xs btn-flat" data-toggle="modal" data-target="#detail<?php echo $order->qid;?>">Detail Transaksi</button></span>
							
							<div class="modal fade bs-example-modal-lg" id="detail<?php echo $order->qid;?>" role="dialog">
							  <div class="modal-dialog modal-lg">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Detail Transaksi</h4>
								  </div>
								  <div class="modal-body">
									<div class="box-body">
									 
									  
									</div><!-- /.box-body -->
									<div class="box-footer">
										
										<div class="row">
											<div class="col-xs-12">
											  <h2 class="page-header">
												<i class="fa fa-user"></i> An. <?php echo $order->buyer_name?>
												<small class="pull-right">Tanggal: <?php echo date("d-m-Y",strtotime($detail_order->date)); ?></small>
											  </h2>
											</div>
											<!-- /.col -->
										  </div>
										  <!-- info row -->
										  <div class="row invoice-info">
											<table class="table table-bordered table-condensed">
												<tr>
													<td><b>No</b></td>
													<td colspan='2'><b>Nama Produk</b></td>
													<td><b>Harga</b></td>
													<td><b>Qty</b></td>
													<td><b>Jumlah</b></td>
													
												</tr>
												<?php $detail_order= $this->m_report->report_detail($order->order_id,$order->user_id); 
												$no2 = 1; 
												foreach ($detail_order as $detail_order){
												?>
												
												
												<tr>
													<td><?php echo $no2++;?></td>
													<td style="width: 10px"><img src="<?php echo base_url();?>upload/product/<?php echo $detail_order->image2;?>"width="40" height="40" align="center"></td>
													<td><?php echo $detail_order->name;?></td>
													<td><?php echo number_format($detail_order->price,0,",",".");?></td>
													<td><?php echo number_format($detail_order->qty_order,0,",",".");?></td>
													<td><?php echo number_format($detail_order->total,0,",",".");?></td>
												</tr>
												<?php } ?>
													<?php 
													$n = 0;
													$detail_order2= $this->m_order->transaction_success_buyer($order->order_id,$order->user_id); 
													foreach($detail_order2 as $detail_order2){
														$n = $n + $detail_order2->total;
													}
													?>
													<td colspan="5" align="center"> Jumlah Yang Di Bayar </td>
													<td style="color:green;"><b><?php echo number_format($n,0,",",".");?></b></td>
											</table>
										  </div>
										  <!-- /.row -->
									
									</div>
								  
								  </div>         
								</div>
							  </div>
							</div>
						</td>	
							
					</tr>
					
					
					
				<?php $no++;
				}
				}else { ?>
					<tr>
						<td colspan="5"><center>Data Tidak Ada</center></td>
					</tr>	
				<?php
				}
					?>
              </table>
			  <div id="results"></div>
            </div>
			 <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
	  
    </section>

<script type="text/javascript">
$(document).ready(function() {
	$("#results" ).load( "<?php echo base_url();?>order/read_more"); //load initial records
	
	//executes code below when user click on pagination links
	$("#results").on( "click", ".pagination a", function (e){
		e.preventDefault();
		$(".loading-div").show(); //show loading element
		var page = $(this).attr("data-page"); //get page number from link
		$("#results").load("<?php echo base_url();?>order/read_more",{"page":page}, function(){ //get content from PHP page
			$(".loading-div").hide(); //once done, hide loading element
		});
		
	});
});
</script>
    <!-- /.content -->
  <!-- /.content-wrapper -->
  <!--footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer-->