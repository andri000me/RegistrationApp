<script type="text/javascript">

	function validasii(formm){
			var a = formm.angka.value;
			var b = formm.nama_kelas.value;
			var number=/^[0-9]+$/;

		if(!a.match(number)){
			alert("Masukan Angka Kelas Harus Angka");
			formm.angka.focus();
			return false;
			
		}else if(b.length > 50){
			alert("Nama Kelas Maksimal 50 Huruf");
			formm.nama_kelas.focus();
			return false;
		}else{
			return true;
		}
	}
</script>

<div class="panel panel-flat col-sm-8">
    <div class="panel-heading">
        <h5 class="panel-title">Tambah Kelas</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

	<form name="formm" class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/simpan_kelas" onsubmit="return validasii(this);">

			<div class="panel-body">

							<div class="form-group">
								<label class="col-sm-2 control-label">NAMA KELAS :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="nama_kelas" placeholder="masukkan nama kelas" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">TINGKAT :</label>
								<div class="col-sm-4">
									<select class="select" name="tingkat" required>
											<option value="">pilih tingkat</option>
											<option value="1">Satu</option>
											<option value="2">Dua</option>
											<option value="3">Tiga</option>
										
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">PROGRAM STUDI :</label>
								<div class="col-sm-4">
									<select class="select" name="prodi" required>
										<option value="">pilih program studi</option>
										<?php foreach($prodi->result() as $row){?>
											<option value="<?php echo $row->kd_prodi; ?>"><?php echo $row->nama_prodi; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">ANGKA KELAS :</label>
								<div class="col-sm-4">
									<select class="select" name="angka" required>
											<option value="">pilih angka</option>
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-1 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">
										Tambah
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('admin/kelola_kelas');?>">
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
            alert('Kelas Sudah Ada');
        });
    <?php } ?>
</script> 