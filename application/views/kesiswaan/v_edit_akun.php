<?php $this->load->model('M_admin');?>

<script type="text/javascript">
	function validasi(form){
		var cekemail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		
		if(form.email.value.length > 1 && !cekemail.test(form.email.value)){
			alert("Alamat Email Tidak Valid");
			form.email.focus();
			return false;
		}
		else{
			return true;
		}
	}
</script>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="panel panel-flat col-sm-8">
    <div class="panel-heading">
        <h5 class="panel-title">Riwayat Pengajuan Registrasi</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

	<form class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/update_user" onsubmit="return validasi(this);">

			<div class="panel-body">
				<?php
						foreach($user->result() as $row) { ?>
							<div class="form-group">
								<label class="col-sm-2 control-label">Username</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="username" value="<?php echo $row->username;?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Password</label>
								<div class="col-sm-4">
									<input type="password" class="form-control" name="password" value="<?php echo md5($row->password);?>" disabled>
								</div>
								<?php echo anchor('/Admin/ubah_password/'.$row->username,
									'<div class="on-default edit-row"><i class="icon-pencil4"></i></div>');
								?>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Status User</label>
								<div class="col-sm-4">
									<select class="select" name="status_user">
										<option value="Aktif" <?php echo ($row->status_user=='aktif'?'selected="selected"':'');?>>Aktif</option>
										<option value="Non-Aktif" <?php echo ($row->status_user=='non-Aktif'?'selected="selected"':'');?>>Non-Aktif</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-1 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">
										Update
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('admin/kelola_user');?>">
										Kembali
									</a>
								</div>
							</div>
						<?php	
							}
						?>

			</div>
	</form>
			
</div> <!-- content page -->