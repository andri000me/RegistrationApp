<script>

	function validasii(formm){
			var a = formm.nama_guru.value;
			var b = formm.kd_guru.value;
			var c = formm.no_telp.value;
			var number=/^[0-9]+$/;

		if(b.length>5 && a.length > 100){
			alert("Maaf Jumlah Huruf Yang Dimasukkan Pada Kode Guru dan Nama Guru Melewati Batas Maksimum");
			formm.kd_guru.focus();
			return false;
		}else if(b.length>=5){
			alert("Maaf Kode Guru Tidak Boleh Lebih Dari 5 Huruf");
			formm.kd_guru.focus();
			return false;
		}else if(a.length > 100){
			alert("Maaf Nama Guru Tidak Boleh Lebih Dari 100 Huruf");
			formm.nama_guru.focus();
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
        <h5 class="panel-title">Tambah Guru</h5>
    </div>

	<form name="formm" class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/simpan_guru" onsubmit="return validasii(this);">

			<div class="panel-body">

							<div class="form-group">
								<label class="col-sm-2 control-label">KODE GURU :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="kd_guru" placeholder="masukkan kode guru" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">NIP :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="nip" placeholder="masukkan nip guru">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">NAMA GURU :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="nama_guru" placeholder="masukkan nama guru" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">JENIS KELAMIN :</label>
								<div class="col-sm-4">
									<select class="select" name="jk">
										<option value="">Jenis Kelamin</option>
										<option value="laki-laki">Laki-laki</option>
										<option value="perempuan">Perempuan</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Agama :</label>
								<div class="col-sm-4">
									<select class="select" name="agama" required>
										<option value="" selected>Pilih Agama</option>
										<option value="islam">Islam</option>
										<option value="kristen">Kristen</option>
										<option value="katolik">Katolik</option>
										<option value="hindu">Hindu</option>
										<option value="buddha">Buddha</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Alamat :</label>
								<div class="col-sm-6">
									<textarea name="alamat" rows="3" cols="3" class="form-control" placeholder="Masukkan Alamat" required></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-1 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">
										Tambah
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('admin/kelola_pegawai_guru');;?>">
										Kembali
									</a>
								</div>
							</div>
			</div>
	</form>
			
</div>
<script>
    <?php if($this->session->flashdata('pesan')=='kode') { ?>
        $(document).ready(function(){
            alert('kode guru guru sudah digunakan');
        });
    <?php } elseif($this->session->flashdata('pesan')=='nip') { ?>
        $(document).ready(function(){
            alert('guru dengan NIP yang dimasukkan sudah ada');
        });
    <?php }  ?>
</script> 