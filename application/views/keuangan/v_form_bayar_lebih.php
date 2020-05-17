<script>

    function displayResult1(frm){   
 		var selectedbuah=0;
    	for (i = 0; i < frm.bulan.length; i++){ //menghitung jumlah panjang array
  			if (frm.bulan[i].checked){   
   				selectedbuah = parseInt(frm.sisa_bulan[i].value) + parseInt(selectedbuah);
  			}
    	}
    	var total = parseInt(selectedbuah);
 //memunculkan data di input id result yg isinya select buah
    	document.getElementById("result").value=total;
	}

    function displayResult(frm){   
 		var selectedbuah=0;
 		var chks = document.getElementsByName("bulan[]");
 		var sisa = document.getElementsByName("sisa_bulan[]");
    	for (i = 0; i < frm.elements['bulan[]'].length; i++){ //menghitung jumlah panjang array
  			if (frm.elements['bulan[]'][i].checked){
   				selectedbuah = parseInt(frm.sisa_bulan[i].value) + parseInt(selectedbuah);
  			}
    	}
    	var total = parseInt(selectedbuah);
 //memunculkan data di input id result yg isinya select buah
   		document.getElementById("result").value=total;
	}

    function validasii(formm){
    	var checked = $("input[type=checkbox]:checked").length;

      	if(!checked) {
        	alert("silahkan pilih salah satu bulan untuk dibayar.");
        	formm.total.focus();
        	return false;
      	}else{
			return true;
		}
	}

</script>


<div class="col-md-12">

						<!-- Basic layout-->
					<form name="formm" enctype="multipart/form-data" action="<?php echo base_url(); ?>Keuangan/konfirmasi_bayar_lebih" class="form-horizontal validation" method="post" onsubmit="return validasii(this);">
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
									
									<div class="form-group">
										<label class="col-lg-2 control-label">Pilih bulan yang akan dibayar:</label>
										</br>
										</br>
										<div  class="col-lg-6">

										<?php 
	 										$no = 0;
	 										$sisa_total=0;
                  							foreach($list_iuran->result() as $row) {

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
											 }

                   								$total_bayar=0;
                                     
                      							foreach ($riwayat_bayar->result() as $key) {
	                      							if($key->id_iuran == $row->id_iuran && $key->status_bayar=='selesai'){
    	                      							$total_bayar = $total_bayar+$key->jumlah_dibayarkan;     
                           							}
                       							}
                            							
                            					$sisa_iuran=$row->total_tagihan-$total_bayar;

                            					if($sisa_iuran>0){ 
                            						$no++;
                       					?>	

                            						<input type="checkbox" name="bulan[]" onclick="displayResult(this.form)" value="<?php echo $a;?>"> <b><?php echo $a;?></b><br>
                            						<label class="col-lg-2 control-label">sisa iuran:</label>
													<div  class="col-lg-3">
														<input name="sisa_bulan" type="text" class="form-control" value="<?php echo $sisa_iuran;?>" readonly>
														<input name="sisa_iuran_bulan[]" type="hidden" class="form-control" value="<?php echo $sisa_iuran;?>" readonly>
													</div>
													</br>
													</br>
													</br>
													<input name="id_iuran[]" type="hidden" class="form-control" value="<?php echo $row->id_iuran;?>" readonly>

                            			<?php 
                         						}
                         						$sisa_total=$sisa_total+$sisa_iuran;
                         						$nis=$row->nis;
                         						$nama=$row->nama_siswa;
                            				} 
                            			?> 
		
										</div>
									</div>

									<input name="jlh_bulan" type="hidden" class="form-control" value="<?php echo $no;?>" readonly>
									<input name="nis" type="hidden" class="form-control" value="<?php echo $nis;?>" readonly>
									<input name="nama_siswa" type="hidden" class="form-control" value="<?php echo $nama;?>" readonly>

									<div id="extends" class="form-group">
										<label class="col-lg-1 control-label">total bayar:</label>
											<div  class="col-lg-3">
												<input name="total" id="result" type="text" class="form-control" value="<?php echo 0;?>" readonly>
											</div>
									</div>

									<div class="text-left">
										<button type="submit" name="submit" class="btn btn-success">Bayar<i class="icon-arrow-right14 position-right"></i></button>
									</div>
																		
								</div>
							</div>
						</form>

						<!-- /basic layout -->

</div>