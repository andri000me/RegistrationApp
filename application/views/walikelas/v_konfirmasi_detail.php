<script>
    function lunas(){
        var a = $('#jns').val();
        // var c  = $('#thn').val();
        if (a=="Lunas") {
			$.ajax({
            	url:"http://localhost/PA/Keuangan/lunas/",
            		success:function(data){
                	// alert(data);
                	$('#jumlah').html(data);
            	}
        	});
		}else{
			$.ajax({
            	url:"http://localhost/PA/Keuangan/kredit/",
            		success:function(data){
                	// alert(data);
                	$('#jumlah').html(data);
            	}
        	});
		}
        
    }

</script>

<div class="col-md-12">

						<!-- Basic layout-->
						<form action="<?php echo base_url(); ?>Walikelas/Konfirmasi_akhir_rapor" class="form-horizontal" method="post">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">KONFIRMASI RAPOR</h5>
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a data-action="collapse"></a></li>
					                		<li><a data-action="reload"></a></li>
					                		<li><a data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>
						
						<?php foreach ($detail->result() as $row) { ;?>
						
								<div class="panel-body">
									<div class="form-group">
										<label class="col-lg-3 control-label">Nama Siswa</label>
										<label class="col-sm-1 control-label">:</label>
										<div class="col-lg-8">
											<label class="col-sm-4 control-label"><?php echo $row->nama_siswa?></label>
										</div>
									</div>

									<div class="form-group">
										<label class="col-lg-3 control-label">Kelas</label>
										<label class="col-sm-1 control-label">:</label>
										<div class="col-lg-8">
											<label class="col-sm-4 control-label"><?php echo $row->nama_kelas?></label>
										</div>
									</div>

									<div class="form-group">
										<label class="col-lg-3 control-label">Rapor</label>
										<label class="col-sm-1 control-label">:</label>
										<div id='rapor' class="col-lg-8">
											<li class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                                    			<span style="color: white;">Cek Rapor</span>
                                    		</li>
										</div>
										
									</div>
							
									<input name="id_daftar" type="hidden" class="form-control" value="<?php echo $row->id_daftar; ?>">
									<input name="nis" type="hidden" class="form-control" value="<?php echo $row->nis; ?>">
									
		<div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
            <!-- konten modal-->
                <div class="modal-content">
                <!-- heading modal -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">CEK RAPOR</h4>
                            </div>
                <!-- body modal -->
                            <div class="modal-body">
                                <p class="col-sm-3"><embed src="<?php echo base_url().$row->rapor; ?>" type = "application/pdf" width="550" height="600"> </embed></p>
                            </div>
                <!-- footer modal -->
                            <div class="modal-footer">
                                
                            </div>
                </div>
            </div>
        </div>      

								<?php } ?>
								<div class="col-lg-12">
									<div class="col-lg-6">
										<button  name="tombol" type="submit" class="btn btn-danger" value="tolak"><i class="icon-arrow-left16 position-left"></i>Tolak</button>
									</div>

									<div class="col-lg-6">
										<div class="text-right">
											<button name="tombol" type="submit" class="btn btn-success" value="konfirmasi">Konfirmasi<i class="icon-arrow-right16   position-right"></i></button>
										</div>
									</div>
									
								</div>									
								</div>

							</div>
						</form>

						<!-- /basic layout -->

</div>
</form>