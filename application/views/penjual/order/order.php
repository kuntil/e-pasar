

<!-- Main content -->
    <section class="content">
		<?php 
				$no = 1;
				foreach($order as $order) { 
				$qid = base64_encode($this->encrypt->encode($order->qid, $this->session->userdata('encrypt_key')));
				
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
                  <th style="width: 10px">#</th>
                  <th style="width: 250px">Data Pembeli</th>
                  <th style="width: 350px" colspan='2'>Produk</th>
                  <th style="width: 100px">Harga</th>
                  <th style="width: 100px">Jumlah</th>
                  <th style="width: 100px">Total</th>
                  <th style="width: 10px">#</th>
                </tr>
				
				
			
					
					 <?php echo form_open('order/accept_order');?>
					<tr>
						
						<td>
							<a href="<?php echo base_url();?>order/delete_order?id=<?php echo $qid;?>" class="btn btn-danger btn-xs btn-flat" onClick=\'return confirm("Apakah anda ingin menghapus produk ini?")\'><i class="fa fa-close"></i></a>
						</td>
						<td><?php echo $order->buyer_name;?><br><br>
							<?php echo $order->address;?>
							<?php echo form_input($qty['qid'],$order->qid)?>	
							<?php echo form_input($qty['user_id'],$order->user_id)?>	
							<?php echo form_input($qty['product_id'],$order->product_id)?>	
							<?php echo form_input($qty['store_id'],$order->store_id)?>
							<?php echo form_input($qty['date'],$order->date)?>
							<?php echo form_input($qty['price'],$order->price)?>
							<?php echo form_input($qty['qty'],$order->qty_order)?>						
						</td>
						<td style="width: 100px">
							<img src="<?php echo base_url();?>upload/product/<?php echo $order->image2;?>"width="80" height="80" style="width: 100%;max-height: 100%" align="center">
						</td>
						<td style="width: 200px">
							<div class="col-sm-12">
								<b><?php echo $order->name;?></b>
							</div>
							<div class="col-sm-12">
							</div>
							<div class="col-sm-5">
									<div style="float: left; text-align: left; ">Volume/Berat</div>
							</div>
							<div class="col-sm-7">
									<div style="float: left; text-align: left; ">: <?php echo $order->volume;?> <?php echo $order->satuan;?></div>
							</div>
							<div class="col-sm-12">
							</div>
							<div class="col-sm-5">
									<div style="float: left; text-align: left; ">Jumlah stok</div>
							</div>
							<div class="col-sm-7">
									<div style="float: left; text-align: left; ">: <?php echo $order->qty;?></div>
							</div>
							<?php if($this->uri->segment(2)=="accept_order") {?>
							
									<div class="col-sm-12">
									</div><br><br><br><br>
									<div class="col-sm-5">
											<div style="float: left; text-align: left; ">Status :</div>
									</div>
									<div class="col-sm-12">
										<?php 
											if (count($transfer)!=0){
												echo "<span class='label label-success'>Uang Telah Di Transfer</span><br>";
												echo "<span class='label label-default'>Menunggu Transfer Uang</span><br>";
											} else {
												echo "<span class='label label-warning'>Menunggu Transfer Uang</span><br>";
											}
										?>
											
									</div>
									
							<?php } else {?>
							<?php } ?>
						</td>
						<td>
							Rp. <?php echo number_format($order->price,0,'.','.');?>
							
						</td>
						<td><?php echo $order->qty_order;?></td>
						<td>Rp. <?php echo number_format($order->total,0,'.','.');?></span>
						</td>
					
					<?php if($this->uri->segment(2)=="accept_order") {?>
						
					<?php } else {?>
						<td>
							<button type="submit" name="submit" class="btn btn-success btn-xs btn-flat" >Terima Orderan</button>
						</td>
					<?php } ?>
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
				}
			?>
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