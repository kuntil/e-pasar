<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
	<div class="row">
	<div class="col-lg-12 ">

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
       <div class="row">
	  <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"> Daftar Produk Kategori "<b><?php 
		$id = $this->encrypt->decode(base64_decode($this->input->get('id')), $this->session->userdata('encrypt_key'));
								switch($id){
									case '00001' : echo "Pertanian";break; 
									case '00002' : echo "Perkebunan";break; 
									case '00003' : echo "Peternakan";break; 
									case '00004' : echo "Hasil Hutan";break; 
									case '00005' : echo "Kriya";break; 
									case '00006' : echo "Perikanan";break; 
									case '00007' : echo "Hasil Industri";break; 
								}
		?></b>"</h3>
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
			var category_id = '<?php echo $this->input->get('id') ?>';
			var total_groups = <?php echo $total_data; ?>;  
			$('#results').load("<?php echo base_url();?>category/load_more",
			 {'group_no':total_record, 'category_id':category_id}, function() {total_record++;});
		
			//executes code below when user click on pagination links
			$("#results").on( "click", ".pagination a", function (e){
				e.preventDefault();
				$(".loading-div").show(); //show loading element
				var page = $(this).attr("data-page"); //get page number from link
				$("#results").load("<?php echo base_url();?>category/load_more",{"page":page,'group_no': total_record, 'category_id':category_id}, function(){ //get content from PHP page
					$(".loading-div").hide(); //once done, hide loading element
				});
				
			});
			});
		</script>
		</div></div>
   </section>
    <!-- /.content -->
  </div>