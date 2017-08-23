<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo base_url();?>asset/dist/img/fm_white.png" width="35" height="20"> </img></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo base_url();?>asset/dist/img/fm_white.png" width="50" height="35"> </img><b>foodme</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-unsorted"></i>
              <!--span class="label label-warning">10</span-->
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tentang kami</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="<?php echo base_url();?>about">
                      <i class="fa fa-book text-red"></i> Tentang Aplikasi
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url();?>Terms/terms"  target="_blank">
                      <i class="fa fa-warning text-red"></i> Terms and Conditions
                    </a>
                  </li>
                  <li>
                    <a href="https://play.google.com/store/apps/details?id=com.cmplay.tiles2" target="_blank">
                      <i class="fa fa-download text-red"></i> Download Foodme Untuk Android
                    </a>
                  </li>
                  
                </ul>
              </li>
              
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
<?php //if($get_store>0){?>
<!--          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-institution"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
<!--                 <ul class="menu">
                  <li>
                    <a href="<?php echo base_url();?>category">
                      <i class="fa fa-list text-green"></i> Kategori
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo base_url();?>product/add_product">
                      <i class="fa fa-plus-square text-green"></i> Tambah Produk
                    </a>
                  </li>
<!--                  <li>
                    <a href="#">
                      <i class="fa fa-list text-green"></i> Daftar Produk
                    </a>
                  </li-->
 <!--                  <li>
                    <a href="<?php echo base_url();?>store/setting_store">
                      <i class="fa fa-gears text-green"></i> Pengaturan Toko
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
<?php// }else { ?>
          <!-- Tasks: style can be found in dropdown.less -->
<!-- 		   <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <i class="fa fa-institution"></i>
               <span class="label label-danger"></span>
            </a>
            <ul class="dropdown-menu">
             
              <!-- Menu Footer-->
 <!--              <li class="user-footer">
			   <?php //echo form_open("store/create_data", "class='form-horizontal' row-border");?>
				  <div class="form-group">
                  </div>
				 
                  <div class="form-group">
                    <div class="col-sm-12">
                      <input type="type" name="name" class="form-control" value="<?php //echo $this->session->userdata('name')?>" id="inputName" placeholder="Nama Toko" required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class=" col-sm-12">
                      <button type="submit" class="btn btn-primary btn-block  btn-flat"><b>Buka Toko</b></button>
                    </div>
                  </div>
				  <?php //echo form_close();?>
              </li>
            </ul>
          </li>
<?php //} ?>
          <!-- Control Sidebar Toggle Button -->
		  
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu" >
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
                	<a href="<?php echo base_url();?>profile/setting_profile">
                  		<button type="button" class="btn btn-info">
                  			<span>Profil<span>
                   		</button>
                   </a>
                </div>
                
				<div class="col-xs-6 text-center">
					<a href="<?php echo base_url();?>password/kata_sandi">
                  		<button type="button" class="btn btn-warning">
                  			<span>Password<span>
                   		</button>
                   </a>                  
                </div>
                
                <div class="pull-right">
                	<a href="<?php echo base_url();?>login/logout">
                  		<button type="button" class="btn btn-primary">
                  			<span>Keluar<span>
                   		</button>
                   </a>              
                </div>
                
              </li>
            </ul>
          </li>
          
        
        </ul>
      </div>
    </nav>
  </header>
  