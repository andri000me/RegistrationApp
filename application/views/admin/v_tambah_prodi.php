<script type="text/javascript">

	function validasii(formm){
			var a = formm.nama_prodi.value;
			var b = formm.kd_prodi.value;
			var number=/^[0-9]+$/;

		if(b.length>5 && a.length > 40){
			alert("Maaf Data Yang Dimasukkan Pada Kode Program Studi dan Nama Program Studi Melewati Batas Maksimal");
			formm.kd_prodi.focus();
			return false;
		}else if(b.length>=5){
			alert("Maaf Panjang Kode Program Studi Maksimal 5 Huruf");
			formm.kd_prodi.focus();
			return false;
		}else if(a.length >= 50){
			alert("Maaf Panjang Maksimal Nama Program Studi 50 Huruf");
			formm.nama_prodi.focus();
			return false;
		}else{
			return true;
		}
	}
</script>

<div class="panel panel-flat col-sm-8">
    <div class="panel-heading">
        <h5 class="panel-title">Tambah Program Studi</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

	<form name="formm" class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/simpan_prodi" onsubmit="return validasii(this);">

			<div class="panel-body">

							<div class="form-group">
								<label class="col-sm-3 control-label">KODE PROGRAM STUDI :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="kd_prodi" placeholder="masukkan kode prodi" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">NAMA PROGRAM STUDI :</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="nama_prodi" placeholder="masukkan nama prodi" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">TAHUN PERTAMA :</label>
								<div class="col-sm-4">
									<select class="select" name="thn" required="">
										<option value="">pilih tahun</option>
										<?php 
										$a = date('Y');

										for ($i= 2010; $i <= $a; $i++){?>
											<option value="<?php echo $i;?>"><?php echo $i; ?></option>
										<?php } ?>
											
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">
										Tambah
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('admin/kelola_prodi');?>">
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
            alert('Kode Program Studi Sudah Digunakan atau Program Studi Sudah Ada');
        });
    <?php } ?>
</script> 