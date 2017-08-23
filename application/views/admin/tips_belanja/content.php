<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
  
      <div class="row">
	  
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tips Belanja</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
					<div class=row>
						<div class="col-md-5 ">
							<div class="btn-group">
							<?php echo anchor('admin/tips_belanja/add', 
							'<button type="button" class="btn btn-success btn-flat" data-toggle="tooltip" data-placement="top" title="Tambah Tips Belanja"><i class="fa fa-plus"></i> Tambah</button>' );?>
							<?php echo anchor('admin/tips_belanja', 
							'<button type="button" class="btn btn-warning btn-flat" data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i> Refresh </button>' );?>
							</div>
						</div>
						<?php echo form_open("admin/tips_belanja/find");?>
						<div class="col-md-7 ">
							<div class='col-md-4'>
							<?php $option = array(
									'title'=>'Judul',
									'content'=>'Isi'
							); 
							echo form_dropdown('column',$option,'1','class="form-control"');?>
							</div>
							<div class="col-md-7"><input type="text" class="form-control" name="data" placeholder="Cari"></div>
							<input type="submit" name="submit" class="btn btn-info btn-flat" title="Cari Data" value="Go">
						</div>
						<?php echo form_close();?>
					</div><br>
					
					<table class="table table-bordered">
					<tr>
					  <th style="width: 10px">No</th>
					  <th style="width: 150px">Judul</th>
					  <th style="width: 1500px">Isi</th>
					  <th >Gambar</th>
					  <th style="width: 250px"></th>
					</tr>
					<?php 
					$no = $number + 1;
					if($tips_belanja){
						foreach ($tips_belanja as $tips_belanja) {
							$qid = base64_encode($this->encrypt->encode($tips_belanja->qid, $this->session->userdata('encrypt_key')));
							?>
							<tr>
							  <td><?php echo $no?></td>
							  <td><?php echo $tips_belanja->title;?></td>
							  <td><?php echo $tips_belanja->content;?></td>
							  <td><img src="<?php echo base_url();?>upload/pages/shopping_tips/<?php echo $tips_belanja->image;?>" width="200" height="150"></td>
							  <td>
								<div><a href="<?php echo base_url();?>admin/tips_belanja/modify?id=<?php echo $qid?>" class="btn btn-warning btn-flat" title="Ubah Cara Belanja">Edit</a>
								<a href="<?php echo base_url();?>admin/tips_belanja/delete?id=<?php echo $qid?>"  onclick="return confirm('Anda Yakin ?');" class="btn btn-danger btn-flat" title="Hapus Tips Belanja" >Hapus</a></div>
							  </td>
							</tr>
						<?php 
						$no++;
						} 
					} else { ?>
							<tr>
							  <td colspan='4'><center><b> Data Tidak Ada </b></center></td>
							</tr>
						
					<?php	
					}
					?>
				  </table>
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
             <div align="right"><?php echo $links?> </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
