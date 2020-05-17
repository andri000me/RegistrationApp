<script>
    function dialogHapus(urlHapus) {
        if (confirm("apakah anda yakin ingin menghapus siswa?")) {
            document.location = urlHapus;
        }
    }
</script>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DAFTAR SISWA AKTIF</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

<div class="panel-body">    
    <div class="col-sm-12">
        <a href="<?php echo base_url().'admin/atur_kelas_siswa/'; ?>">
                                    <span class="btn btn-info btn-xsm col-sm-2" style="color: white; font-size: 14px;">Atur Kelas Siswa</span>
                                    </a>
    </div>
                    <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>NIS</th> 
                                <th>NAMA SISWA</th> 
                                <th>TAHUN DITERIMA</th> 
                                <th>KELAS</th>
                                <th>WALI KELAS</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                foreach($siswa->result() as $row) { ?> 
                            <tr>
                                <td> <?php echo $row->nis; ?> </td>
                                <td> <?php echo $row->nama_siswa; ?> </td>
                                <td> <?php echo $row->thn_diterima; ?></td>
                                <td> <?php echo $row->nama_kelas; ?></td>
                                <td> <?php echo $row->nama_guru; ?></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="<?php echo base_url().'Admin/ganti_kelas_siswa/'.$row->idkelas_siswa.'/'.$row->nis.'/'.$row->kd_prodi; ?>"><i class="icon-pencil4"></i>ganti kelas </a></li>
                                        </li>
                                    </ul>
                                </td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>                      
    </div>                        
</div>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DAFTAR SISWA SUDAH DAFTAR ULANG TAHUN AJARAN LALU</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

<div class="panel-body">    
                    <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>NIS</th> 
                                <th>NAMA SISWA</th> 
                                <th>TAHUN DITERIMA</th> 
                                <th>KELAS</th>
                                <th>PROGRAM STUDI</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                foreach($siswa_sudah_daftar->result() as $r) { ?> 
                            <tr>
                                <td> <?php echo $r->nis; ?> </td>
                                <td> <?php echo $r->nama_siswa; ?> </td>
                                <td> <?php echo $r->thn_diterima; ?></td>
                                <td> <?php echo $r->nama_kelas; ?></td>
                                <td> <?php echo $r->nama_prodi; ?></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="<?php echo base_url().'Admin/pilih_kelas_siswa/'.$r->nis.'/'.$r->kd_prodi; ?>"><i class="icon-pencil4"></i>Pilih Kelas siswa </a></li>
                                        </li>
                                    </ul>
                                </td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>                      
    </div>                        
</div>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DAFTAR SISWA BARU</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

<div class="panel-body"> 
    <div class="col-sm-12">
        <a href="<?php echo base_url().'Admin/Import_user_siswa_baru/'; ?>">
        <li class="btn btn-info btn-xsm col-sm-2" style="color: white; font-size: 14px;">Import File Siswa Baru </li>
        </a>
    </div>   
                    <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>NIS</th> 
                                <th>NAMA SISWA</th> 
                                <th>TAHUN DITERIMA</th> 
                                <th>PROGRAM STUDI</th>
                                <th>ALAMAT</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                foreach($siswa_baru->result() as $rs) { ?> 
                            <tr>
                                <td> <?php echo $rs->nis; ?> </td>
                                <td> <?php echo $rs->nama_siswa; ?> </td>
                                <td> <?php echo $rs->thn_diterima; ?></td>
                                <td> <?php echo $rs->nama_prodi; ?></td>
                                <td> <?php echo $rs->alamat; ?></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="<?php echo base_url().'Admin/pilih_kelas_siswa/'.$rs->nis.'/'.$rs->kd_prodi; ?>"><i class="icon-pencil4"></i>Pilih Kelas siswa </a></li>
                                        </li>
                                    </ul>
                                </td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>                      
    </div>                        
</div>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DAFTAR SISWA</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

<div class="panel-body">    
    <div class="col-sm-12">
        <a href="<?php echo base_url().'Admin/tambah_siswa/'; ?>">
                                    <span class="btn btn-info btn-xsm col-sm-2" style="color: white; font-size: 14px;">Tambah Siswa</span>
                                    </a>
    </div>

<div class="col-sm-12">
    </br>
</div>
                    <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>NIS</th> 
                                <th>NAMA SISWA</th> 
                                <th>TAHUN DITERIMA</th> 
                                <th>SEKOLAH ASAL</th>
                                <th>NAMA IBU</th>
                                <th>NAMA AYAH</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                foreach($list_siswa->result() as $key) { ?> 
                            <tr>
                                <td><?php echo $key->nis; ?></td>
                                <td><?php echo $key->nama_siswa; ?></td>
                                <td> <?php echo $key->thn_diterima; ?> </td>
                                <td> <?php echo $key->sekolah_asal; ?></td>
                                <td> <?php echo $key->nama_ibu; ?></td>
                                <td> <?php echo $key->nama_ayah; ?></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="javascript:dialogHapus('<?php echo base_url().'Admin/hapus_siswa/'.$key->nis; ?>')"><i class="icon-pencil4"></i>hapus siswa </a></li>
                                        </li>
                                    </ul>
                                </td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>                      
    </div>                        
</div>

<script>
    <?php if($this->session->flashdata('pesan')=="tersimpan") { ?>
        $(document).ready(function(){
            alert('kelas siswa Berhasil Disimpan');
        });
   <?php } elseif($this->session->flashdata('pesan')=="nggak berhasil") { ?>
        $(document).ready(function(){
            alert('maaf siswa sudah ada pada kelas yang dipilih');
        });
   <?php } elseif($this->session->flashdata('pesan')=="berhasil") { ?>
        $(document).ready(function(){
            alert('siswa berhasil ditambahkan');
        });
    <?php } elseif($this->session->flashdata('pesan')=="file") { ?>
        $(document).ready(function(){
            alert('import data siswa berhasil dilakukan');
        });
    <?php } elseif($this->session->flashdata('pesan')=="hapus") { ?>
        $(document).ready(function(){
            alert('hapus siswa berhasil dilakukan');
        });
    <?php } ?>
</script> 