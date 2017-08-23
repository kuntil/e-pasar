<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--section class="content-header">
	  <ol class="breadcrumb">
        <li><a href="#"><!--<i class="fa fa-dashboard"></i> Home</a></li>
        <!--li class="active">Produk</li>
      </ol>
    </section-->
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
	  <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Menampilkan <?php echo $count_data->tol_records;?> produk untuk "<b><?php echo $search;?></b>"</h3>
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
			var search = '<?php echo $search ?>';
			var category_id = '<?php echo $category_id ?>';
			var total_groups = <?php echo $total_data; ?>;  
			$('#results').load("<?php echo base_url();?>search/load_more",
			 {'group_no':total_record, 'search':search, 'category_id':category_id}, function() {total_record++;});
		
			//executes code below when user click on pagination links
			$("#results").on( "click", ".pagination a", function (e){
				e.preventDefault();
				$(".loading-div").show(); //show loading element
				var page = $(this).attr("data-page"); //get page number from link
				$("#results").load("<?php echo base_url();?>search/load_more",{"page":page,'group_no': total_record, 'search':search, 'category_id':category_id}, function(){ //get content from PHP page
					$(".loading-div").hide(); //once done, hide loading element
				});
				
			});
			});
		</script>
   </section>
    <!-- /.content -->
  </div>