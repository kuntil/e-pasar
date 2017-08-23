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
	
	
			<?php if($get_address_buyer==0) {?>
			
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
							<img src="<?php echo base_url()?>asset/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

							<p>
							  Alexander Pierce - Web Developer
							  <small>Member since Nov. 2012</small>
							</p>
						  </li>
						  <!-- Menu Footer-->
						  <li class="user-footer">
							<div class="pull-left">
							  <a href="#" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
							  <a href="<?php echo base_url();?>login/logout" class="btn btn-default btn-flat">Sign out</a>
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
				   <div class="input-group input-group sidebar-toggle2 col-sm-7">
					  
					  <input type="text" name="search" class="form-control" placeholder="Cari Produk">
					  <div class="input-group-btn">
						<select class="form-control" name="category_id" style="width: 140px;">
							<option value="" >Semua Kategori</option>
							<option value="00001">Pertanian </option>
							<option value="00002">Perkebunan </option>
							<option value="00003">Peternakan </option>
							<option value="00004">Hasil Hutan </option>
							<option value="00005">Kriya </option>
							<option value="00006">Hasil Laut </option>
							<option value="00007">Hasil Industri </option>
						</select>
						<button type="submit" class="btn btn-warning">Cari</button>
					  </div>
				  </div>
				  <?php echo form_close();?>
				  <div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
					  <!-- Notifications: style can be found in dropdown.less -->
					  <li class="dropdown tasks-menu">
						<a href="<?php echo base_url();?>wishlist">
						  Favorite
						  <!--span class="label label-danger">9</span-->
						</a>
					  </li>
					   <li class="dropdown messages-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  <i class="fa fa-shopping-cart"></i> Cart
						  <?php 
						  $count = count($cart);
						  
						  if($count==0){
						  }else{
							  echo '<span class="label label-success">';
							  echo $count;
						  }
						  
						  ?>
						  </span>
						</a>
						<ul class="dropdown-menu">
						  <li>
							<!-- inner menu: contains the actual data -->
							<ul class="menu">
							<?php foreach($cart as $cart){ ?>
							  <li><!-- start message -->
								<a href="#">
								  <div class="pull-left">
									<img src="<?php echo base_url();?>upload/product/<?php echo $cart->image2;?>" class="img-circle" alt="User Image">
								  </div>
								  <h4>
									<?php echo $cart->name;?>
								  </h4>
								  <p>Rp. <?php echo number_format($cart->price,0,'.','.');?></p>
								</a>
							  </li>
							  <!-- end message -->
							<?php } ?>
							</ul>
						  </li>
						  <li class="footer"><a href="<?php echo base_url();?>cart">See All Cart</a></li>
						</ul>
					  </li>
					  <!-- Tasks: style can be found in dropdown.less -->
					  <li class="dropdown notifications-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  Pembelian
						   <?php 
								 if($detail_order==0){
								 }else{
									echo '<span class="label label-success">'; 
									echo $detail_order;
									echo '</span>';
								 }
							?>
						</a>
						<ul class="dropdown-menu">
						  <li>
							<!-- inner menu: contains the actual data -->
							<ul class="menu">
							  <li>
								<a href="<?php echo base_url();?>order/order_detail">
								  <i class="fa fa-circle text-aqua"></i> Detail Transaksi
									<?php 
									 if($detail_order==0){
									 }else{
										echo '<div style="float: right; text-align: right;"> <span class="label label-success">'; 
										echo $detail_order;
										echo '</span></div>';
									 }
									 ?>
								</a>
							  </li>
							  <li>
								<a href="<?php echo base_url();?>order/order_process">
								  <i class="fa fa-circle text-red"></i> Pengiriman
									<?php 
									 if($order_process==0){
									 }else{
										echo '<div style="float: right; text-align: right;"> <span class="label label-success">'; 
										echo $order_process;
										echo '</span></div>';
									 }
									 ?>
								</a>
							  </li>
							  <li>
								<a href="<?php echo base_url();?>order/transaction_success">
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
							  <li>
								<a href="<?php echo base_url();?>order/transaction_cancel">
								  <i class="fa fa-circle text-red"></i> Transaksi di batalkan
								  <?php 
									 if($transaction_cancel==0){
									 }else{
										echo '<div style="float: right; text-align: right;"> <span class="label label-danger">'; 
										echo $transaction_cancel;
										echo '</span></div>';
									 }
									 ?>
								</a>
							  </li>
							</ul>
						  </li>
						</ul>
					  </li>
					  <!-- User Account: style can be found in dropdown.less -->
					  
					  <li class="dropdown tasks-menu">
						<a href="<?php echo base_url();?>comment">
						  Komentar
						  <!--span class="label label-danger">9</span-->
						</a>
					  </li>
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
			
		<?php }  ?>
	
	
  </header>