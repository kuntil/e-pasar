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
	
	<!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style=" height: 50px;">
      <!-- Sidebar toggle button-->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url();?>admin/login/logout">
              <span class="hidden-xs">Log Out</span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
	
	
  </header>