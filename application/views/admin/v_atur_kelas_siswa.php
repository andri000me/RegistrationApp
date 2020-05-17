<script>
    function get_siswa(){
        var a = $('#kelas').val();
        
			$.ajax({
            	url:"<?php echo base_url();?>Admin/filter_atur_kelas_siswa/"+a,
            		success:function(data){
                	$('#siswa').html(data);
            	}
        	});
    }

    function get_kelas(){
        var a = $('#siswa').val();
        
			$.ajax({
            	url:"<?php echo base_url();?>/Admin/filter_kelas_siswa/"+a,
            		success:function(data){
                	$('#kelas').html(data);
            	}
        	});
    }
</script>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="panel panel-flat col-sm-8">
    <div class="panel-heading">
        <h5 class="panel-title">Atur Kelas Siswa</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

	<form name="formm" class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/simpan_kelas_siswa" onsubmit="return validasii(this);">
			<div class="panel-body">			
							<div class="form-group">
								<label class="col-sm-2 control-label">KELAS</label>
								<div class="col-sm-4">
									<select class="select" name="kelas" id="kelas" onChange="get_siswa()" required>
										<option value="">Pilih Kelas</option>
										<?php foreach($kelas->result() as $row){?>
											<option value="<?php echo $row->id_kelas_dibentuk; ?>"><?php echo $row->nama_kelas; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">NAMA SISWA</label>
								<div class="col-sm-4" name='daftar' id='daftar'>
									<?php //<select class="select" name="siswa" id="siswa" onChange="get_kelas()" required>?>
									<select class="select" name="siswa" id="siswa" required>
                                        <option value="" selected>Pilih Siswa</option>
									</select>
								</div>
							</div>
							
                            <div class="form-group">
<div class="col-sm-offset-1 col-sm-8">
<button type="submit" class="btn btn-primary waves-effect waves-light"
name="update">Submit</button>
<a class="btn btn-default waves-
effect waves-light m-l-5" href="<?php echo
base_url('admin/kelola_siswa');?>">Kembali</a>

</div> 
</div>
</div>
</form>
			
</div>
<script>
    <?php if($this->session->flashdata('pesan')=='gagal') { ?>
        $(document).ready(function(){
            alert('maaf guru yang dipilih sudah menjadi wali kelas kelas lain atau kelas sudah memiliki wali kelas');
        });
    <?php } ?>
</script> 