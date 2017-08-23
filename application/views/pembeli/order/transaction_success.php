

<!-- Main content -->
    <section class="content">
				<?php 
				$no = 1;
				foreach($order as $order) { 
				
					$user_id = base64_encode($this->encrypt->encode($order->user_id, $this->session->userdata('encrypt_key'))); 
					$order_id = base64_encode($this->encrypt->encode($order->order_id, $this->session->userdata('encrypt_key'))); 
					$store_name = base64_encode($this->encrypt->encode($order->store_name, $this->session->userdata('encrypt_key'))); 
					$store_id = base64_encode($this->encrypt->encode($order->store_id, $this->session->userdata('encrypt_key'))); 
					 
					$transaction_success = $this->m_transaction_success->my_list_order_buyer($this->session->userdata('user_id'),$order->order_id); 
					 
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
							Pembelian Dari :<br>
							<b ><a style="color: green;"  href="<?php echo base_url();?>product?id=<?php echo $user_id ;?>&&name=<?php echo $store_name;?>&&store_id=<?php echo $store_id;?>"><?php echo $order->store_name; ?></b></a><br><br>
							<b>Alamat :</b><br>
							<?php echo $order->address; ?><br><br>
							<b>Telp :</b><br>
							<?php echo $order->nohp; ?><br><br>
						<td style="width: 200px">
								<b ><a style="color: green; font-size: 16px;" href="<?php echo base_url();?>invoice?order_id=<?php echo $order_id; ?>&&store_id=<?php echo $store_id;?>"><?php echo $order->order_id; ?></a></b>
								<br><br>
								
								Tanggal Transaksi: <b><?php echo date("d-m-Y",strtotime($order->date2)); ?></b>  | Total: 
								<?php 
									$n = 0;
									$detail_order2= $this->m_order->transaction_success_buyer($order->order_id,$this->session->userdata('user_id')); 
									foreach($detail_order2 as $detail_order2){
										$n = $n + $detail_order2->total;
									}
									echo "<b> Rp ".number_format($n,0,",",".")."</b>";
									?>
								
								<p  style="float: right; text-align: right; "><button class='btn btn-default btn-xs btn-flat' class="btn btn-info" data-toggle="collapse" data-target="#demo<?php echo $order->order_id; ?>">Detail</button></p><br><br>
								
								
								<?php echo form_input($qty['qid'],$order->qid)?>	
								<?php echo form_input($qty['user_id'],$order->user_id)?>	
								<?php echo form_input($qty['order_id'],$order->order_id)?>	
								<?php echo form_input($qty['store_id'],$order->store_id)?>
								
								<div class='alert alert-success alert-dismissible'>Transaksi Selesai</div>
								
									
						<div id="demo<?php echo $order->order_id; ?>" class="collapse">	
							<table class="table table-bordered table-condensed">
								<tr>
									<td><b>No</b></td>
									<td colspan='2' ><b>Nama Produk</b></td>
									<td><b>Harga</b></td>
									<td><b>Qty</b></td>
									<td><b>Jumlah</b></td>
									
								</tr>
								<?php $detail_order= $this->m_order->transaction_success_buyer($order->order_id,$this->session->userdata('user_id')); 
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
									$detail_order2= $this->m_order->transaction_success_buyer($order->order_id,$this->session->userdata('user_id')); 
									foreach($detail_order2 as $detail_order2){
										$n = $n + $detail_order2->total;
									}
									?>
									<?php echo form_input($qty['total'],$n)?>	
									<td colspan="5" align="center"> Jumlah Yang Di Bayar </td>
									<td style="color:green;"><b><?php echo number_format($n,0,",",".");?></b></td>
							</table>
						</div>	
						</td>
					</tr>
				
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