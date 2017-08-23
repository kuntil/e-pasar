

<!-- Main content -->
    <section class="content">
		<?php 
		
		if ($order){
		
				$no = 1;
				foreach($order as $order) { 
					
					 ?>
					 
			  <div class="row">
				
				<!-- left column -->
				<div class="col-md-12">
				  <!-- general form elements -->
				  <div class="small-box bg-white img-bordered-sm2">
					 
					<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
				  
					  <table class="table table-bordered table-hover">
							<tr>				
								<td style="width: 50px">
									Nama Pembeli :<br>
									<b style="color: green;"><?php echo $order->buyer_name; ?></b><br><br>
									<b>Alamat :</b><br>
									<?php echo $order->address; ?><br><br>
									<b>Telp :</b><br>
									<?php echo $order->nohp; ?><br><br>
								</td>
								<td style="width: 200px">
									<b style="color: green; font-size: 16px;"><?php echo $order->order_id; ?></a></b><br>
									
									<p  style="float: right; text-align: right; "><button class='btn btn-default btn-xs btn-flat' class="btn btn-info" data-toggle="collapse" data-target="#demo<?php echo $order->order_id; ?>">Detail</button></p><br><br>
								
									 <div class="alert alert-success alert-dismissible">
										Transaksi Selesai
									 </div>
									 
								<div id="demo<?php echo $order->order_id; ?>" class="collapse">
									<table class="table table-bordered table-condensed">
										<tr>
											<td><b>No</b></td>
											<td colspan='2'><b>Nama Produk</b></td>
											<td><b>Harga</b></td>
											<td><b>Qty</b></td>
											<td><b>Jumlah</b></td>
											
										</tr>
										<?php $detail_order= $this->m_order->transaction_success_buyer($order->order_id,$order->user_id); 
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
								</td>
							</tr>
					
							
							 <?php echo form_close();?>
							
						
					  </table>
					</div>
					 <!-- /.box-body -->
				  </div>
				  <!-- /.box -->
				</div>
				<!--/.col (left) -->
			  </div>
			  <!-- /.row -->
	  <?php $no++;
				}
		} else {				?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> Data Tidak Ada!</h4>
				</div>
		<?php } ?>
    </section>

    <!-- /.content -->
  <!-- /.content-wrapper -->
  <!--footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer-->