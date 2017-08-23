<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <ol class="breadcrumb">
        <li><a href="#"><!--<i class="fa fa-dashboard">--></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
      <!-- search form -->
      <form action="#" method="get" >
        <div class="input-group col-lg-3 ">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
    </section>
	
	<section class="content-header">
      <h1>
        Daftar Orderan Yang Sedang Diproses
        <!--<small>Control panel</small>-->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-bordered ">
                <tr>
                  <th style="width:3%">Kd Transaksi</th>
                  <th style="width:30%">Data Pembeli</th>
                  <th style="width:10%">Tanggal</th>
                  <th style="width:1%" colspan="2">Produk</th>
                  <th style="width:5%">Jumlah Pesanan</th>
                  <th style="width:12%">Total Harga</th>
                  <th style="width:30%">Proses</th>
                </tr>
				<?php foreach($order as $or){ ?>
                <tr>
                  <td><?php echo $or->order_id; ?></td>
                  <td><?php echo $or->name_person; ?><br><br>
                  <?php echo $or->addres_delivery; ?></td>
                  <td><?php echo date("d-m-Y",strtotime($or->order_date)); ?></td>
<!--                  <td><span class="label label-success">Approved</span></td>
-->
                  <td ><img src="<?php echo base_url();?>upload/product/<?php echo $or->image1; ?>" width='80' height='80' align="center"></td>
				  <td style="width:25%">
						 <div style="color: green; font-weight: bold;"><?php echo $or->name; ?></div><br>
						 Harga per item : <b>Rp. <?php echo number_format($or->price,0,",","."); ?> </b><br>
				  </td>
				  <td > <?php echo $or->qty; ?> </td>
				  <td style="color: green; font-weight: bold;">Rp. <?php echo  number_format($total = $or->price * $or->qty,0,",","."); ?></td>
                  <td> 
				  
				   <?php 
							$order_id = base64_encode($this->encrypt->encode($or->order_id, $this->session->userdata('encrypt_key')));
						?>
						
					<a href="<?php echo base_url();?>order_process/delivery?id=<?php echo $order_id; ?>" class="btn btn-success" onClick="return confirm('Apakah Anda Menerima Pesanan Ini?')">Siap Antar</a>
					</button>

				  </td>
                </tr>
                <?php } ?>
                
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
	   <div class="container">		

	<!-- Modal -->
	<?php foreach($order as $or){ ?>
		<div id="myModal<?php echo $or->order_id?>" class="modal fade modal-primary"" role="dialog">
			<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Masukkan Pesan</h4>
              </div>
              <div class="modal-body ">
					<textarea name="desc" cols="40" rows="4" id="desc" type="text" class="form-control" placeholder="Alamat Lengkap" ><?php echo $or->order_id; ?></textarea>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success">Kirim pesan</button>
              </div>
            </div>
		</div>
	<?php } ?>
	</div>
   </div>
    
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://technos-studio.com/">Techno's Studio</a>.</strong> All rights
    reserved.
  </footer>