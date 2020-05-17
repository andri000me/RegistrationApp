<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="panel panel-flat col-sm-8">
    <div class="panel-heading">
        <h5 class="panel-title">Atur Wali Kelas</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

	<form name="formm" class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/update_walikelas_ajaran_baru" onsubmit="return validasii(this);">

			<div class="panel-body">
							<input type="hidden" class="form-control" name="thn_ajar" value="<?php echo $this->session->userdata('thn_ajar');?>">
							<input type="hidden" class="form-control" name="semester" value="<?php echo $this->session->userdata('semester');?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Kelas :</label>
								<div class="col-sm-4">
									<select class="select" name="kelas">
										<?php foreach($kelas->result() as $row){?>
											<option value="<?php echo $row->kd_kelas; ?>"><?php echo $row->nama_kelas; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Wali Kelas :</label>
								<div class="col-sm-4">
									<select class="select" name="guru">
										<?php foreach($guru->result() as $row){?>
											<option value="<?php echo $row->kd_guru; ?>"><?php echo $row->nama_guru; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Tahun ajaran :</label>
								<div class="col-sm-4">
									<select class="select" name="thn_ajar">
										<?php foreach($thn->result() as $row){?>
											<option value="<?php echo $row->tahun_ajaran; ?>"><?php echo $row->tahun.' - '.$row->semester; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Kuota Kelas :</label>
								<div class="col-sm-4">
									<input type="number" class="form-control" name="kuota" placeholder="masukkan kuota kelas" required>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-1 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">
										Submit
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('admin/kelola_walikelas');?>">
										Kembali
									</a>
								</div>
							</div>
			</div>
	</form>
			
</div>
<script>
    <?php if($this->session->flashdata('pesan')=='gagal') { ?>
        $(document).ready(function(){
            alert('maaf guru yang dipilih sudah menjadi wali kelas kelas lain atau kelas sudah memiliki wali kelas');
        });
    <?php } ?>
</script> 