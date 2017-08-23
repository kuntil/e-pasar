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
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>asset/dist/img/avatar5.png" alt="User profile picture">

              <h3 class="profile-username text-center">Nina Mcintire</h3>

              <a href="#" class="btn btn-primary btn-block"><b>Edit Photo</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Nama Lengkap</label>

                    <div class="col-sm-9">
                      <input type="type" name="name" class="form-control" id="inputName" placeholder="Nama Lengkap">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">Tanggal Lahir</label>

                    <div class="col-sm-3">
						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
								<input type="text" class="form-control pull-right" id="datepicker">
						</div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">No. KTP</label>

                    <div class="col-sm-9">
                      <input type="number" name="no_ktp" class="form-control" id="inputName" placeholder="No. KTP">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Gol. Darah</label>

                    <div class="col-sm-3">
						<select class="form-control">
							<option value="">- Gol. Darah -</option>
							<option>A</option>
							<option>B</option>
							<option>AB</option>
							<option>O</option>
						</select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-3 control-label">Jenis Kelamin</label>

                    <div class="col-sm-3">
						<select class="form-control">
							<option value="">- Jenis Kelamin -</option>
							<option>Pria</option>
							<option>Wanita</option>
						</select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-3 control-label">Pekerjaan</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Pekerjaan">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" required> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>