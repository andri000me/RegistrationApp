<?php $this->load->model('M_walikelas');

			$user = $this->session->userdata('username');
			$kd = $this->session->userdata('primary_key');
			$kategori = $this->session->userdata('kategori');

			$nama=$this->M_kesiswaan->get_data_user($kd);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMKN 02 Kepahiang</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images'); ?>/header.jpeg">
	<link rel="icon" sizes="512x512" href="<?php echo base_url('assets/images'); ?>/header.jpeg">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/drilldown.js"></script>
	<!-- /core JS files -->

	<!-- /theme JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery_ui/datepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery_ui/effects.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/anytime.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/pickadate/legacy.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/c3/c3.min.js"></script>


	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_data_sources.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/charts/c3/c3_axis.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/picker_date.js"></script>
	
    
</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo base_url();?>Walikelas"><b>SMKN 02 Kepahiang </b></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

				</ul>

			<p class="navbar-text"><span class="label bg-success-400">Online</span></p>

			<ul class="nav navbar-nav navbar-right">
				
				<?php foreach($nama->result() as $j){
					$nama_user=$j->nama_pegawai;
					$kd=$j->kd_pegawai;
				}?>
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url(); ?>assets/images/placeholder.jpg" alt="">
						<span><?php echo $nama_user;?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php echo base_url();?>Walikelas/keluar"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page header -->
	<div class="page-header">
		<div class="breadcrumb-line breadcrumb-line-wide">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url();?>Walikelas"><i class="icon-home2 position-left"></i> Home</a></li>
				<li class="active">Dashboard</li>
			</ul>
		</div>

		
	<!-- /page header -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-title h6">
							<span>Main navigation</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content sidebar-user">
							<div class="media">
								<a class="media-left"><img src="<?php echo base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $nama_user;?></span>
									<div class="text-size-mini text-muted">
										<i class="text-size-small"></i><?php echo $kategori;?>
									</div>
								</div>
							</div>
						</div>

						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class=""><a href="<?php echo base_url();?>Siswa"><i class="icon-home4"></i> <span>HOME</span></a></li>
								<li><a href="<?php echo base_url();?>Kesiswaan/ubah_password_user"><i class="icon-key"></i> <span>Ubah Password</span></a></li>
								
								<!-- /main -->

								<li class="navigation-header"><span>Kesiswaan</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="<?php echo base_url();?>Kesiswaan/status_daftar_ulang"><i class="icon-cash3"></i> <span>Siswa Belum Daftar Ulang</span></a></li>
								<li><a href="<?php echo base_url();?>Kesiswaan/riwayat_daftar_ulang"><i class="icon-credit-card"></i> <span>Riwayat Daftar Ulang Siswa</span></a></li>
								<li><a href="<?php echo base_url();?>Kesiswaan/laporan_daftar_ulang"><i class="icon-credit-card"></i> <span>Laporan Daftar Ulang Siswa</span></a></li>
								<li><a href="<?php echo base_url();?>Kesiswaan/atur_waktu_daftar_ulang"><i class="icon-credit-card"></i> <span>Atur Waktu Daftar Ulang</span></a></li>
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">
				<?php $this->load->view($content_view);?>
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->


		<!-- Footer -->
		
		<!-- /footer -->

	</div>
	<!-- /page container -->

</body>
</html>
