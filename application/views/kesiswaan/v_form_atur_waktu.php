<script>

	function validasi(form){
			var a = form.tgl1.value;
			var b = form.tgl.value;

		if(a<b){
			alert("Maaf tanggal mulai daftar ulang tidak boleh sebelum tanggal hari ini");
			form.tgl1.focus();
			return false;
		}else{
			return true;
		}
	}
</script>

<div class="panel panel-flat">
		<div class="panel-heading">
				<h5 class="panel-title">Atur Waktu Daftar Ulang</h5>
			<div class="heading-elements">
				<ul class="icons-list">
		      		<li><a data-action="reload"></a></li>
		      	</ul>
	        </div>
		</div>

	<div class="panel-body">

		<form name="form" class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>Kesiswaan/simpan_waktu" onsubmit="return validasi(this);">

		<div class="content-group-lg">			
			<p>Silahkan Atur Waktu Daftar Ulang</p>
			<div class="row">
				<div class="col-md-3">
					<input type="text" name="tgl1" class="form-control" id="range-from" placeholder="Dari Tanggal :">
				</div>

				<div class="col-md-3">
					<input type="text" name="tgl2" class="form-control" id="range-to" placeholder="Sampai Tanggal :">
				</div>
			</div>
		</div>

			<input type="hidden" name="tgl" id="tgl" value="<?php echo date('m/d/Y')?>">

		<div class="col-sm-8">
			<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">Submit</button>
			<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('Kesiswaan/atur_waktu_daftar_ulang');?>">Kembali</a>
		</div> 
		</form>
	</div>
</div>