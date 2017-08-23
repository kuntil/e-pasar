<?php if($get_store==0) {?>

<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Selamat Datang</h3>
            </div>
			 <div class="box-body">
				Selamat datang di pasar bumi
            </div>
          </div>
          <!-- /.box -->

        </div> 
		
		
		<!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
              <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
			 <form class="form-horizontal" action="<?php echo base_url();?>store/create_data" method="post">
				<div class="box-body">
							<div class="form-group">
							  <label for="inputEmail3" class="col-sm-2 control-label">Nama Toko</label>

							  <div class="col-sm-10">
								 <?php echo form_error('name'); ?>
								 <input type="text" name="name" class="form-control" placeholder="Nama Toko" >
							  </div>
							</div>
							<div class="form-group">
							  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

							  <div class="col-sm-10">
								 <?php echo form_error('address'); ?>
								 <textarea name="address" class="form-control" placeholder="Alamat" ></textarea>
							  </div>
							</div>
							<!--div class="form-group">
							  <label for="inputEmail3" class="col-sm-2 control-label">Desa</label>

							  <div class="col-sm-10">
								 <select name="desa" class="form-control selectpicker chzn-select" data-live-search="true" data-live-search-style="begins" >
								 <option value="" >- Pilih Desa - </option>
								 <?php foreach($village as $village){?>
									<option value="<?php echo $village->name;?>" ><?php echo $village->name;?></option>
								 <?php }?>
								 </select>
								 
							  </div>
							</div-->
							<div class="form-group">
							  <label for="inputEmail3" class="col-sm-2 control-label">Telepon</label>

							  <div class="col-sm-10">
								 <?php echo form_error('nohp'); ?>
								  <input type="number" name="nohp" class="form-control" placeholder="Telepon" >
							  </div>
							</div>
							<div class="form-group">
							  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>

							  <div class="col-sm-10">
								 <?php echo form_error('desc'); ?>
								 <textarea name="desc" class="form-control" placeholder="keterangan" ></textarea>
							  </div>
							</div>
							<div class="form-group">
							  <label for="inputEmail3" class="col-sm-2 control-label">Rekening</label>

							  <div class="col-sm-3">
								 <?php echo form_error('bank'); ?>
								 <select name="bank" class="form-control" >
									<option value="">- Pilih Bank-</option>
									<option value="bri"> BRI</option>
									<option value="bni"> BNI</option>
									<option value="mandiri"> Mandiri</option>
									<option value="bca"> BCA</option>
								 </select>
							  </div>
							  
							  <div class="col-sm-7">
								 <?php echo form_error('user_account'); ?>
								 <input type="text" name="user_account" class="form-control" placeholder="Pemilik Rekening" >
							  </div>
							</div>
							<div class="form-group">
							  <div class="col-sm-5">
							  </div>
							  
							  <div class="col-sm-7">
								 <?php echo form_error('no_account'); ?>
								 <input type="number" name="no_account" class="form-control" placeholder="No. Rekening" >
							  </div>
							</div>
							<div class="form-group">
							  <div class="col-sm-offset-2 col-sm-10">
								<div class="checkbox">
								  <label>
									<input type="checkbox" required> Saya Setuju
								  </label>
								</div>
							  </div>
							</div>
							</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-success pull-right">Simpan</button>
					</div>
			 </form >
			 <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
	  

<?php }  else { ?>

<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
          
            <!-- /.box-header -->
			 <form class="form-horizontal">
				<div class="box-body">
				
						<div class="row">
          				<div class ="col-md-10">
          		<table >
					<tr>
						<div class="col-md-2">
							 <center><img src="<?php echo base_url();?>upload/store/shop.png" width="130" height="150" style="max-height: 100%" align="center"></center>
						</div>
					</tr>
					
					
					<tr>						
						<td><b><font size="5"> <?php echo $entry['name'];?></font></b></td>
					</tr>
					<tr>
						<td><span class="fa fa-user" aria-hidden="true"></span> <?php echo $entry2['name'];?></td>
					</tr>
					<tr>
						<td><span class="fa fa-home" aria-hidden="true"></span> <?php echo $entry['address'];?></td>
					</tr>
					<tr>						
						<td><span class="fa fa-phone" aria-hidden="true"></span> <?php echo $entry['nohp'];?></td>
					</tr>
					<tr>
						<td><span class="fa fa-envelope" aria-hidden="true"></span> <?php echo $entry2['email'];?></td>
					</tr>
					<tr>
						<td><span class="fa fa-tag" aria-hidden="true"></span> <?php echo $entry['desc'];?></td>
					</tr>
					<!--tr>						
						<td><span class="fa fa-map-marker" aria-hidden="true"></span><?php echo $entry['desa'];?></td>						
					</tr-->
				</table>
          	</div>
          	
	          	<div class ="col-md-2" style='margin-top: 100px'>          		                   	
	                  <a href="<?php echo base_url();?>premium/upgrade" class="btn btn-block btn-upgrade btn-lg">Upgrade Toko</a>
	          	</div>
          </div>	 						  
	</div>   
				
			 </form >
			 <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        		 
	  </div>
	  
	  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>0</h3>

              <p>Orderan Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>0</h3>

              <p>Sedang Dalam Proses</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>0</h3>

              <p>Transaksi Selesai</p>
            </div>
            <div class="icon">
              <i class="fa fa-check"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>0</h3>

              <p>Transaksi batal</p>
            </div>
            <div class="icon">
              <i class="fa fa-close"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
	  <div class="row">
	  <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">DAFTAR PRODUK</h3>
			  <a href="<?php echo base_url();?>product/add_product" class="btn btn-primary pull-right">Tambah Produk</a>
            </div>
			 <div class="box-body">
				<div id="results"></div>
            </div>
          </div>
          <!-- /.box -->

        </div> 
			
      </div>
    </section>
	<script src="<?php echo base_url();?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript">
	$(document).ready(function() {
		$("#results" ).load( "<?php echo base_url();?>product/load_more"); //load initial records
		
		//executes code below when user click on pagination links
		$("#results").on( "click", ".pagination a", function (e){
			e.preventDefault();
			$(".loading-div").show(); //show loading element
			var page = $(this).attr("data-page"); //get page number from link
			$("#results").load("<?php echo base_url();?>product/load_more",{"page":page}, function(){ //get content from PHP page
				$(".loading-div").hide(); //once done, hide loading element
			});
			
		});
	});
	</script>	
<?php }  ?>