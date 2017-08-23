<style>
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(asset/dist/img/loading.gif) center no-repeat #fff;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>

<body class="hold-transition skin-blue sidebar-mini">
<div class="se-pre-con"></div>
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
       <span class="logo-lg"><b><img src="<?php echo base_url();?>asset/dist/img/logo-web.png" height="40px"></b></span>
    </a>
    
		<?php if($get_store==0) {?>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top">
				  <!-- Sidebar toggle button-->

				  <div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
					   <li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  <?php if($get_image){ ?>
								 <img src="<?php echo base_url();?>upload/person/<?php echo $get_image;?>" class="user-image" alt="User Image">
						  <?php } else { ?>
								 <img src="<?php echo base_url();?>asset/dist/img/avatar5.png" class="user-image" alt="User Image">
						  <?php } ?>
						   <span class="hidden-xs"><?php echo ucfirst($this->session->userdata('username'));?></span>
						</a>
						<ul class="dropdown-menu">
						  <!-- User image -->
						  <li class="user-header">
							<?php if($get_image){ ?>
								<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>upload/person/<?php echo $get_image;?>" alt="User profile picture">
						  <?php } else { ?>
								<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>asset/dist/img/avatar5.png" alt="User profile picture">
						  <?php } ?>

							<p>
							  <b><?php echo $user_profile_name?></b>
							  <small><b><?php echo $user_store_name?></b></small>
							  <small>Bergabung sejak 
							  <?php 
							  switch($this->session->userdata('month')){
								  case 1 : echo "Januari";break; 
								  case 2 : echo "Februari";break; 
								  case 3 : echo "Maret";break; 
								  case 4 : echo "April";break; 
								  case 5 : echo "Mei";break; 
								  case 6 : echo "Juni";break; 
								  case 7 : echo "Juli";break; 
								  case 8 : echo "Agustus";break; 
								  case 9 : echo "September";break; 
								  case 10 : echo "Oktober";break; 
								  case 11 : echo "November";break; 
								  case 12 : echo "Desember";break; 
							  }
							  
							  ?>
							  <?php echo $this->session->userdata('year');?></small>
							</p>
						  </li>
						  <li class="user-footer">
							<div class="pull-left">
								<a href="<?php echo base_url();?>profile">
									<button type="button" class="btn btn-default btn-flat">
										<span>Profil<span>
									</button>
							   </a>
							</div>
							
							<div class="col-xs-6 text-center">
								<a href="<?php echo base_url();?>password/kata_sandi">
									<button type="button" class="btn btn-default btn-flat">
										<span>Password<span>
									</button>
							   </a>                  
							</div>
							
							<div class="pull-right">
								<a href="<?php echo base_url();?>login/logout">
									<button type="button" class="btn btn-default btn-flat">
										<span>Keluar<span>
									</button>
							   </a>              
							</div>
						  </li>
						</ul>
					  </li>
					  <!-- Control Sidebar Toggle Button -->
					</ul>
				  </div>
				</nav>
		
		<?php }  else { ?>
		
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top">
				  <!-- Sidebar toggle button-->
				   <?php echo form_open('search');?>
				<!--div class="input-group input-group sidebar-toggle2 col-sm-1" >
				  </div >
				   <div class="input-group input-group sidebar-toggle2 col-sm-7">
					  
					 <input type="text" name="search" class="form-control" placeholder="Cari Produk">
					  <div class="input-group-btn">
						<select class="form-control" name="category_id" style="width: 140px;">
							<option value="" >Semua Kategori</option>
							<option value="00001">Pertanian </option>
							<option value="00002">Perkebunan </option>
							<option value="00003">Peternakan </option>
							<option value="00004">Hasil Hutan </option>
							<option value="00005">Tambang </option>
							<option value="00006">Hasil Laut </option>
							<option value="00007">Hasil Industri </option>
						</select>
						<button type="submit" class="btn btn-warning">Cari</button>
					  </div>
				  </div-->
				  
      <?php echo form_close();?>
				  <div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
					  <!-- Tasks: style can be found in dropdown.less -->
					  <li class="dropdown notifications-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  Penjualan
						  <span class="label label-success">9</span>
						</a>
						<ul class="dropdown-menu">
						  <li>
							<!-- inner menu: contains the actual data -->
							<ul class="menu">
							  <li>
								<a href="<?php echo base_url();?>order/transfer_result">
								  <i class="fa fa-circle text-yellow"></i> Transfer
								  <?php 
								 if($transfer==0){
								 }else{
									echo '<div style="float: right; text-align: right;"> <span class="label label-success">'; 
									echo $transfer;
									echo '</span></div>';
								 }
								 ?>
								</a>
							  </li>
							  <li>
								<a href="<?php echo base_url();?>order/accept_transfer_result">
								  <i class="fa fa-circle text-red"></i> Pengiriman
								  <?php 
								 if($accept_transfer==0){
								 }else{
									echo '<div style="float: right; text-align: right;"> <span class="label label-success">'; 
									echo $accept_transfer;
									echo '</span></div>';
								 }
								 ?>
								</a>
							  </li>
							  <li>
								<a href="<?php echo base_url();?>order/transaction_success_store">
								  <i class="fa fa-circle text-green"></i> Transaksi Selesai
								  <?php 
								 if($transaction_success==0){
								 }else{
									echo '<div style="float: right; text-align: right;"> <span class="label label-success">'; 
									echo $transaction_success;
									echo '</span></div>';
								 }
								 ?>
								</a>
							  </li>
							</ul>
						  </li>
						</ul>
					  </li>
					  <li class="dropdown tasks-menu">
						<a href="<?php echo base_url();?>comment">
						  Komentar
						  <!--span class="label label-danger">9</span-->
						</a>
					  </li>
					  <li class="dropdown tasks-menu">
						<a href="<?php echo base_url();?>Report">
						  Report
						  <!--span class="label label-danger">9</span-->
						</a>
					  </li>
					  <!-- User Account: style can be found in dropdown.less -->
					  <li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  <?php if($get_image){ ?>
								 <img src="<?php echo base_url();?>upload/person/<?php echo $get_image;?>" class="user-image" alt="User Image">
						  <?php } else { ?>
								 <img src="<?php echo base_url();?>asset/dist/img/avatar5.png" class="user-image" alt="User Image">
						  <?php } ?>
						  <span class="hidden-xs"><?php echo ucfirst($this->session->userdata('username'));?></span>
						</a>
						<ul class="dropdown-menu">
						  <!-- User image -->
						  <li class="user-header">
							<?php if($get_image){ ?>
								<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>upload/person/<?php echo $get_image;?>" alt="User profile picture">
						  <?php } else { ?>
								<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>asset/dist/img/avatar5.png" alt="User profile picture">
						  <?php } ?>
							<p>
							  <b><?php echo $user_profile_name?></b>
							  <small><b><?php echo $user_store_name?></b></small>
							  <small>Bergabung sejak 
							  <?php 
							  switch($this->session->userdata('month')){
								  case 1 : echo "Januari";break; 
								  case 2 : echo "Februari";break; 
								  case 3 : echo "Maret";break; 
								  case 4 : echo "April";break; 
								  case 5 : echo "Mei";break; 
								  case 6 : echo "Juni";break; 
								  case 7 : echo "Juli";break; 
								  case 8 : echo "Agustus";break; 
								  case 9 : echo "September";break; 
								  case 10 : echo "Oktober";break; 
								  case 11 : echo "November";break; 
								  case 12 : echo "Desember";break; 
							  }
							  
							  ?>
							  <?php echo $this->session->userdata('year');?></small>
							</p>
						  </li>
						  <!-- Menu Footer-->
						  <li class="user-footer">
							 <div class="pull-left">
								<a href="<?php echo base_url();?>profile">
									<button type="button" class="btn btn-default btn-flat">
										<span>Profil<span>
									</button>
							   </a>
							</div>
							
							<div class="col-xs-6 text-center">
								<a href="<?php echo base_url();?>password/kata_sandi">
									<button type="button" class="btn btn-default btn-flat">
										<span>Password<span>
									</button>
							   </a>                  
							</div>
							
							<div class="pull-right">
								<a href="<?php echo base_url();?>login/logout">
									<button type="button" class="btn btn-default btn-flat">
										<span>Keluar<span>
									</button>
							   </a>              
							</div>
						  </li>
						</ul>
					  </li>
					  <!-- Control Sidebar Toggle Button -->
					</ul>
				  </div>
				</nav>
			
		<?php }  ?>
	
  </header>