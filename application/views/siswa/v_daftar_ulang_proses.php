<script>
    function lunas(){
        var a = $('#jenis_bayar').val();
        var b = $('#sisa_iuran').val();
        // var c  = $('#thn').val();
        if (a=="Lunas") {
			$.ajax({
            	url:"<?php echo base_url();?>Siswa/lunas/"+b,
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
		<form name="formm" enctype="multipart/form-data" class="form-horizontal validation" method="post">
			<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title" style="font-size: 25px;">Status Pendaftaran Ulang Anda</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
					</div>

					<div class="panel-body"  style="font-size: 18px">
				<?php foreach($list_daftar->result() as $row){ ?>
						<div class="form-group">
							<label class="col-lg-2 control-label">Status Rapor</label>
							<label class="col-lg-1 control-label">:</label>
								
									<?php
                       					 if($row->status_rapor=="valid"){ ?>
                        				   <div class="col-sm-2"><span class="label label-success">Valid</span></div>
                        			<?php }else if($row->status_rapor=="tidak valid"){ ?>
                            				<div class="col-sm-2"><span class="label label-danger">Tidak Valid</span></div></div>
                            					<div class="form-group">
													<label class="col-lg-2 control-label"></label>
													<label class="col-lg-1 control-label"></label>
													<div class="col-sm-2">
                            							<a href="<?php echo base_url().'Siswa/upload_ulang_rapor/'.$row->id_daftar; ?>">
                                						<span class="btn btn-info btn-xsm">Upload Ulang Rapor</span>
                            							</a>
                            						</div>
                        			<?php }else{ ?>
                            				<div class="col-sm-2"><span class="label label-warning">Proses</span> </div>
                        			<?php } ?>
								
						</div>
  
						<div class="form-group">
							<label class="col-lg-2 control-label">Status Tagihan</label>
							<label class="col-lg-1 control-label">:</label>
								<div class="col-sm-2" style="font-size: 30px;">
									<?php
                        			if($row->status_tagihan=="lunas"){ ?>
                        			    <td><span class="label label-success">Lunas</span></td>
                        			<?php }else if($row->status_tagihan=="belum lunas"){ ?>
                        			    <td>
                            			<span class="label label-danger">Belum Lunas</span></td>
                       				<?php }else{ ?>
                        			    <td>
                            			<span class="label label-warning">Proses</span></td>
                        			<?php } ?>

								</div>
						</div>

						<div class="form-group">
							<label class="col-lg-2 control-label">Status Registrasi</label>
							<label class="col-lg-1 control-label">:</label>
								<div class="col-sm-2" style="font-size: 30px;">
									<?php
                        			if($row->status_registrasi=="selesai"){ ?>
                        			    <td><span class="label label-success">selesai</span></td>
                       				<?php }else{ ?>
                        			    <td>
                            			<span class="label label-warning">Proses</span></td>
                        			<?php } ?>

								</div>
						</div>

				<?php } ?>										
					</div>
				</div>
		</form>

						<!-- /basic layout -->

</div>

<script>
<?php if($this->session->flashdata('pesan')=='tersimpan') { ?>
$(document).ready(function(){
alert('Terimakasih, Silahkan Menunggu Konfirmasi dari Walikelas dan Bagian Keuangan');
});
<?php }else if($this->session->flashdata('pesan')=='max'){ ?>
$(document).ready(function(){
alert('Maaf, Ukuran File Tidak Boleh Lebih Dari 2 MB');
});
<?php } ?>
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#data').DataTable({
                   responsive: true,
               });
    });
</script>