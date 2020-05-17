<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/ace.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/ace-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>res/css/main.css">
</head>

<div class="row">
	<b><h1 class="col-md-12 text-center">Unggah Dokumen</h1></b>
</div>

<?php foreach($status as $row){?>
<div class="container">

<div class="form-group">
	<div class="row">
		<label class="col-sm-offset-4 col-sm-2 control-label">NIS Siswa</label>
		<label class="col-sm-1 control-label">:</label>
		<label class="col-sm-2 control-label"><?php echo $row->nis; ?></label>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<label class="col-sm-offset-4 col-sm-2 control-label">Nama Siswa</label>
		<label class="col-sm-1 control-label">:</label>
		<label class="col-sm-2 control-label"><?php echo $row->nama_siswa; ?></label>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<label class="col-sm-offset-4 col-sm-2 control-label">Status Registrasi</label>
		<label class="col-sm-1 control-label">:</label>
		<label class="col-sm-2 control-label"><?php echo $row->status; ?></label>
	</div>
</div>

</div>
<?php } ?>
</form>
