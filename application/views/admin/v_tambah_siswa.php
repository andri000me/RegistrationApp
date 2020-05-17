<script>     


		$("#form").submit(function(e) {
                // mencegah default submit form
                e.preventDefault();
                
                // kosongkan error form
                var a = $('#tgl_lahir').val();
        		var b = $('#bulan_lahir').val();
        		var c = $('#tahun_lahir').val();                

                // ambil data form dengan serialize
                var dataform = $("#form").serialize();
                $.ajax({
                    url: "<?php echo base_url();?>Admin/validasi_tgl/",
                    type: "post",
                    data: dataform,
                    success: function(result) {
                        var hasil = JSON.parse(result);
                        if (hasil.hasil !== "sukses") {
                            // tampilkan pesan error
                            $("#validasi").html(hasil.error.tgl);
                        } else {
                           return true;
                        }
                    }
                });
            });
</script>

<div class="panel panel-flat col-sm-10">
    <div class="panel-heading">
        <h5 class="panel-title">Tambah Siswa</h5>
    </div>

	<form name="form" id="form" class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>Admin/simpan_siswa" onsubmit="return validasi(this);">

			<div class="panel-body">

							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Siswa :</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nama" id="nama" placeholder="masukkan nama lengkap anda" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Tempat Lahir :</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="masukkan tempat lahir anda" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Tanggal Lahir :</label>
								<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												<select name="tgl_lahir" id="tgl_lahir" class="select" required>
													<option value="" selected>Tanggal</option>
													<?php for($i = 1; $i <= 31 ; $i++){ ?>
															<option value="<?php echo $i;?>"><?php echo $i;?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="col-md-2">
											<div class="form-group">
												<select name="bulan_lahir" id="bulan_lahir" class="select" required>
													<option value="" selected>Bulan</option>
													<option value="1">Januari</option>
													<option value="2">Februari</option>
													<option value="3">Maret</option>
													<option value="4">April</option>
													<option value="5">Mei</option>
													<option value="6">Juni</option>
													<option value="7">Juli</option>
													<option value="8">Agustus</option>
													<option value="9">September</option>
													<option value="10">Oktober</option>
													<option value="11">November</option>
													<option value="12">Desember</option>
												</select>
											</div>
										</div>										

										<div class="col-md-2">
											<div class="form-group">
												<select name="tahun_lahir" id="tahun_lahir" class="select" required>
													<option value="" selected>Tahun</option>
													<?php $thn=date('Y')-10;
													for($i = 2000; $i <= $thn ; $i++){ ?>
															<option value="<?php echo $i;?>"><?php echo $i;?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<?php if($this->session->flashdata('pesan')=="no") {?>
											<label name="validasi" id="validasi" class="col-sm-3 control-label" style="color: red;">Tanggal yang dimasukkan salah</label>
										<?php } ?>
									</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Alamat :</label>
								<div class="col-sm-6">
									<textarea name="alamat" rows="3" cols="3" class="form-control" placeholder="Masukkan Alamat" required></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Jenis Kelamin :</label>
								<div class="col-sm-6">
									<select class="select" name="jenis_kelamin" required>
										<option value="" selected>Pilih Jenis Kelamin</option>
										<option value="laki-laki">Laki-Laki</option>
										<option value="perempuan">Perempuan</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Tahun Diterima :</label>
								<div class="col-sm-6">
									<select class="select" name="thn_diterima" id="thn" required>

										<option value="" selected>Pilih Tahun Diterima</option>
										<?php $thn = date('Y');
											for($i=$thn-3 ; $i<=$thn ; $i++){ ?>
												<option value="<?php echo $i; ?>"><?php echo $i;?></option>
										<?php }?>
										
									</select>									
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Agama :</label>
								<div class="col-sm-6">
									<select class="select" name="agama" required>
										<option value="" selected>Pilih Agama</option>
										<option value="islam">Islam</option>
										<option value="kristen">Kristen</option>
										<option value="katolik">Katolik</option>
										<option value="hindu">Hindu</option>
										<option value="buddha">Buddha</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Program Studi :</label>
								<div class="col-sm-6">
									<select class="select" name="kd_prodi" id="kd_prodi" required>

										<option value="" selected>Pilih Program Studi</option>
										<?php foreach($prodi->result() as $row){ ?>
												<option value="<?php echo $row->kd_prodi; ?>"><?php echo $row->nama_prodi;?></option>
										<?php }?>
										
									</select>									
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Sekolah Asal :</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="sekolah_asal" placeholder="Masukkan sekolah Asal" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Ayah :</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nama_ayah" placeholder="Masukkan nama ayah" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Ibu :</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nama_ibu" placeholder="Masukkan nama ibu" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Pekerjaan Ayah :</label>
								<div class="col-sm-6">
									<select class="select" name="pekerjaan_ayah" required>
										<option value="" selected>Pilih Pekerjaan Ayah</option>
										<option value="PNS/Guru">PNS/Guru</option>
										<option value="Wiraswasta">Wiraswasta</option>
										<option value="Wirausahawan">Wirausahawan/Pedagang</option>
										<option value="Petani">Petani</option>
										<option value="Lainnya">Lainnya</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Pekerjaan Ibu :</label>
								<div class="col-sm-6">
									<select class="select" name="pekerjaan_ibu" required>
										<option value="" selected>Pilih Pekerjaan Ibu</option>
										<option value="PNS/Guru">PNS/Guru</option>
										<option value="Wiraswasta">Wiraswasta</option>
										<option value="Wirausahawan">Wirausahawan/Pedagang</option>
										<option value="Petani">Petani</option>
										<option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
									</select>
								</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-1 col-sm-8">
									<button type="submit" class="btn btn-primary waves-effect waves-light" name="update">
										Tambah
									</button>
									<a class="btn btn-default waves-effect waves-light m-l-5" href="<?php echo base_url('admin/kelola_siswa');?>">
										Kembali

									</a>
								</div>
							</div>
			</div>
	</form>
			
</div>
<script>
    <?php if($this->session->flashdata('pesan')=="unavailable") { ?>
        $(document).ready(function(){
            alert('Siswa Sudah Memiliki Akun');
        });
    <?php } ?>
</script> 