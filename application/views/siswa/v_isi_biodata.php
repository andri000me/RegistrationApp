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
	<link href="assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/ui/drilldown.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
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

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/form_layouts.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pages/datatables_data_sources.js"></script>
    
</head>

<div class="panel panel-white">
	<form name="form" enctype="multipart/form-data" action="<?php echo base_url();?>Siswa/simpan_biodata"  class="form-horizontal"  method="post">

	            <div class="panel-heading">
						<h1 class="panel-title text-center"><b>Isi Data Diri dan Lengkapi Persyaratan</b></h1>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>

                	
				<div class="panel-body">
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>Foto Diri: <span class="text-danger">*</span></label>
											<input type="file" class="file-styled required" name="siswa0" accept="image/png, image/jpeg" required>
											<span class="help-block">Accepted formats: .jpeg, .png Max file size 2Mb</span>
									</div>
								</div>

								<div class="col-md-offset-1 col-md-5">
									<div class="form-group">
										<label>NISN: <span class="text-danger">*</span></label>
											<input type="number" name="nisn" class="form-control required" placeholder="masukkan NISN anda" required>
									</div>
								</div>
							</div>

							<div class="row">
								
								<div class="col-md-5">
									<div class="form-group">
										<label>Nama lengkap: <span class="text-danger">*</span></label>
										<input type="text" name="nm" class="form-control required" placeholder="masukkan nama anda" required>
									</div>
								</div>

								<div class="col-md-offset-1 col-md-5">
									<div class="form-group">
										<label>Tempat Lahir: <span class="text-danger">*</span></label>
										<input type="text" name="tempat_lahir" class="form-control required" placeholder="masukkan tempat lahir anda" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>Tanggal Lahir:<span class="text-danger">*</span></label>
										<input type="date" name="tgl_lahir" class="form-control required" placeholder="masukkan tanggal lahir anda" required>
									</div>
								</div>

								<div class="col-md-offset-1 col-md-5">
									
										<div class="col-md-4">
											<div class="form-group">
												<label>Jenis Kelamin:<span class="text-danger">*</span></label>
												<div class="radio">
													<label>
														<input type="radio" name="jenkel" value="laki-laki" class="styled required" required>
														Laki-Laki
													</label>
												</div>

												<div class="radio">
													<label>
														<input type="radio" name="jenkel" value="Perempuan" class="styled required" required>
														Perempuan
													</label>
												</div>
											</div>
										</div>
									
								</div>
							</div>

							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>Tahun Diterima: <span class="text-danger">*</span></label>
											<select class="select required" name="thn_diterima" data-placeholder="Pilih tahun Diterima" required>
												<option></option>
											<?php 
												$tahun=date('Y');
												for($i=$tahun-3; $i<=$tahun; $i++){?>
													<option value="<?php echo $i;?>"><?php echo $i;?></option>
											<?php } ?>
											</select>
									</div>
								</div>

								<div class="col-md-offset-1 col-md-5">
									<div class="form-group">
										<label>Asal Sekolah:</label>
											<input type="text" name="sekolah_asal" class="form-control required" placeholder="masukkan asal sekolah" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>Agama: <span class="text-danger">*</span></label>
											<select class="select required" name="agama" data-placeholder="Pilih Agama" required>
												<option></option>
												<option value="Islam">Islam</option>
												<option value="Kristen">Kristen</option>
												<option value="Katholik">Katholik</option>
												<option value="Hindu">Hindu</option>
												<option value="Buddha">Buddha</option>
											</select>
									</div>
								</div>

								<div class="col-md-offset-1 col-md-5">
									<div class="form-group">
										<label>Alamat:</label>
											<textarea name="alamat" rows="5" cols="5" placeholder="Masukkan alamat rumah anda" class="form-control" required></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>No. Telpon:<span class="text-danger">*</span></label>
											<input type="tel" name="telpsis" class="form-control required" placeholder="+62-899-9999-9999" data-mask="+62-899-9999-9999" required>
									</div>
								</div>

									<div class="row">
										<div class="col-md-offset-1 col-md-5">
											<div class="form-group">
												<label>Email Siswa:<span class="text-danger">*</span></label>
												<input type="email" name="email" class="form-control required" placeholder="your@email.com" required>
											</div>
										</div>
									</div>
							</div>

							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>Ijazah: <span class="text-danger">*</span></label>
		                                	<input type="file"  class="file-styled required" name="siswa1" accept="image/png, image/jpeg"  required>
		                                	<span class="help-block">Accepted formats: .jpeg, .png Max file size 2Mb</span>
	                                </div>
								</div>

								<div class="col-md-offset-1 col-md-5">
									<div class="form-group">
										<label>Akte Kelahiran:<span class="text-danger">*</span></label>
	                                    <input type="file" class="file-styled required" name="siswa2" accept="image/png, image/jpeg" required>
	                                    <span class="help-block">Accepted formats: .jpeg, .png Max file size 2Mb</span>
                                    </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>KTP Orang Tua: <span class="text-danger">*</span></label>
		                                <input type="file" class="file-styled required" name="siswa3" accept="image/png, image/jpeg" required>
		                                <span class="help-block">Accepted formats: .jpeg, .png Max file size 2Mb</span>
	                                </div>
	                            </div>

	                            <div class="col-md-offset-1 col-md-5">
									<div class="form-group">
										<label>Kartu keluarga:<span class="text-danger">*</span></label>
		                               	<input type="file" class="file-styled required" name="siswa4" accept="image/png, image/jpeg" required>
		                               	<span class="help-block">Accepted formats: .jpeg, .png Max file size 2Mb</span>
	                                </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>Nama Ayah: <span class="text-danger">*</span></label>
											<input type="text" class="form-control required" name="namaayah" placeholder="masukkan nama lengkap ayah" required>
									</div>
								</div>

								<div class="col-md-offset-1 col-md-5">
									<div class="form-group">
										<label>Nama Ibu: <span class="text-danger">*</span></label>
											<input type="text" class="form-control required" name="namaibu" placeholder="masukkan nama lengkap ibu" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>Pekerjaan Ayah: <span class="text-danger">*</span></label>
											<select class="select required" name="pekerjaanayah" data-placeholder="Pilih pekerjaan ayah" required>
												<option></option>
												<option value="Guru/PNS">Guru/PNS</option>
												<option value="Wirausahawan">Wirausahawan</option>
												<option value="Petani">Petani</option>
												<option value="Wiraswasta">Wiraswasta</option>
												<option value="pegawai">Swasta</option>
											</select>
									</div>
								</div>

								<div class="col-md-offset-1 col-md-5">
									<div class="form-group">
										<label>Pekerjaan Ibu: <span class="text-danger">*</span></label>
											<select class="select required" name="pekerjaanibu" data-placeholder="Pilih pekerjaan ibu" required>
												<option></option>
												<option value="Guru/PNS">Guru/PNS</option>
												<option value="Wirausahawan">Wirausahawan</option>
												<option value="Petani">Petani</option>
												<option value="Wiraswasta">Wiraswasta</option>
												<option value="pegawai">Swasta</option>
											</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label>No. Telpon Orang Tua:<span class="text-danger">*</span></label>
											<input type="tel" name="telportu" class="form-control required" placeholder="+62-899-9999-9999" data-mask="+62-899-9999-9999" required>
									</div>
								</div>
							</div>


									<div class="text-left">
										<button type="submit" name="submit" class="btn btn-success" value="submit">simpan<i class="icon-arrow-right14 position-right"></i></button>
									</div>
								</div>
							</div>
						</form>
</html>