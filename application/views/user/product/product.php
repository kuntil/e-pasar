<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <ol class="breadcrumb">
        <li><a href="#"><!--<i class="fa fa-dashboard">--></i> Home</a></li>
        <li class="active">Produk</li>
      </ol>
      <!-- search form -->
      <form action="<?php echo base_url();?>product/search" method="get" >
	  <?php echo form_open_multipart('product/insert_product');?>
        <div class="input-group col-lg-3 ">
          <input type="text" name="search" class="form-control" placeholder="cari produk...">
              <span class="input-group-btn">
                <button type="submit"  id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
       </form>
      <!-- /.search form -->
    </section>
	
	<section class="content-header">
      <h1>
        Daftar Produk di "<?php echo $user_store_name?>"
        <!--<small>Control panel</small>-->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	  <a href="<?php echo base_url();?>product/add_product" class="btn btn-primary">Tambah Produk</a><br><br>
      <div class="row">
	  <div id="results"></div>
	  <?php 
		//	foreach($product as $px){	
		?>
 <!--       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
 <!--         <div class="small-box bg-green">
            <div class="inner">
			 <center><img src="<?php// echo base_url();?>upload/product/<?php echo $px->image1;?>" width='230' height='230' align="center"></center>
				<h4>
					<div style='float: left; text-align: left; font-weight: bold; '><?php echo $px->name;?></div>
					<div style='float: right; text-align: right; font-weight: bold;' >Rp. <?php echo number_format($px->price,0,'.','.');?></div>
				<p></p>
				</h4>
				<br>
            </div>   
			<?php// $product_id = base64_encode($this->encrypt->encode($px->product_id, $this->session->userdata('encrypt_key'))); ?>
						
				<div class="pull-left">
					<a href="<?php //echo site_url('product/update_product?id='.$product_id);?>" class="btn btn-danger btn-flat">Edit</a>
                </div>
					<a href="<?php// echo site_url('product/detail_product?id='.$product_id);?>" class="btn btn-primary btn-flat">View</a>
				<div class="pull-right">
					<a href="<?php// echo site_url('product/delete_product?id='.$product_id);?>" class="btn btn-warning btn-flat" onClick="return confirm('Apakah Anda benar-benar mau menghapusnya?')"><i class="fa fa-trash"></i></a>
               </div>
          </div>
        </div>
		<?php// } ?>
        <!-- ./col -->
      </div>
      <!-- /.row -->
	  <script src="<?php echo base_url();?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
			var total_record = 0;
			var total_groups = <?php echo $total_data; ?>;  
			$('#results').load("<?php echo base_url();?>product/load_more",
			 {'group_no':total_record}, function() {total_record++;});
			$(window).scroll(function() {       
				if($(window).scrollTop() + $(window).height() == $(document).height())  
				{           
					if(total_record <= total_groups)
					{
					  loading = true; 
					  $('.loader_image').show(); 
					  $.post('<?php echo site_url('product/load_more') ?>',{'group_no': total_record},
						function(data){ 
							if (data != "") {                               
								$("#results").append(data);                 
								$('.loader_image').hide();                  
								total_record++;
							}
						});     
					}
				}
			});
			});
		</script>
   </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://technos-studio.com/">Techno's Studio</a>.</strong> All rights
    reserved.
  </footer>