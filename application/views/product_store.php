<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
	<?php 
		$name = $this->encrypt->decode(base64_decode($this->input->get('name')), $this->session->userdata('encrypt_key'));
		?>
		
		
        <div class="row">
        <!--/.col (left) -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
			 <form class="form-horizontal">
				<div class="box-body">
				<table >
					<tr>
						<td class="col-sm-2" rowspan="5">
							 <center><img src="<?php echo base_url();?>upload/store/shop.png" width="100" height="100" style="max-height: 100%" align="center"></center>
						</td>
						<td style="width: 100px">Nama Toko</td>
						<td>:</td>
						<td style="width: 600px"><?php echo $entry['name'];?></td>
						<td style="width: 100px">Nama Penjual</td>
						<td>:</td>
						<td><?php echo $entry2['name'];?></td>
					</tr>
					<tr>
						<td>Lokasi</td>
						<td>:</td>
						<td><?php echo $entry['desa'];?></td>
						<td>Pekerjaan</td>
						<td>:</td>
						<td><?php echo $entry2['job'];?></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>:</td>
						<td><?php echo $entry['nohp'];?></td>
					</tr>
					<tr>
						<td valign="top">Alamat</td>
						<td valign="top">:</td>
						<td><?php echo $entry['address'];?></td>
					</tr>
					<tr>
						<td valign="top">Keterangan</td>
						<td valign="top">:</td>
						<td><?php echo $entry['desc'];?></td>
					</tr>
				</table>
							 
							  
				</div>
			 </form >
			 <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->

      <!-- Small boxes (Stat box) -->
	  <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Produk </h3>
            </div>
			 <div class="box-body">
				<div id="results"></div>
            </div>
          </div>
          <!-- /.box -->

        </div> 
			
      </div>
      <!-- /.row -->
	  <script src="<?php echo base_url();?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
			var total_record = 0;
			var store_id = '<?php echo $this->input->get('store_id') ?>';
			var total_groups = <?php echo $total_data; ?>;  
			$('#results').load("<?php echo base_url();?>product/load_more",
			 {'group_no':total_record, 'store_id':store_id}, function() {total_record++;});
		
			//executes code below when user click on pagination links
			$("#results").on( "click", ".pagination a", function (e){
				e.preventDefault();
				$(".loading-div").show(); //show loading element
				var page = $(this).attr("data-page"); //get page number from link
				$("#results").load("<?php echo base_url();?>product/load_more",{"page":page,'group_no': total_record, 'store_id':store_id}, function(){ //get content from PHP page
					$(".loading-div").hide(); //once done, hide loading element
				});
				
			});
			});
		</script>
   </section>
    <!-- /.content -->
  </div>