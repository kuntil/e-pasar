

<!-- Main content -->
    <section class="content">
	<?php 
				$no = 1;
				foreach($order as $order) { 
					
					$user_id = base64_encode($this->encrypt->encode($order->user_id, $this->session->userdata('encrypt_key'))); 
					$order_id = base64_encode($this->encrypt->encode($order->order_id, $this->session->userdata('encrypt_key'))); 
					$store_name = base64_encode($this->encrypt->encode($order->store_name, $this->session->userdata('encrypt_key'))); 
					$store_id = base64_encode($this->encrypt->encode($order->store_id, $this->session->userdata('encrypt_key'))); 
					
				echo form_open_multipart('order/transfer');
				?>
      <div class="row">
		<!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="small-box bg-white img-bordered-sm2">
            <!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
              <table class="table table-hover">
				
				
				
					<tr>				
						<td style="width: 50px">
							Pembelian Dari :<br>
							<b ><a style="color: green;"  href="<?php echo base_url();?>product?id=<?php echo $user_id ;?>&&name=<?php echo $store_name;?>&&store_id=<?php echo $store_id;?>"><?php echo $order->store_name; ?></b></a><br><br>
							<b>Alamat :</b><br>
							<?php echo $order->address; ?><br><br>
							<b>Telp :</b><br>
							<?php echo $order->nohp; ?><br><br>
						</td>
						<td style="width: 200px">
								<b ><a style="color: green; font-size: 16px;" href="<?php echo base_url();?>invoice?order_id=<?php echo $order_id; ?>&&store_id=<?php echo $store_id;?>"><?php echo $order->order_id; ?></a></b>
								<br><br>
								Tanggal Transaksi: <b><?php echo date("d-m-Y",strtotime($order->date));?></b>  | Total: 
								<?php 
									$n = 0;
									$detail_order2= $this->m_order->detail_order_buyer($order->order_id,$this->session->userdata('user_id')); 
									foreach($detail_order2 as $detail_order2){
										$n = $n + $detail_order2->total;
									}
									echo "<b> Rp ".number_format($n,0,",",".")."</b>";
									?>
								|  Batal Otomatis: <b>1 hari</b>
								
						<p  style="float: right; text-align: right; "><button class='btn btn-default btn-xs btn-flat' class="btn btn-info" data-toggle="collapse" data-target="#demo<?php echo $order->order_id; ?>">Detail</button></p><br><br>
						
						 <div class="alert alert-success alert-dismissible">
							Menunggu Transfer Uang
						 </div>
						
						<div id="demo<?php echo $order->order_id; ?>" class="collapse">
							<p  style="float: right; text-align: right; "><button type='button' class='btn btn-default btn-xs btn-flat' data-toggle="modal" data-target="#myModal<?php echo $order->store_id; ?>">Lihat Rekening Toko</button></p>
							<table class="table table-bordered table-condensed">
								<tr>
									<td><b>No</b></td>
									<td colspan='2'><b>Nama Produk</b></td>
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
									<td style="width: 10px"><img src="<?php echo base_url();?>upload/product/<?php echo $detail_order->image2;?>"width="40" height="40" align="center"></td>
									<td><?php echo $detail_order->name;?></td>
									<td>Rp <?php echo number_format($detail_order->price,0,",",".");?></td>
									<td><?php echo number_format($detail_order->qty_order,0,",",".");?></td>
									<td>Rp <?php echo number_format($detail_order->total,0,",",".");?></td>
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
									<td colspan="5" align="center"> Total Pembayaran </td>
									<td style="color:green;"><b>Rp <?php echo number_format($n,0,",",".");?></b></td>
							</table>
							<div align="right" class="col-sm-12">
								<a href="<?php echo base_url();?>invoice?order_id=<?php echo $order_id; ?>&&store_id=<?php echo $store_id; ?>" class='btn btn-primary btn-xs btn-flat'>Lihat Invoice</a>
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
						</div>
							
							
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
					<?php echo form_open("order/ignore_order")?>
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
	  <?php $no++;
				} ?>
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