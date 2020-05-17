<div class="col-md-12">

						<!-- Basic layout-->
					<form name="formm" enctype="multipart/form-data" action="<?php echo base_url(); ?>Siswa/upload_ulang_rapor" class="form-horizontal validation" method="post" onsubmit="return validasii(this);">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Pembayaran Iuran Online</h5>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

								<div class="panel-body">

									<div class="form-group">
										<label class="col-lg-2 control-label">Upload Rapor:</label>
										<div class="col-sm-3">
											<input type="file" class="file-styled" name="rapor" accept="application/pdf" required>
											<span class="help-block">Accepted formats: .Pdf Max file size 2Mb</span>
										</div>
									</div>
											<input name="id_daftar" type="hidden" class="form-control" value="<?php echo $id_daftar;?>">

									<div class="text-left">
										<button type="submit" name="submit" class="btn btn-success" value="submit">Upload<i class="icon-arrow-right14 position-right"></i></button>
									</div>
																		
								</div>
							</div>
						</form>

						<!-- /basic layout -->

</div>

<script type="text/javascript">
<?php if($this->session->flashdata('pesan')=='max'){ ?>
$(document).ready(function(){
alert('Maaf, Ukuran File Tidak Boleh Lebih Dari 2 MB');
});
<?php } ?>
</script>