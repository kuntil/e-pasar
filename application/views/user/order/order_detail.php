

<!-- Main content -->
    <section class="content">
      <div class="row">
		<div class="col-md-2">
		</div>
		<!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
              <div class="box-header with-border">
              <h3 class="box-title"> Detail Transaksi</h3>
            </div>
            <!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-hover">
                <tr>
                  <th>No</th>
                  <th style="width: 1000px" colspan='2'>Detail Transaksi</th>
                </tr>
				
				
				<?php 
				$no = 1;
				foreach($order as $order) { 
				//$qid = base64_encode($this->encrypt->encode($order->qid, $this->session->userdata('encrypt_key')));
				
				echo form_open_multipart('transfer/transfer');
				?>
					<tr>
						<!--
									-->			
						<td style="width: 10px">
							<?php echo $no;?>
						</td>					
						<td style="width: 50px">
							<?php if ($order->image) {?>
								<img src="<?php echo base_url();?>upload/store/<?php echo $order->image;?>"width="80" height="80" style="width: 100%;max-height: 100%" align="center">
							<?php } else {?>
								<img src="<?php echo base_url();?>upload/store/shop.png"width="80px" height="120px" style="width: 100%;max-height: 100%" align="center">
							<?php }?>
							
						</td>
						<td style="width: 200px">
							<div class="col-sm-8">
								<b><?php echo $order->store_name; ?></b><br>
								<b><?php echo $order->address; ?></b><br><br>
							</div>
							
							<table class="table table-bordered">
								<tr>
									<td><b>No</b></td>
									<td><b>Nama Produk</b></td>
									<td><b>Harga</b></td>
									<td><b>Qty</b></td>
									<td><b>Jumlah</b></td>
									
								</tr>
								<?php $detail_order= $this->m_order->detail_order_buyer($order->order_id,$this->session->userdata('user_id')); 
								$no2 = 1; 
								foreach ($detail_order as $detail_order){
								?>
								<?php echo form_input($qty['qid'],$detail_order->qid)?>	
								<?php echo form_input($qty['user_id'],$detail_order->user_id)?>	
								<?php echo form_input($qty['order_id'],$detail_order->order_id)?>	
								<?php echo form_input($qty['store_id'],$detail_order->store_id)?>
								
								<tr>
									<td><?php echo $no2++;?></td>
									<td><?php echo $detail_order->name;?></td>
									<td><?php echo number_format($detail_order->price,0,",",".");?></td>
									<td><?php echo number_format($detail_order->qty_order,0,",",".");?></td>
									<td><?php echo number_format($detail_order->total,0,",",".");?></td>
								</tr>
								<?php } ?>
									<?php 
									$n = 0;
									$detail_order2= $this->m_order->detail_order_buyer($order->order_id,$this->session->userdata('user_id')); 
									foreach($detail_order2 as $detail_order2){
										$n = $n + $detail_order2->total;
									}
									?>
									<?php echo form_input($qty['total'],$n)?>	
									<td colspan="4" align="center"> Jumlah Yang Harus Di Bayar </td>
									<td style="color:green;"><b><?php echo number_format($n,0,",",".");?></b></td>
							</table>
							<!--div class="col-sm-12">
							</div>
							<div class="col-sm-4">
									<div style="float: left; text-align: left; ">Volume/Berat Per Stok</div>
							</div>
							<div class="col-sm-8">
									<div style="float: left; text-align: left; ">: <?php echo $order->volume;?> <?php echo $order->satuan;?></div>
							</div>
							<div class="col-sm-12">
							</div>
							<div class="col-sm-4">
									<div style="float: left; text-align: left; ">Jumlah Stok Yang Di Beli</div>
							</div>
							<div class="col-sm-8">
									<div style="float: left; text-align: left; ">: <?php echo $order->qty_order;?></div>
							</div>
							<div class="col-sm-12">
							</div>
							<div class="col-sm-4">
									<div style="float: left; text-align: left; ">Jumlah Yang Harus Di Bayar</div>
							</div>
							<div class="col-sm-8">
									<div style="float: left; text-align: left; ">: Rp. <?php echo number_format($order->total,0,'.','.');?></div>
							</div-->
							<div align="right" class="col-sm-12">
								<a href="<?php echo base_url();?>invoice" class='btn btn-primary btn-xs btn-flat'>Lihat Invoice</a>
								<button id='button<?php echo $no;?>' type='button' class='btn btn-success btn-xs btn-flat'>bayar</button>
							</div>
							<div class="col-sm-4" id="fn<?php echo $no;?>" hidden>
							  <?php echo form_input($qty['userfile']);?>
							</div>
							<div class="col-sm-8" id="ln<?php echo $no;?>" hidden>
							  <button type='submit' class='btn btn-success btn-xs btn-flat' >Unggah Bukti Transfer</button>
							</div>
							
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
							<script>
								$("#button<?php echo $no;?>").click(function() {
								  $("#fn<?php echo $no;?>").show();
								  $("#ln<?php echo $no;?>").show();
								});
							</script>
							
							<!--div class="col-sm-12">
							</div>
							<div class="col-sm-4">
								Nama Toko 
							</div>
							<div class="col-sm-4">
								: <?php echo $order->buyer_name;?>
							</div>
							<div align="right" class="col-sm-4">
								<button type='button' class='btn btn-primary btn-xs btn-flat' data-toggle="modal" data-target="#myModal<?php echo $order->store_id; ?>">Nomor Rekening</button>
							</div>
							<div class="col-sm-4">
								Alamat 
							</div>
							<div class="col-sm-8">
								: <?php echo $order->address;?>
							</div>
							<br><br--> 
							
						</td>
					</tr>
				
				<div class="container">		
					<!-- Modal -->
					
					<?php 
					$account = $this->m_bank_account->get_account($order->store_id);
					?>
						<div id="myModal<?php echo $order->store_id?>" class="modal fade modal"" role="dialog">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">No Rekening</h4>
							  </div>
							  <div class="modal-body">
								<?php 
								foreach($account as $account){ ?>
								
									<div class="col-sm-2">
									</div>
									<div class="col-sm-4">
										<?php switch($account->bank){
											case "bri" : echo '<img src="'.base_url().'upload/bank/bri.png" width="100px" height="100px">';break;
											case "bni" : echo '<img src="'.base_url().'upload/bank/bni.jpg" width="100px" height="100px">';break;
											case "mandiri" : echo '<img src="'.base_url().'upload/bank/mandiri.png" width="150px" height="100px">';break;	
											case "bca" : echo '<img src="'.base_url().'upload/bank/bca.jpg" width="130px" height="80px">';break;	
										}?>
										
									</div>
									<br>
									<b><?php echo strtoupper($account->bank);?></b><br>
									<?php echo $account->user_account?><br>
									<?php echo $account->no_account?><br>
									<br>
								<?php } ?>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
							  </div>
							</div>
							<!-- /.modal-content -->
						  </div>
						</div>
					<?php echo form_close();?>
				</div>
					
					 <?php echo form_close();?>
					
				<?php $no++;
				} ?>
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