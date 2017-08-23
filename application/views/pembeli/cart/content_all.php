

<!-- Main content -->
    <section class="content">
      <div class="row">
		
		<!-- left column -->
        <div class="col-md-12">
		<?php if($this->session->flashdata('message')){ ?>
			<div class="alert alert-warning alert-dismissible">
			<?php echo $this->session->flashdata('message'); ?>
			</div>
		<?php }?>
        </div>
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
              <div class="box-header with-border">
              <h3 class="box-title"> Keranjang Belanja</h3>
            </div>
            <!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-hover">
                <tr>
                  <th style="width: 10px">No</th>
                  <th style="width: 100px"></th>
                  <th style="width: 300px">Produk</th>
                  <th style="width: 300px">Harga</th>
                  <th style="width: 300px">Jumlah</th>
                  <th style="width: 300px">Total</th>
                  <th style="width: 10px">#</th>
                </tr>
				
					 <?php echo form_open('check_out/create_check_out');?>
				
				<?php 
				$no = 1;
				foreach($cart as $cart) { 
				$qid = base64_encode($this->encrypt->encode($cart->qid, $this->session->userdata('encrypt_key')));
				?>
					
					<tr>
						<td>
							<?php echo $no;?>
						</td>
						<td>
							<img src="<?php echo base_url();?>upload/product/<?php echo $cart->image2;?>"width="80" height="80" style="width: 100%;max-height: 100%" align="center">
						</td>
						<td><?php echo $cart->name;?>
							<?php echo form_input($qty['product_id'],$cart->product_id)?>	
							<?php echo form_input($qty['store_id'],$cart->store_id)?>	
							<?php echo form_input($qty['qid'],$cart->qid)?>	
							</td>
						<td>
							Rp. <?php echo number_format($cart->price,0,'.','.');?>
							<?php echo form_input($qty['price'],$cart->price,"id ='".$no."1' onkeyup ='sum".$no."()'")?>	
						</td>
						<td>
						<?php echo form_input($qty['qty'],$cart->min_order," min='".$cart->min_order."' id ='".$no."2' onkeyup ='sum".$no."()'")?></td>
						<td><?php //echo form_input($qty['total'],0,"id='".$no."3'")?>
							<span id="<?php echo $no."3"?>"><?php echo $cart->price;?></span>
						</td>
					  <td>
					  <a href="<?php echo base_url();?>cart/delete_cart?id=<?php echo $qid;?>" class="btn btn-danger btn-xs btn-flat" onClick=\'return confirm("Apakah anda ingin menghapus produk ini?")\'><i class="fa fa-close"></i></a>
					  </button></td>
					</tr>
					
					<script>
						function sum<?php echo $no?>() {
							  var txtFirstNumberValue = document.getElementById(<?php echo $no."1"?>).value;
							  var txtSecondNumberValue = document.getElementById(<?php echo $no."2"?>).value;
							  var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
							  if (!isNaN(result)) {
								// document.getElementById(<?php echo $no."3"?>).value = result;
								 document.getElementById(<?php echo $no."3"?>).innerHTML = result;
								 
							  }
						}
					</script>
					
					 
					
				<?php $no++;
				} ?>
				
				 
				
              </table>
			  <div align='right'><button type="submit" class="btn btn-success btn-flat btn-sm" >Check Out</button></div>
			  <?php echo form_close();?>
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
	$("#results" ).load( "<?php echo base_url();?>cart/read_more"); //load initial records
	
	//executes code below when user click on pagination links
	$("#results").on( "click", ".pagination a", function (e){
		e.preventDefault();
		$(".loading-div").show(); //show loading element
		var page = $(this).attr("data-page"); //get page number from link
		$("#results").load("<?php echo base_url();?>cart/read_more",{"page":page}, function(){ //get content from PHP page
			$(".loading-div").hide(); //once done, hide loading element
		});
		
	});
});
</script>
    <!-- /.content -->
  <!-- /.content-wrapper -->