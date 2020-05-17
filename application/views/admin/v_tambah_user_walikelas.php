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
        <h5 class="panel-title">Tambah User Wali Kelas</h5>
    </div>

	<form name="formm" class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/simpan_user_walikelas" onsubmit="return validasii(this);">

			<div class="panel-body">

							<div class="form-group">
								<label class="col-sm-2 control-label">USERNAME :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="username" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">PASSWORD :</label>
								<div class="col-sm-4">
									<input type="password" class="form-control" name="password" required>
								</div>
							</div>							

							<div class="form-group">
								<label class="col-sm-2 control-label">NAMA GURU :</label>
								<div class="col-sm-4">
									<select class="select" name="kd_guru" required>
										<option value="">pilih guru</option>
										<?php foreach($guru->result() as $row){?>
											<option value="<?php echo $row->kd_guru; ?>"><?php echo $row->nama_guru;?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">KATEGORI USER :</label>
								<div class="col-sm-4">
										<?php foreach($kategori->result() as $row){?>
											<input type="text" name="kategori" class="form-control" value="<?php echo $row->nama_kategori;?>" readonly>
											<input type="hidden" name="id_kategori" class="form-control" value="<?php echo $row->id_kategori;?>" readonly>
								</div>
							</div>
							<input type="hidden" value="<?php echo $row->id_kategori;?>" readonly>
							<?php }?>
							<div class="form-group">
								<div class="col-sm-offset-1 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">
										Tambah
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('admin/kelola_user');?>">
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