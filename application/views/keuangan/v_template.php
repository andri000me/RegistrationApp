<?php $this->load->model('M_keuangan');

			$user = $this->session->userdata('username');
			$kd = $this->session->userdata('primary_key');

			$notifikasi=$this->M_keuangan->get_notifikasi($user);
			$notif=$this->M_keuangan->get_notifikasi_lebih($user);
			$nama=$this->M_keuangan->get_data_user($kd);
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
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/pickers/daterangepicker.js"></script>

	<!-- /theme JS files -->

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/wizards/steps.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/extensions/cookie.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/wizard_steps.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/encrypt/md5.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_data_sources.js"></script>
	
	
</head>

<script type="text/javascript">
	$(document).on("click","#notifikasi",function(e){
    $.ajax({
        url:"<?php echo site_url('Keuangan/update_notifikasi/') ?>",
        success:function(msg){
            $("#pesan").html(msg);
        },
        error: function(result){
            $("notifikasi").html("Error");
        }
    });
    });
</script>

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

				<?php 
					$jlh=0;
					foreach ($notif->result() as $key) {
						if($key->status_pesan=='belum terbaca'){
							$jlh++;
						}
					}
				?>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bell3"></i>
						<span class="visible-xs-inline-block position-right">Notifikasi</span>
						<span class="badge bg-warning-400"><?php echo $jlh;?></span>
					</a>
					
					<div class="dropdown-menu dropdown-content width-350" id='pesan'>
						<div class="dropdown-content-heading">
							Notifikasi
							<ul class="icons-list">
							</ul>
						</div>
					<?php foreach ($notifikasi->result() as $row) { ?>

						<a href="<?php echo base_url().$row->link;?>">
						<ul class="media-list dropdown-content-body">
							<li class="media">
								<div class="media-left">
									<img src="<?php echo base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
									<span class="badge bg-danger-400 media-badge"></span>
								</div>

								<div class="media-body">
									<div class="media-heading">
										<span class="text-semibold"><?php echo $row->nama_pengirim;?></span>
										<span class="media-annotation pull-right"></span>
									</div>

									<span class="text-muted"><?php echo $row->pesan;?></span>
								</div>
							</li>
						</ul>
						</a>
					<?php } ?>

						<div class="dropdown-content-footer" >
							<a  id="notifikasi" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
						</div>
					</div>
				</li>

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
								<a href="#" class="media-left"><img src="<?php echo base_url(); ?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $nama_user;?></span>
									<div class="text-size-mini text-muted">
										<i class="text-size-small"></i> &nbsp;<?php echo $kd;?>
									</div>
								</div>
							</div>
						</div>

						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class=""><a href="<?php echo base_url(); ?>Keuangan/"><i class="icon-home4"></i> <span>HOME</span></a></li>
								<!--<li><a href="index.html"><i class="icon-user"></i> <span>Ubah Profil</span></a></li>-->
								<li><a href="<?php echo base_url(); ?>Keuangan/ubah_password_user"><i class="icon-key"></i> <span>Ubah Password</span></a></li>
								
								<!-- /main -->

								<li class="navigation-header"><span>Pembayaran Iuran</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="<?php echo base_url(); ?>Keuangan/bayar_iuran_langsung"><i class="icon-cash3"></i> <span>Pembayaran Langsung</span></a></li>
								<li><a href="<?php echo base_url(); ?>Keuangan/bayar_iuran_online"><i class="icon-credit-card"></i> <span>Pembayaran Online</span></a></li>
								<li><a href="<?php echo base_url(); ?>Keuangan/status_pembayaran_siswa"><i class="icon-list-unordered"></i> <span>Status Pembayaran SIswa</span></a></li>
								<li><a href="<?php echo base_url(); ?>Keuangan/riwayat_transaksi_siswa"><i class="icon-book3"></i> <span>Riwayat Transaksi</span></a></li>
								<li><a href="<?php echo base_url(); ?>Keuangan/konfirmasi_status_tagihan"><i class="icon-checkmark"></i> <span>Konfirmasi Status Tagihan</span></a></li>
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
