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


<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Daftar Status Tagihan</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<div class="table-responsive">
						<table class="table">
                    		<thead>
	                        <tr>                            
    	                        <th>Id Iuran</th> 
    	                        <th>Bulan</th>
								<th>Total Tagihan</th>
								<th>Sisa Iuran</th>
    	                        <th class="text-center"> Status Iuran</th>
    	                    </tr>
    		                </thead>
                    
        	            <tbody>                               
        	            <?php 
        	            	$total_semua=0;
        	                foreach($list_iuran->result() as $row) { 
	                            $total_bayar=0;
                                            
	                            foreach ($riwayat_bayar->result() as $key) {
    	                            if($key->id_iuran == $row->id_iuran && $key->status_bayar=='selesai'){
    	                                $total_bayar = $total_bayar+$key->jumlah_dibayarkan;     
    	                            }
    	                        }
    	                        $sisa_iuran=$row->total_tagihan-$total_bayar;?>

        		            <tr>
           	    		        <td> <?php echo $row->id_iuran; ?></td> 
                	    	    <td> <?php echo $row->bulan; ?></td>
								<td> <?php echo $row->total_tagihan; ?></td>
								<td> <?php echo $sisa_iuran; ?></td>
                		        <td class="text-center">
	    	                    <?php if($sisa_iuran==0){ ?>       
    	                            <span class="label label-success">Lunas</span>
    		                    <?php }else if($sisa_iuran>0){ ?>
    	                            <span class="label label-danger">Belum Lunas</span>
    		                    <?php } ?></td>
    		                </tr>
                   		<?php 

                   		$total_semua=$total_semua+$sisa_iuran;
                   		} ?>
                    	</tbody>

						</table>
					</div>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					
				</div>
			</div>
		</div>
	</div>

<div class="col-md-12">

						<!-- Basic layout-->
			
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Konfirmasi Status Tagihan Siswa</h5>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>
			<form name="formm" enctype="multipart/form-data" action="<?php echo base_url(); ?>Keuangan/simpan_konfirmasi_status_tagihan" class="form-horizontal validation" method="post" onsubmit="return validasii(this);">
		<?php foreach($siswa->result() as $row) { ?> 
								<div class="panel-body">

									<div class="form-group">
										<label class="col-lg-2 control-label">Nama Siswa:</label>
										<div class="col-lg-3">
											<input type="text" name='bln' class="form-control" value="<?php echo $row->nama_siswa;?>" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-lg-2 control-label">Status Tagihan Tahun Ajaran:</label>
										<div class="col-lg-3">
											<input name="sisa_iuran" id="sisa_iuran" type="text" class="form-control" value="<?php echo $row->tahun; ?>" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-lg-2 control-label">Semester:</label>
										<div class="col-lg-3">
											<input name="sisa_iuran" id="sisa_iuran" type="text" class="form-control" value="<?php echo $row->semester; ?>" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-lg-2 control-label">Status Tagihan:</label>
										<div class="col-lg-3">
											<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">LIHAT STATUS</button>
										</div>
									</div>
										
										<input name="id_daftar" id="id_daftar" type="hidden" class="form-control" value="<?php echo $id_daftar;?>">
										<input name="nis" id="nis" type="hidden" class="form-control" value="<?php echo $row->nis;?>">

									<div class="text-left">
									<?php if($status=='belum%20lunas'){?>
										
									<?php }else if($total_semua<=0 && $status=='proses'){?>
										<button type="submit" name="tombol" value="lunas" class="btn btn-success">LUNAS<i class="icon-arrow-right16 position-right"></i></button>
									<?php }else if($total_semua > 0  && $status=='proses'){?>
										<button type="submit" name="tombol"  value="belum lunas" class="btn btn-danger"><i class="icon-arrow-left16 position-right"></i> BELUM LUNAS</button>
										<button type="submit" name="tombol" value="lunas" class="btn btn-success">LUNAS<i class="icon-arrow-right16 position-right"></i></button>
									<?php }?>
									</div>
								</div>										
							</div>
						</div>
					</form>
	<?php } ?>						<!-- /basic layout -->

</div>

