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
					<form name="formm" enctype="multipart/form-data" action="<?php echo base_url(); ?>Siswa/daftar_ulang" class="form-horizontal validation" method="post" onsubmit="return validasii(this);">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Pendaftaran Ulang</h5>
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
											<input name="thn_ajar" type="hidden" class="form-control" value="<?php echo $thn_ajar;?>">
											<input name="nis" type="hidden" class="form-control" value="<?php echo $nis; ?>">

									<div class="text-left">
										<button type="submit" name="submit" class="btn btn-success" value="submit">Daftar<i class="icon-arrow-right14 position-right"></i></button>
									</div>
																		
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