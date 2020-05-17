<script>
    function lunas(){
        var a = $('#jenis_bayar').val();
        var b = $('#sisa_iuran').val();
        // var c  = $('#thn').val();
        if (a=="Lunas") {
			$.ajax({
            	url:"<?php echo base_url();?>siswa/lunas/"+b,
            		success:function(data){
                	// alert(data);
                	$('#jumlah').html(data);
            	}
        	});
		}else{
			window.location.reload();
		}
        
    }

    function validasii(formm){
		if(formm.jlh.value > 125000){
			alert("Maaf Jumlah Pembayaran Tidak Boleh Lebih Dari 125000");
			formm.jlh.focus();
			return false;		
		}else if(formm.jlh.value < 0){
			alert("Maaf Jumlah Pembayaran Tidak Boleh kurang dari 0");
			formm.jlh.focus();
			return false;	
		}else if(formm.jns.value = ''){
			alert("Maaf Silahkan Pilih Tipe Bayar");
			formm.jns.focus();
			return false;
		}else{
			return true;
		}
	}

</script>


<div class="col-md-12">

						<!-- Basic layout-->
			
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Konfirmasi Pembayaran Online</h5>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="reload"></a></li>
					                	</ul>
				                	</div>
								</div>
<form name="formm" enctype="multipart/form-data" action="<?php echo base_url(); ?>Keuangan/konfirmasi_pembayaran_online" class="form-horizontal validation" method="post" onsubmit="return validasii(this);">
		<?php foreach($list_bayar->result() as $row) { ?> 
			
			<div class="panel-body">
			<?php $total_bayar=0;
											
				foreach ($riwayat_bayar->result() as $key) {
					$total_bayar = $total_bayar+$key->jumlah_dibayarkan;
				}
											
				$sisa_iuran=$row->total_tagihan-$total_bayar; ?>

									<div class="form-group">
										<label class="col-lg-2 control-label">Nama Siswa :</label>
										<div class="col-lg-3">
											<input name="nama_siswa" id="nama_siswa" type="text" class="form-control" value="<?php echo $row->nama_siswa; ?>" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-lg-2 control-label">Iuran Bulan:</label>
										<div class="col-lg-3">
											<?php 
											if($row->bulan == '1'){ 
												$a='Januari';
											 }elseif($row->bulan == '2'){ 
										 		$a='Februari';
											 }elseif($row->bulan == '3'){
												$a='Maret';
											 }elseif($row->bulan == '4'){
										 		$a='April';
											 }elseif($row->bulan == '5'){
											 	$a='Mei';
											 }elseif($row->bulan == '6'){
											 	$a='Juni';
											 }elseif($row->bulan == '7'){
											 	$a='Juli';
											 }elseif($row->bulan == '8'){
											 	$a='Agustus';
											 }elseif($row->bulan == '9'){
											 	$a='September';
											 }elseif ($row->bulan == '10') {
											 	$a='Oktober';
											 }elseif($row->bulan == '11'){
											 	$a='November';
											 }elseif($row->bulan=='12'){
												$a='Desember';
											 } ?>
											<input type="text" name='bln' class="form-control" value="<?php echo $a;?>" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-lg-2 control-label">Sisa Iuran:</label>
										<div class="col-lg-3">
											<input name="sisa_iuran" id="sisa_iuran" type="text" class="form-control" value="<?php echo $sisa_iuran; ?>" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-lg-2 control-label">Jumlah Bayar:</label>
										<div class="col-lg-3">
											<input name="jumlah_bayar" id="jumlah_bayar" type="text" class="form-control" value="<?php echo $row->jumlah_dibayarkan; ?>" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-lg-2 control-label">Keterangan Bayar:</label>
										<div class="col-lg-4">
											<textarea rows="4" name="ket" id="ket" type="text" class="form-control" readonly><?php echo $row->keterangan; ?></textarea>
										</div>
									</div>

									<input name="id_bayar" type="hidden" class="form-control" value="<?php echo $row->id_bayar; ?>" readonly>
									<input name="nis" type="hidden" class="form-control" value="<?php echo $row->nis; ?>" readonly>

									<div class="form-group">
										<label class="col-lg-2 control-label">Bukti Bayar:</label>
										<div class="col-lg-3">
											<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">LIHAT FOTO</button>
										</div>
									</div>

									<div class="text-left">
										<button type="submit" name="tombol"  value="tolak" class="btn btn-danger"><i class="icon-arrow-left16 position-right"></i> Tolak </button>
										<button type="submit" name="tombol" value="terima" class="btn btn-success">Terima<i class="icon-arrow-right16 position-right"></i></button>
									</div>
								</div>										
							</div>
						</div>
					</form>

	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">BUKTI PEMBAYARAN</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p><img src="<?php echo base_url(); echo $row->bukti_bayar; ?>" height="600px" width="570px;"></p>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					
				</div>
			</div>
		</div>
	</div>

	<?php } ?>						<!-- /basic layout -->

</div>

