<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images'); ?>/header.jpeg">
	<link rel="icon" sizes="512x512" href="<?php echo base_url('assets/images'); ?>/header.jpeg">
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/drilldown.js"></script>
	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 hidden-xs hidden-sm login-picture"></div>
			<div class="col-md-6 login-section">
				<div class="col-xs-10 col-xs-offset-1 login-child">
					<h1>Login Aplikasi</h1>
					<ul class="nav nav-tabs nav-justified login-select">
						<li role="presentation"  class="active">
							<a href="<?php echo base_url();?>Home/pegawai"><i class="fa fa-fw fa-user" aria-hidden="true"></i> Pegawai</a>
						</li>
						<li role="presentation">
							<a href="<?php echo base_url();?>Home/walikelas"><i class="fa fa-fw fa-user" aria-hidden="true"></i> Wali Kelas</a>
						</li>
					</ul>
					<form name="form" id="form" method="post" action="<?php echo base_url();?>Home/login_pegawai">
						<div class="form-group">
							<label for="InputEmail1">User Name</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="User Name" required>
						</div>
						<div class="form-group">
							<label for="InputPassword1">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
						</div>
						<button type="submit" name="submit" class="btn btn-success btn-lg">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script>
    <?php if($this->session->flashdata('pesan')=="username"){ ?>
            $(document).ready(function(){
            alert('Username yang anda masukkan salah');
        });
   <?php } else if($this->session->flashdata('pesan')=="password"){ ?>
            $(document).ready(function(){
            alert('Password yang anda masukkan salah');
        });
    <?php } ?>    	
</script>