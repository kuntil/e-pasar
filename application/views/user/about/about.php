    <!-- Main content -->
    <section class="content">
				<?php 	
						$message = $this->session->flashdata('notif2');
						$message2 = $this->session->flashdata('notif');
						if($message){
							echo '<p class="alert alert-danger text-center">'.$message .'</p>';
						}else if($message2){
							echo '<p class="alert alert-success text-center">'.$message2 .'</p>';
						}						
						else{
							
						}
						
				?>
     
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tentang Aplikasi       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Tentang Aplikasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                   Tentang Foodme
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <?php foreach($about as $ab){ ?>
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <!--span class="time"><i class="fa fa-clock-o"></i> 12:05</span-->
				
                <h3 class="timeline-header"><?php echo $ab->judul; ?></h3>

                <div class="timeline-body">
                  <?php echo $ab->isi; ?>
                </div>
                <!--div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-danger btn-xs">Delete</a>
                </div-->
              </div>
            </li>
             <?php } ?>
            
            
            <!-- timeline item -->
            <li>
              <i class="fa fa-video-camera bg-maroon"></i>

              <div class="timeline-item">
                

                <h3 class="timeline-header">Video Promosi</h3>

                <div class="timeline-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/erXQYyrxJBM" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
                <!--div class="timeline-footer">
                  <a href="#" class="btn btn-xs bg-maroon">See comments</a>
                </div-->
              </div>
            </li>
            <!-- END timeline item -->
            
            <?php foreach($about2 as $abc){ ?>
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <!--span class="time"><i class="fa fa-clock-o"></i> 12:05</span-->
				
                <h3 class="timeline-header"><?php echo $abc->judul; ?></h3>

                <div class="timeline-body">
                  <?php echo $abc->isi; ?>
                </div>
                <!--div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-danger btn-xs">Delete</a>
                </div-->
              </div>
            </li>
             <?php } ?>
            
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
     
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