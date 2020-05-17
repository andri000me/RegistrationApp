<script type="text/javascript">
	function validasii(formm){
		if(formm.tahun1.value > formm.tahun2.value ){
			alert("Tahun 1 Harus Lebih Kecil Dari Tahun 2");
			formm.tahun1.focus();
			return false;
			
		}else{

			return true;
		}
	}

    function set_tahun(){
        var a = $('#tahun1').val();
        // var c  = $('#thn').val();
            $.ajax({
                url:"<?php echo base_url();?>Admin/set_tahun/"+a,
                    success:function(data){
                    // alert(data);
                    $('#set_tahun').html(data);
                }
            });        
    }
</script>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="panel panel-flat col-sm-8">
    <div class="panel-heading">
        <h5 class="panel-title">Atur Tahun Ajaran</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

	<form name="formm" class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>admin/update_tahun_ajaran" onsubmit="return validasii(this);">

			<div class="panel-body">

					
							<div class="form-group">
								<label class="col-sm-2 control-label">Tahun Ajaran :</label>
								<div class="col-sm-2">
									<select class="select" id="tahun1" name="tahun1" onChange="set_tahun()" required>
										<option value="">tahun ajaran</option>
										<?php $tahun = date('Y')+1;
										 for($i=2010; $i<=$tahun; $i++){?>
											<option value="<?php echo $i;?>"><?php echo $i;?></option>
										<?php } ?>
									</select>
								</div>
								<label class="col-sm-offset-1 col-sm-1 control-label" style="font-size: 20px;">/</label>
								<div class="col-sm-2" id="set_tahun">
									<input type="text" class="form-control" name="tahun2" id="tahun2" value="<?php echo 'tahun ajaran';?>" Readonly>
								</div>
							</div>
					
							<div class="form-group">
								<label class="col-sm-2 control-label">Semester :</label>
								<div class="col-sm-4">
									<select class="select" name="semester" required>
											<option value="">pilih semester</option>
											<option value="ganjil">ganjil</option>
											<option value="genap">genap</option>	
										
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">
										Tambah
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('admin/edit_tahun_ajaran');?>">
										Kembali
									</a>
								</div>
							</div>

			</div>
	</form>
			
</div>
<script>
    <?php if ($this->session->flashdata('pesan')=='gagal') {?>
    	 $(document).ready(function(){
            alert('Maaf Tahun Ajaran Yang Dimasukkan Sudah Ada');
        });
    <?php } ?>
</script> 