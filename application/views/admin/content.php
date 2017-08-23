<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
  
      <div class="row">
	  
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cara Belanja</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
					<div class=row>
						<div class="col-md-5 ">
							<div class="btn-group">
							<?php echo anchor('setup/pegawai/add', 
							'<button type="button" class="btn btn-success btn-flat" data-toggle="tooltip" data-placement="top" title="Tambah Cara Belanja"><i class="fa fa-plus"></i> Tambah</button>' );?>
							&nbsp;
							<?php echo anchor('setup/pegawai', 
							'<button type="button" class="btn btn-warning btn-flat" data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i> Refresh </button>' );?>
							</div>
						</div>
						<?php echo form_open("setup/pegawai/find");?>
						<div class="col-md-7 ">
							<div class='col-md-4'>
							<?php $option = array(
									'nip'=>'NIP Baru',
									'nama'=>'Nama'
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
					  <th style="width: 10px">#</th>
					  <th>Task</th>
					  <th>Progress</th>
					  <th style="width: 40px">Label</th>
					</tr>
					<tr>
					  <td>1.</td>
					  <td>Update software</td>
					  <td>
						<div class="progress progress-xs">
						  <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
						</div>
					  </td>
					  <td><span class="badge bg-red">55%</span></td>
					</tr>
					<tr>
					  <td>2.</td>
					  <td>Clean database</td>
					  <td>
						<div class="progress progress-xs">
						  <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
						</div>
					  </td>
					  <td><span class="badge bg-yellow">70%</span></td>
					</tr>
					<tr>
					  <td>3.</td>
					  <td>Cron job running</td>
					  <td>
						<div class="progress progress-xs progress-striped active">
						  <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
						</div>
					  </td>
					  <td><span class="badge bg-light-blue">30%</span></td>
					</tr>
					<tr>
					  <td>4.</td>
					  <td>Fix and squish bugs</td>
					  <td>
						<div class="progress progress-xs progress-striped active">
						  <div class="progress-bar progress-bar-success" style="width: 90%"></div>
						</div>
					  </td>
					  <td><span class="badge bg-green">90%</span></td>
					</tr>
				  </table>
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a>1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
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
