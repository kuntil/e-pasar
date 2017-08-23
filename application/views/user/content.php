 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<!--      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol-->
    </section>
<?php if($get_store==0){?>
	 <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<?php echo form_open("store/create_data");?>
		<div class="row">
			<div class="col-lg-6 col-xs-6">
				<div class="box box-primary">
				
					<div class="box-body">
						Selamat Datang di FoodMe
					</div>
				  <!-- /.box-body -->

				</div>
			</div>
			<div class="col-lg-6 col-xs-6">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Masukkan Nama Toko</h3>
					</div>
				
					<div class="box-body">
						<div class="form-group">
						  <label>Nama Toko</label>
						  <input type="type" name="name" class="form-control" value="<?php echo $this->session->userdata('name')?>" id="inputName" placeholder="Nama Toko" required>
						</div>
					</div>
				  <!-- /.box-body -->

				  <div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
				  </div>
				
				</div>
			</div>
		</div>
		<?php echo form_close();?>
    </section>
    <!-- /.content -->
<?php } else {?>
  <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">   
         
        <div class="col-lg-3">
          <!-- small box -->          
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $count_order?></h3>
              <p>Orderan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <!--a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
          </div>
        </div>
        
         <div class="col-lg-3 ">
          <!-- small box -->          
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $count_order?></h3>
              <p>Proses</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <!--a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-3 ">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo $count_received?><sup style="font-size: 20px"></sup></h3>
              <p>Pengantaran</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!--a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-3 ">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $count_cancel?></h3>
              <p>Transaksi Selesai</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <!--a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
          </div>
        </div>
        
        <!-- ./col -->
<!--        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <!--div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Transaksi</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <!--div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div-->
			  <div class="chart tab-pane active" id="container" style="min-width: 300px; height: 300px; margin: 0 auto"></div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->
		 
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
		
          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
          
          
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
<?php } ?>
  
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://technos-studio.com/">Techno's Studio</a>.</strong> All rights
    reserved.
  </footer>
  
<script>
$(function () {
    Highcharts.chart('container', {
    chart: {
        type: 'areaspline'
    },
    title: {
        text: 'Transaksi Bulan Ini'
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    xAxis: {
        categories: [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ],
        plotBands: [{ // visualize the weekend
            from: 4.5,
            to: 6.5,
            color: 'rgba(68, 170, 213, .2)'
        }]
    },
    yAxis: {
        title: {
            text: 'Fruit units'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' units'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
        name: 'Total Transaksi',
        data: [3, 4, 3, 5, 4, 10, 12]
    }, {
        name: 'Jane',
        data: [1, 3, 4, 3, 3, 5, 4]
    }]
});
});
</script>
			