<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h1 class="text-center">Unggah Dokumen</h1>

<h1 class="text-center"></h1>

<form>
	
<?php echo form_open_multipart('Siswa/daftar_ulang', 'class="form-horizontal"');?>
<div class="form-group">
	<label class="col-sm-2 control-label">Unggah Bukti Pembayaran :</label>
	<div class="col-sm-10">
		<input type="file" name="berkas">
	</div>
</div>

<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
		<label>
			<input class="btn btn-primary" type="submit" value="daftar">
		</label>
	</div>
</div>

</form>