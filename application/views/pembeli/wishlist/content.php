<!-- Main content -->
    <section class="content">
	  
	  <div class="row">
	  <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Favorite</h3>
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
		$("#results" ).load( "<?php echo base_url();?>wishlist/read_more_product"); //load initial records
		
		//executes code below when user click on pagination links
		$("#results").on( "click", ".pagination a", function (e){
			e.preventDefault();
			$(".loading-div").show(); //show loading element
			var page = $(this).attr("data-page"); //get page number from link
			$("#results").load("<?php echo base_url();?>wishlist/read_more_product",{"page":page}, function(){ //get content from PHP page
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