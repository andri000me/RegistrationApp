<script>
    function lunas(){
        var a = $('#jenis_bayar').val();
        var b = $('#sisa_iuran').val();
        // var c  = $('#thn').val();
        if (a=="Lunas") {
			$.ajax({
            	url:"<?php echo base_url();?>Keuangan/lunas/"+b,
            		success:function(data){
                	// alert(data);
                	$('#jlh').html(data);
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
					<form name="formm" enctype="multipart/form-data" action="<?php echo base_url(); ?>Keuangan/konfirmasi_bayar_iuran_langsung" class="form-horizontal validation" method="post" onsubmit="return validasii(this);">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Pembayaran Langsung</h5>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>

								<div class="panel-body">

								<?php foreach ($iuran->result() as $row) { 
										$total_bayar=0;
											
											foreach ($riwayat_bayar->result() as $row) {

												$total_bayar = $total_bayar+$row->jumlah_dibayarkan;

											}
											
											$sisa_iuran=$row->total_tagihan-$total_bayar; ?>

									<div class="form-group">
										<label class="col-lg-2 control-label">Nama Siswa:</label>
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
											 }elseif($row->bulan==12){
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
								<?php } ?>

								<?php foreach ($iuran->result() as $row) { ?>

									<div class="form-group">
										<label class="col-lg-2 control-label">Tipe Pembayaran:</label>
										<div  class="col-lg-3">
											<select class="select" name="jenis_bayar" id="jenis_bayar" onChange="lunas()">
											<?php
											if($sisa_iuran<=25000){?>
														<option value="Lunas">Lunas</option>
												<?php }else{?>
													 	<option value="Kredit">Kredit</option>
														<option value="Lunas">Lunas</option>
												<?php } ?>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-lg-2 control-label">Jumlah Bayar</label>
									
										<div id='jlh' class="col-lg-3">
											<select class="select" name="jumlah" id="jumlah" required>
											<?php
											if($sisa_iuran<=25000){?>
															<option value="<?php echo $sisa_iuran?>"><?php echo $sisa_iuran; ?></option>
												<?php }else{
													 	for($i=$sisa_iuran-25000 ; $i>=25000 ; $i=$i-25000){ ?>	
															<option value="<?php echo $i?>"><?php echo $i; ?></option>
												<?php 
														} 
													} ?>
											</select>
										</div>
										
									</div>
											<input name="tipe" type="hidden" class="form-control" value="online">
											<input name="id_iuran" id="id" type="hidden" class="form-control" value="<?php echo $row->id_iuran; ?>">
											<input name="nis" type="hidden" class="form-control" value="<?php echo $row->nis; ?>">

									<div class="text-left">
										<button type="submit" name="submit" class="btn btn-success">Bayar<i class="icon-arrow-right14 position-right"></i></button>
									</div>
																		
								</div>
							<?php }?>
							</div>
						</form>

						<!-- /basic layout -->

</div>
