<script type="text/javascript">

	function validasii(formm){
			var a = formm.nama_pegawai.value;
			var b = formm.kd_pegawai.value;
			var c = formm.no_telp.value;
			var number=/^[0-9]+$/;

		if(b.length>5 && a.length > 100){
			alert("Maaf Jumlah Huruf Yang Dimasukkan Pada Kode Pegawai dan Nama Pegawai Melewati Batas Maksimum");
			formm.kd_pegawai.focus();
			return false;
		}else if(b.length>5){
			alert("Maaf Kode Pegawai Tidak Boleh Lebih Dari 5 Huruf");
			formm.kd_pegawai.focus();
			return false;
		}else if(a.length > 100){
			alert("Maaf Nama Pegawai Tidak Boleh Lebih Dari 100 Huruf");
			formm.nama_pegawai.focus();
			return false;
		}else if(c.length > 13 || c.length < 11){
			alert("Maaf Panjang No Telpon Harus 11, 12, atau 13 Angka");
			formm.no_telp.focus();
			return false;
		}else{
			return true;
		}
	}
</script>

<div class="panel panel-flat col-sm-8">
    <div class="panel-heading">
        <h5 class="panel-title">Tambah Pegawai</h5>
    </div>

	<form name="formm" class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/simpan_pegawai" onsubmit="return validasii(this);">

			<div class="panel-body">

							<div class="form-group">
								<label class="col-sm-2 control-label">KODE PEGAWAI :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="kd_pegawai" placeholder="masukkan kode pegawai" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">NAMA PEGAWAI :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="nama_pegawai" placeholder="masukkan nama pegawai" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">BAGIAN :</label>
								<div class="col-sm-4">
									<select class="select" name="bagian" required>
											<option value="">pilih bagian pegawai</option>
											<option value="kesiswaan">Kesiswaan</option>
											<option value="keuangan">Keuangan</option>										
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">JENIS KELAMIN :</label>
								<div class="col-sm-4">
									<select class="select" name="jk" required>
										<option value="">pilih jenis kelamin</option>
										<option value="laki-laki">Laki-laki</option>
										<option value="perempuan">Perempuan</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-1 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">
										Tambah
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('admin/kelola_pegawai_guru');?>">
										Kembali
									</a>
								</div>
							</div>
			</div>
	</form>
			
</div>
<script>
    <?php if($this->session->flashdata('pesan')=="unavailable") { ?>
        $(document).ready(function(){
            alert('Pegawai Sudah Ada');
        });
    <?php } ?>
</script> 