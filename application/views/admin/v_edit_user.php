<script type="text/javascript">
	function validasii(formm){
		if(formm.username.value == formm.user.value && (formm.pass.value == formm.password.value || formm.pass.value == md5(formm.password.value)) && formm.status_user.value == formm.status.value){
			alert("tidak ada perubahan pada data");
			formm.username.focus();
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
        <h5 class="panel-title">Edit User</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

	<form name="formm" class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/update_user" onsubmit="return validasii(this);">

			<div class="panel-body">
				<?php
						foreach($user->result() as $row) { ?>

							<input type="hidden" class="form-control" name="user" value="<?php echo $row->username;?>">
							<div class="form-group">
								<label class="col-sm-2 control-label">Username</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="username" value="<?php echo $row->username;?>" required>
								</div>
							</div>

							<input type="hidden" class="form-control" name="pass" value="<?php echo $row->password;?>" required>
							<div class="form-group">
								<label class="col-sm-2 control-label">Password</label>
								<div class="col-sm-4">
									<input type="password" class="form-control" name="password" value="<?php echo $row->password;?>" required>
								</div>
							</div>

							<input type="hidden" class="form-control" name="status" value="<?php echo $row->status_user;?>" required>

									<input type="hidden" name="status_user" value="<?php echo $row->status_user;?>">
								
							
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
			
</div>
<script>
    <?php if ($this->session->flashdata('pesan')=='bisa kali') {?>
    	 $(document).ready(function(){
            alert('Data Berhasil Diupdate');
        });
    <?php } elseif($this->session->flashdata('pesan')=="username") { ?>
        $(document).ready(function(){
            alert('Username Sudah Digunakan');
        });
    <?php } elseif ($this->session->flashdata('pesan')=="password") {?>
    	 $(document).ready(function(){
            alert('Password yang Dimasukkan Sama Dengan Password Lama');
        });
    <?php } ?>
</script> 