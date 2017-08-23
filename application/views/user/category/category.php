<script src="<?php echo base_url();?>/asset/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
   $(function() {
     $('#datepicker').datepicker({
		 format:'yyyy-mm-dd',
		 autoclose: true
    });
   });
 </script>
 

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Kategori</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Kategori</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<a href="<?php echo base_url();?>category/add_category" class="btn btn-success">Tambah Kategori</a><br><br>
              <table class="table table-bordered table-striped table-hover">
                <tr>
                  <th style="width: 10px">No</th>
                  <th style="width: 550px">Nama Kategori</th>
                  <th style="width: 10px">Pilihan</th>
                </tr>
				<?php 
					$no = 1;
					foreach($category as $ct){	
				?>
					<tr>
					  <td><?php echo $no;?></td>
					  <td><?php echo $ct->category_name;?></td>
					  <td>
					  <?php 
							$category_id = base64_encode($this->encrypt->encode($ct->category_id, $this->session->userdata('encrypt_key')));
						?>
						<a href="<?php echo base_url();?>category/update_category?id=<?php echo $category_id;?>" class="btn btn-warning">Edit</a>
						<a href="<?php echo base_url();?>category/delete_category?id=<?php echo $category_id;?>" class="btn btn-danger">Hapus</a>
					  </td>
					</tr>
				<?php 
					$no++;
					} 
				?>
              </table>
            </div>
            <!-- /.box-body -->
<!--            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div-->
          </div>
          <!-- /.box -->

        </div>
		<!-- /.col -->
      </div>
      <!-- /.row -->

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