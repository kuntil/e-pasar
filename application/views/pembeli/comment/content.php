

<!-- Main content -->
    <section class="content">
      <div class="row">
		
		<!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class=" box-warning box-solid">
              <div class="box-header with-border">
              <h3 class="box-title"> Komentar Produk</h3>
            </div>
            <!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
              <table class="table table-bcommented table-hover table-bordered">
                <tr>
                  <th style="width: 5px">No</th>
                  <th style="width: 250px">Data Toko</th>
                  <th style="width: 350px" colspan='2'>Produk</th>
                  <th style="width: 100px">Komentar</th>
                  <th style="width: 10px"></th>
                </tr>
				
				
				<?php 
				
				$no = $number + 1;
				
				if($comment){
							foreach($comment as $comment) { 
							$qid = base64_encode($this->encrypt->encode($comment->qid, $this->session->userdata('encrypt_key')));
							
							?>
								
								 <?php echo form_open('delivery/delivery');?>
								<tr>
									
									<td><?php echo $no;?></td>
									<td><div class="col-sm-12">
												<?php echo $comment->store_name;?>
										</div><br><br>
											<div class="col-sm-2">
												Alamat 
											</div>
											<div class="col-sm-10">
												: <?php echo $comment->address;?>
											</div>
									
																
															
									</td>
									<td style="width: 100px">
										<img src="<?php echo base_url();?>upload/product/<?php echo $comment->image2;?>"width="80" height="80" style="width: 100%;max-height: 100%" align="center">
									</td>
									<td style="width: 200px">
										<div class="col-sm-12">
											<b><?php echo $comment->name;?></b>
										</div>
										<div class="col-sm-12">
										</div>
										<div class="col-sm-5">
												<div style="float: left; text-align: left; ">Volume/Berat</div>
										</div>
										<div class="col-sm-7">
												<div style="float: left; text-align: left; ">: <?php echo $comment->volume;?> <?php echo $comment->satuan;?></div>
										</div>
										<div class="col-sm-12">
										</div>
										<div class="col-sm-5">
												<div style="float: left; text-align: left; ">Jumlah stok</div>
										</div>
										<div class="col-sm-7">
												<div style="float: left; text-align: left; ">: <?php echo $comment->qty;?></div>
										</div>
										<div class="col-sm-12">
										</div>
										<div class="col-sm-5">
												<div style="float: left; text-align: left; ">Harga</div>
										</div>
										<div class="col-sm-7">
												<div style="float: left; text-align: left; ">: Rp. <?php echo number_format($comment->price,0,'.','.');?></div>
										</div>
									</td>
									<td><?php echo $comment->message;?></td>
									<td><a href="<?php echo base_url();?>comment/detail_comment?id=<?php echo $qid;?>" class="btn btn-warning btn-flat btn-sm">Balas Komentar</a></td>
										
										
								</tr>
								
								 <?php echo form_close();?>
								
							<?php $no++;
							}
				} else { ?>
								<tr>
								  <td colspan='6'><center><b> Data Tidak Ada </b></center></td>
								</tr>
			<?php	}
					?>
              </table>
				<div class="box-footer">
					<div align="right"><?php echo $links?></div>
				</div>
            </div>
			 <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
	  
    </section>

    <!-- /.content -->
  <!-- /.content-wrapper -->
  <!--footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer-->