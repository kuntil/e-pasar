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
#login-dp{
    min-width: 250px;
    padding: 14px 14px 0;
    overflow:hidden;
}
#login-dp .help-block{
    font-size:12px    
}
#login-dp .bottom{
    background-color:rgba(255,255,255,.8);
    border-top:1px solid #ddd;
    clear:both;
    padding:14px;
}
#login-dp .social-buttons{
    margin:12px 0    
}
#login-dp .social-buttons a{
    width: 49%;
}
#login-dp .form-group {
    margin-bottom: 10px;
}
.btn-fb{
    color: #fff;
    background-color:#3b5998;
}
.btn-fb:hover{
    color: #fff;
    background-color:#496ebc 
}
.btn-tw{
    color: #fff;
    background-color:#55acee;
}
.btn-tw:hover{
    color: #fff;
    background-color:#59b5fa;
}
@media(max-width:768px){
    #login-dp{
        background-color: inherit;
        color: #fff;
    }
    #login-dp .bottom{
        background-color: inherit;
        border-top:0 none;
    }
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
	  <?php echo form_open('search');?>
	  <div class="col-sm-1" >
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
		
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Masuk <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								  <form action="<?php echo base_url();?>login/login" method="post">
										<div class="form-group">
											 <input type="text" name="username" class="form-control"  placeholder="Nama" required>
										</div>
										<div class="form-group">
											 <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required>
                                             <div class="help-block text-right"><a href="">Lupa Kata Sandi ?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Masuk</button>
										</div>
										<div class="checkbox">
											 <label>
											 <input type="checkbox" name="remember"> Biarkan saya tetap masuk
											 </label>
										</div>
								 </form>
							</div>
							<!-- div class="bottom text-center">
								New here ? <a href="#"><b>Gabung</b></a>
							</div-->
					 </div>
				</li>
			</ul>
        </li>
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url();?>register">
              <span class="hidden-xs">Daftar</span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
	
	
  </header>