<script src="<?php echo base_url();?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>asset/bootstrap/js/bootstrap.min.js"></script>
<section class="content">
		<div class="row">
			<div class="col-md-12">
				<!-- Content Wrapper. Contains page content -->
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
					</ol>
					<div class="carousel-inner">
						<div class="item active">
							<img src="<?php echo base_url()."asset/dist/img/slider1.png"?>" alt="First slide" width="500" height="100" style="width: 100%;max-height: 100%">
						</div>
						<div class="item">
							<img src="<?php echo base_url()."asset/dist/img/slider2.png"?>" alt="Second slide" width="500" height="100" style="width: 100%;max-height: 100%">
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
						<span class="fa fa-caret-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
						<span class="fa fa-caret-right"></span>
					</a>
				</div>
			</div>
		</div>
	</section>

<script src="<?php echo base_url();?>/asset/plugins/jQuery/jquery-1.11.0.min.js"></script>
<script src="<?php echo base_url();?>/asset/plugins/carousel/responsiveCarousel.min.js"></script>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<!-- general form elements -->
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
             <h3 class="box-title"> <b>DAFTAR KATEGORI</b></h3>
            </div>
			 <div class="box-body">
				<div id="w">
					
					<?php
						$id1 = base64_encode($this->encrypt->encode('00001', $this->session->userdata('encrypt_key')));
						$id2 = base64_encode($this->encrypt->encode('00002', $this->session->userdata('encrypt_key')));
						$id3 = base64_encode($this->encrypt->encode('00003', $this->session->userdata('encrypt_key')));
						$id4 = base64_encode($this->encrypt->encode('00004', $this->session->userdata('encrypt_key')));
						$id5 = base64_encode($this->encrypt->encode('00005', $this->session->userdata('encrypt_key')));
						$id6 = base64_encode($this->encrypt->encode('00006', $this->session->userdata('encrypt_key')));
						$id7 = base64_encode($this->encrypt->encode('00007', $this->session->userdata('encrypt_key')));
					?>
					
					<div class="crsl-items" data-navigation="navbtns">
					  <div class="crsl-wrap">
						<div class="crsl-item">
						  <div class="thumbnail">
							<a href='<?php echo base_url();?>category?id=<?php echo $id1;?>'><img src="<?php echo base_url()."asset/dist/img/pasarbumi-katpertanian.png"?>" alt="nyc subway"></a>
							<p><b><center>Pertanian</center></b></p>
						  </div>
						</div>
						<div class="crsl-item">
						   <div class="thumbnail">
							<a href='<?php echo base_url();?>category?id=<?php echo $id2;?>'><img src="<?php echo base_url()."asset/dist/img/pasarbumi-katperkebunan.png"?>" alt="nyc subway"></a>
							<p><b><center>Perkebunan</center></b></p>
						  </div>
						</div>
						<div class="crsl-item">
						   <div class="thumbnail">
							<a href='<?php echo base_url();?>category?id=<?php echo $id3;?>'><img src="<?php echo base_url()."asset/dist/img/pasarbumi-katpeternakan.png"?>" alt="nyc subway"></a>
							<p><b><center>Peternakan</center></b></p>
						  </div>
						</div>
						<div class="crsl-item">
						   <div class="thumbnail">
							<a href='<?php echo base_url();?>category?id=<?php echo $id4;?>'><img src="<?php echo base_url()."asset/dist/img/pasarbumi-kathasilhutan.png"?>" alt="nyc subway"></a>
							<p><b><center>Hasil Hutan</center></b></p>
						  </div>
						</div>
						<div class="crsl-item">
						   <div class="thumbnail">
							<a href='<?php echo base_url();?>category?id=<?php echo $id5;?>'><img src="<?php echo base_url()."asset/dist/img/pasarbumi-katkriya.png"?>" alt="nyc subway"></a>
							<p><b><center>Kriya</center></b></p>
						  </div>
						</div>
						<div class="crsl-item">
						   <div class="thumbnail">
							<a href='<?php echo base_url();?>category?id=<?php echo $id6;?>'><img src="<?php echo base_url()."asset/dist/img/pasarbumi-katperikanan.png"?>" alt="nyc subway"></a>
							<p><b><center>Perikanan</center></b></p>
						  </div>
						</div>
						<div class="crsl-item">
						   <div class="thumbnail">
							<a href='<?php echo base_url();?>category?id=<?php echo $id7;?>'><img src="<?php echo base_url()."asset/dist/img/pasarbumi-katindustri.png"?>" alt="nyc subway"></a>
							<p><b><center>Hasil Industri</center></b></p>
						  </div>
						</div>
						
					</div><!-- @end .crsl-items -->
					
				  </div><!-- @end #w -->
					<nav class="slidernav">
					  <div id="navbtns" class="clearfix">
					   
						<a href="#" class="previous btn btn-primary btn-flat btn-sm " style="float: left;"><</a>
						<a href="#" class="next btn btn-primary btn-flat btn-sm" style="float: right;">></a>
					  </div>
					</nav>
            </div>
          </div>
          <!-- /.box -->
		  
				  
			</div>
		</div>
	</section>
	
	
	
	
	<!--  
	<!-- Main content -->
    <section class="content">
      
	  <div class="row">
	  <div class="col-md-12">
          <!-- general form elements -->
		  <div class="box box-primary box-solid">
            <div class="box-header">
              <h3 class="box-title"><b>INFORMASI HARGA NASIONAL</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!--table class="table table-striped table-bordered">
                <tr>
                  <th >Nama Barang</th>
							<th style="width: 300px">Harga Hari Ini</th>
							<th style="width: 300px">Harga Kemarin</th>
                </tr>
				<?php for ($tabel=0;$tabel<17;$tabel++){ ?>
				<tr>
				
					<td><img src="<?php echo 'https://ews.kemendag.go.id/'.$ambilGambar[$tabel]?>"></td>
					<td><?php echo $ambilNamaBarang[$tabel]?></td>
					<td><?php echo $ambilHargaSekarang[$tabel]?>
						<?php 
						$harga_sekarang = preg_replace("/[^0-9]/", "",$ambilHargaSekarang[$tabel]);
						$harga_kemarin = preg_replace("/[^0-9]/", "",$ambilHargaKemarin[$tabel]);
						if ($harga_sekarang<$harga_kemarin){
								echo '<img src="'.base_url().'asset/dist/img/down_tr.png" align="right">';
						} else if ($harga_sekarang>$harga_kemarin){
								echo '<img src="'.base_url().'asset/dist/img/up_tr.png" align="right">';
						} else{
								
						}
						?>
					</td>
					<td><?php echo $ambilHargaKemarin[$tabel]?></td>
				</tr>
				<?php } ?>
              </table-->
			  <?php for ($tabel=0;$tabel<17;$tabel++){ ?>
					<div class="col-lg-3">
						  <div class="small-box bg-white img-bordered-sm2">
							 <table class="table">
							 <tr>
								<td width="10px"><img src="<?php echo 'https://ews.kemendag.go.id/'.$ambilGambar[$tabel]?>"></td>
								<td><p style="font-size: 14px;"><?php echo $ambilNamaBarang[$tabel]?><p>
								<b>
								<?php 
									$harga_sekarang = preg_replace("/[^0-9]/", "",$ambilHargaSekarang[$tabel]);
									$harga_kemarin = preg_replace("/[^0-9]/", "",$ambilHargaKemarin[$tabel]);
									if ($harga_sekarang<$harga_kemarin){
											echo '<p style="font-size: 24px; color: #109437;">'.$ambilHargaSekarang[$tabel].'';
									} else if ($harga_sekarang>$harga_kemarin){
											echo '<p style="font-size: 24px; color: #dd4b39;">'.$ambilHargaSekarang[$tabel].'';
									} else{
											echo '<p style="font-size: 24px;">'.$ambilHargaSekarang[$tabel].'';
									}
									?>
								</b><p>
								</td>
							 </tr>
							 <tr>
								<td colspan='2'>Harga Kemarin : <?php echo $ambilHargaKemarin[$tabel]?>
								</td>
							 </tr>
							 </table>
						   </div>   
					</div>
					<?php } ?>
				</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div> 
			
      </div>
	
    </section> <!-- Main content -->
	

 <!-- Main content -->
    <section class="content">
      
	  <div class="row">
	  <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><b>DAFTAR PRODUK</b></h3>
            </div>
			 <div class="box-body">
				<div id="results"></div>
            </div>
          </div>
          <!-- /.box -->

        </div> 
			
      </div>
	
