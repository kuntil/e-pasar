<script src="<?php echo base_url();?>/asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
   $(function() {
     $('#datepicker').datepicker({
		 format:'dd-mm-yyyy',
		 autoclose: true
    });
   });
 </script>

<?php if($get_address_buyer==0) {?>

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
			 <form class="form-horizontal" action="<?php echo base_url();?>buyer/create_data" method="post">
				<div class="box-body">
							  <div class="form-group">
								<label for="inputName" class="col-sm-3 control-label">Nama Lengkap</label>

								<div class="col-sm-9">
								  <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputEmail" class="col-sm-3 control-label">Tanggal Lahir</label>

								<div class="col-sm-5">
									<div class="input-group date ">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
											 <input type="text" name="birth_date" id="datepicker" class="form-control" placeholder="Tanggal Lahir" required>
									</div>
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputName" class="col-sm-3 control-label">No. KTP</label>

								<div class="col-sm-9">
								   <input type="number" name="no_ktp" class="form-control" placeholder="No. KTP" required>
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputName" class="col-sm-3 control-label">Gol. Darah</label>

								<div class="col-sm-3">
									<select name="blood_type" class="form-control"  required>
										<option value=""> - Gol. Darah - </option>
										<option value="1"> A </option>
										<option value="2"> B </option>
										<option value="3"> AB </option>
										<option value="4"> O </option>
									</select>
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputSkills" class="col-sm-3 control-label">Jenis Kelamin</label>

								<div class="col-sm-3">
									<select name="gender" class="form-control"  required>
										<option value=""> - Jenis Kelamin - </option>
										<option value="1"> Pria </option>
										<option value="2"> Wanita</option>
									</select>
								</div>
							  </div>
							<div class="form-group">
								<label for="inputSkills" class="col-sm-3 control-label">Pekerjaan</label>

								<div class="col-sm-9">
								   <input type="text" name="job" class="form-control" placeholder="Pekerjaan" required>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Alamat Lengkap</label>

								<div class="col-sm-9">
									<textarea name="address" class="form-control" placeholder="Alamat Lengkap" required></textarea>
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
	  <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Produk</h3>
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
		$("#results" ).load( "<?php echo base_url();?>buyer/read_more"); //load initial records
		
		//executes code below when user click on pagination links
		$("#results").on( "click", ".pagination a", function (e){
			e.preventDefault();
			$(".loading-div").show(); //show loading element
			var page = $(this).attr("data-page"); //get page number from link
			$("#results").load("<?php echo base_url();?>buyer/read_more",{"page":page}, function(){ //get content from PHP page
				$(".loading-div").hide(); //once done, hide loading element
			});
			
		});
	});
</script>
<script>
function myFunction() {
    alert("Product sudah ada di cart !");
}
</script>

    </section>
<?php }  ?>