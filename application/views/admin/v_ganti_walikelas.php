<script type="text/javascript">

	function validasii(formm){
		if(formm.kd_guru.value == $ formm.kodeg.value){
			alert("Wali Kelas Sama Dengan Yang Lama");
			formm.kd_guru.focus();
			return false;
			
		}else{
			return true;
		}
	}
</script>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="panel panel-flat col-sm-8">
    <div class="panel-heading">
        <h5 class="panel-title">Ganti Wali Kelas</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

	<form name="formm" class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/simpan_pergantian_walikelas" onsubmit="return validasii(this);">

			<div class="panel-body">

							<?php foreach($walikelas->result() as $row){ ?>

								<input type="hidden" class="form-control" name="kodeg" value="<?php echo $row->kd_guru;?>">
								<input type="hidden" class="form-control" name="id_walikelas" value="<?php echo $row->id_kelas_dibentuk;?>">


							<div class="form-group">
								<label class="col-sm-2 control-label">KELAS</label>
								<div class="col-sm-4">
									<select class="select" name="kd_kelas" readonly>
											<option value="<?php echo $row->kd_kelas; ?>"><?php echo $row->nama_kelas; ?></option>
									</select>
								</div>
							</div>
							<?php }?>

							<div class="form-group">
								<label class="col-sm-2 control-label">WALI KELAS</label>
								<div class="col-sm-4">
									<select class="select" name="kd_guru">
										<?php foreach($guru->result() as $row){?>
											<option value="<?php echo $row->kd_guru; ?>"><?php echo $row->nama_guru; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-1 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">
										Update
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('admin/kelola_walikelas');?>">
										Kembali
									</a>
								</div>
							</div>
			</div>
	</form>
			
</div>