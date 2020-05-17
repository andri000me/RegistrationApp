<div class="col-md-12">
	<form action="<?php echo base_url(); ?>Walikelas/Konfirmasi_penolakan_rapor" class="form-horizontal" method="post">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">JUSTIFIKASI PENOLAKAN RAPOR</h5>
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
					<label class="col-lg-2 control-label">Pesan :</label>
						<div class="col-lg-9">
							<textarea name="ket" rows="5" cols="5" class="form-control" placeholder="Enter your message here" required></textarea>
						</div>
				</div>

				<input name="id_daftar" type="hidden" class="form-control" value="<?php echo $id_daftar; ?>">
				<input name="nis" type="hidden" class="form-control" value="<?php echo $nis; ?>">

				<div class="col-lg-6">
					<div class="text-left">
						<button name="tombol" type="submit" class="btn btn-success" value="konfirmasi">Konfirmasi<i class="icon-arrow-right16 position-right"></i></button>
					</div>
				</div>

			</div>
		</div>
	</form>
</div>

		