<script type="text/javascript">
	$(document).ready(function() {
		$("#results" ).load( "<?php echo base_url();?>home/read_more_product"); //load initial records
		
		//executes code below when user click on pagination links
		$("#results").on( "click", ".pagination a", function (e){
			e.preventDefault();
			$(".loading-div").show(); //show loading element
			var page = $(this).attr("data-page"); //get page number from link
			$("#results").load("<?php echo base_url();?>home/read_more_product",{"page":page}, function(){ //get content from PHP page
				$(".loading-div").hide(); //once done, hide loading element
			});
			
		});
	});
	</script>	

    </section> <!-- Main content -->
    <section class="content">
      
	  <div class="row">
	  <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><b>DAFTAR TOKO</b></h3>
            </div>
			 <div class="box-body">
				<div id="results2"></div>
            </div>
          </div>
          <!-- /.box -->

        </div> 
			
      </div>
		
<script type="text/javascript">
	$(document).ready(function() {
		$("#results2" ).load( "<?php echo base_url();?>home/read_more_store"); //load initial records
		
		//executes code below when user click on pagination links
		$("#results2").on( "click", ".pagination a", function (e){
			e.preventDefault();
			$(".loading-div").show(); //show loading element
			var page = $(this).attr("data-page"); //get page number from link
			$("#results2").load("<?php echo base_url();?>home/read_more_store",{"page":page}, function(){ //get content from PHP page
				$(".loading-div").hide(); //once done, hide loading element
			});
			
		});
	});
	</script>
<script type="text/javascript">
$(function(){
  $('.crsl-items').carousel({
    visible: 8,
    itemMinWidth: 180,
    itemEqualHeight: 370,
    itemMargin: 9,
  });
  
  $("a[href=#]").on('click', function(e) {
    e.preventDefault();
  });
});
</script>

    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
 