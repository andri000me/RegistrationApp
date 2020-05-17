<script type="text/javascript">
	function validasi(form){
		if(form.pass.value != md5(form.password.value)){
			alert("Password Lama Tidak Sama");
			form.password.focus();
			return false;
		}
		else if(form.password1.value != form.password2.value){
			alert("Isi Masukkan Password Baru Harus Sama Dengan Ulangi Password");
			form.password2.focus();
			return false;
		}else if(form.password1.value == form.password2.value && form.pass.value == md5(form.password.value) && form.pass.value == md5(form.password1.value)){
				alert("Password Baru sama dengan password lama");
				form.password1.focus();
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
        <h5 class="panel-title">Ubah Password</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

	<form name="form" class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>Keuangan/simpan_password" onsubmit="return validasi(this);">

			<div class="panel-body">
						<?php
							foreach($user->result()as $row) { ?>
							<div class="form-group">
								<label class="col-sm-3 control-label">Username</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="username" value="<?php echo $row->username;?>" readonly>
								</div>
							</div>
							<input type="hidden" class="form-control" name="pass" value="<?php echo $row->password;?>">
							<div class="form-group">
								<label class="col-sm-3 control-label">Password Lama*</label>
								<div class="col-sm-5">
									<input type="password" placeholder="Password Lama" class="form-control" name="password" maxlength="20" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Password Baru*</label>
								<div class="col-sm-5">
									<input type="password" placeholder="Password Baru" class="form-control" name="password1" maxlength="20" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Ulangi Password*</label>
								<div class="col-sm-5">
									<input type="password" placeholder="Ulangi Password" class="form-control" name="password2" maxlength="20" required>
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

<script>
<?php if($this->session->flashdata('pesan')=='berhasil') { ?>
$(document).ready(function(){
alert('Terimakasih, password berhasil diubah');
});
<?php }?>
</script>