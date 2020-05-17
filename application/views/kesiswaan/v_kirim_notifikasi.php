<div class="col-md-12">
	<form action="<?php echo base_url(); ?>Kesiswaan/kirim_notifikasi" class="form-horizontal" method="post">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">KIRIM NOTIFIKASI</h5>
					<div class="heading-elements">
						<ul class="icons-list">
                			<li><a data-action="collapse"></a></li>
                			<li><a data-action="reload"></a></li>
                			<li><a data-action="close"></a></li>
                		</ul>
					</div>
			</div>

	<?php foreach ($list_siswa->result() as $row) {?>
	
			<div class="panel-body">
				<div class="form-group">
					<label class="col-lg-2 control-label">Your message:</label>
						<div class="col-lg-9">
							<textarea name="ket" rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
						</div>
				</div>

				<input name="username" type="hidden" class="form-control" value="<?php echo $row->nis; ?>">

				<div class="col-lg-6">
					<div class="text-left">
						<button name="tombol" type="submit" class="btn btn-success" value="konfirmasi">Konfirmasi<i class="icon-arrow-right16 position-right"></i></button>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</form>
</div>

		