<script src="<?php echo base_url();?>asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><!--<i class="fa fa-dashboard">--></i> Home</a></li>
        <li> <a href="<?php echo base_url();?>admin/tips_berjualan">Tips Berjualan</a></li>
        <li class="active">Tambah Tips berjualan</li>
      </ol>
    </section>
	
	<section class="content-header">
    
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	  <?php 
			$message = $this->session->flashdata('notif');
						if($message){
							echo '<p class="alert alert-success text-center">'.$message .'</p>';
						}else{}
						
			if($this->uri->segment(3)=="add"){
				echo form_open_multipart('admin/tips_berjualan/insert');
			}else{
				echo form_open_multipart('admin/tips_berjualan/update?id='.$qid2);
			}
	  ?>
			
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"></h3>
					</div>
					<!--Hidden Form-->
					<?php echo form_input($qid)?>
					<div class="box-body">
						<div class="form-group">
						  <label>Judul</label>
						  <?php echo form_input($title)?>
						</div>
						<div class="form-group">
						  <label>Isi</label>
						  <div class="box-body pad">
							  <?php echo form_textarea($content)?>
							</div>
						</div>
						<div class="form-group">
						  <label>Gambar</label><br>
						  <?php 
							if($this->uri->segment(3)=="add"){
								
							}else{
								echo '<img src="'. base_url().'upload/pages/shopping_tips/'.$image2.'" width="200" height="150">';
							}
						  ?>
						  <div class="box-body pad">
							  <?php echo form_input($userfile)?>
							</div>
						</div>
					</div>
					
				  <div class="box-footer">
					<div>
						<button type="submit" class="btn btn-success">Simpan</button>
						<a href="<?php echo base_url();?>admin/tips_berjualan" class="btn btn-warning">Kembali</a>
					</div>
				  </div>
				</div>
			</div> 
		</div>
		<?php echo form_close();?>
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://technos-studio.com/">Techno's Studio</a>.</strong> All rights
    reserved.
  </footer>
  
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
 <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>