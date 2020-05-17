<script type="text/javascript">

	function validasii(formm){
			var a = formm.username.value;
			var b = formm.password.value;
			var c = formm.no_telp.value;
			var number=/^[0-9]+$/;

		if(a.length<6){
			alert("Maaf username tidak boleh kurang dari 6 huruf");
			formm.username.focus();
			return false;
		}else if(a.username>40){
			alert("Maaf username maksimal 40 huruf");
			formm.username.focus();
			return false;
		}else if(a.length > 6){
			alert("Maaf password tidak boleh kurang dari 6 huruf");
			formm.password.focus();
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
        <h5 class="panel-title">Tambah User Pegawai</h5>
    </div>

	<form name="formm" class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/simpan_user_pegawai" onsubmit="return validasii(this);">

			<div class="panel-body">

							<div class="form-group">
								<label class="col-sm-2 control-label">USERNAME :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="username" placeholder="masukkan username 6-40 huruf" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">PASSWORD :</label>
								<div class="col-sm-4">
									<input type="password" class="form-control" name="password" placeholder="masukkan password 6-40 huruf" required>
								</div>
							</div>							

							<div class="form-group">
								<label class="col-sm-2 control-label">NAMA PEGAWAI :</label>
								<div class="col-sm-4">
									<select class="select" name="kd_pegawai">
										<option value="">pilih pegawai</option>
										<?php foreach($pegawai->result() as $row){?>
											<option value="<?php echo $row->kd_pegawai; ?>"><?php echo $row->nama_pegawai;?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">KATEGORI USER :</label>
								<div class="col-sm-4">
									<select class="select" name="id_kategori" required>
										<option value="">pilih kategori user</option>
										<?php foreach($kategori->result() as $row){?>
											<option value="<?php echo $row->id_kategori;?>"><?php echo $row->nama_kategori;?></option>
										<?php }?>
									</select>
								</div>
							</div>
							
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
            alert('username Sudah digunakan');
        });
    <?php } ?>
</script> 