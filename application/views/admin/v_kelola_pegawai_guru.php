<script>
function dialogHapus(urlHapus) {
  if (confirm("Apakah Anda Yakin Ingin Menghapus Pegawai Ini ?")) {
    document.location = urlHapus;
  }
}

function dialogHapusGuru(urlHapus) {
  if (confirm("Apakah Anda Yakin Ingin Menghapus Guru Ini ?")) {
    document.location = urlHapus;
  }
}
</script>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DAFTAR PEGAWAI</h5>
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
        <a href="<?php echo base_url().'admin/tambah_Pegawai/'; ?>">
                                    <span class="btn btn-info btn-xsm col-sm-2" style="color: white; font-size: 14px;">Tambah Pegawai</span>
                                    </a>
    </div>    
                    <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>KODE PEGAWAI</th> 
                                <th>NIP</th> 
                                <th>NAMA</th>
                                <th>BAGIAN</th>
                                <th>ALAMAT</th>
                                <th>USERNAME</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach($pegawai->result() as $row) { ?> 
                            <tr>                                
                                <td> <?php echo $row->kd_pegawai; ?> </td>
                                <td> <?php echo $row->nip;?></td>
                                <td> <?php echo $row->nama_pegawai; ?> </td>
                                <td> <?php echo $row->bagian; ?> </td>
                                <td> <?php echo $row->alamat; ?> </td>
                                <td> <?php echo $row->username; ?> </td>
                                <td class="text-center">
                                    <a href="javascript:dialogHapus('<?php echo base_url().'Admin/hapus_pegawai/'.$row->kd_pegawai;?>')"><span class="btn btn-danger btn-xsm" style="color: white;"><i class="icon-trash-alt"></i> Hapus Pegawai</span></a>
                                </td>
                            </tr>
                            <?php   
                                    $no++;
                                }
                                ?>
                        </tbody>
                    </table>                      
    </div>                        
</div>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DAFTAR GURU</h5>
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
        <a href="<?php echo base_url().'admin/tambah_guru/'; ?>">
                                    <span class="btn btn-info btn-xsm col-sm-2" style="color: white; font-size: 14px;">Tambah Guru</span>
                                    </a>
    </div>    
                    <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>KODE GURU</th> 
                                <th>NIP</th> 
                                <th>NAMA</th>
                                <th>JENIS KELAMIN</th>
                                <th>AGAMA</th>
                                <th>ALAMAT</th>
                                <th>USERNAME</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($guru->result() as $row) { ?> 
                            <tr>                                
                                <td> <?php echo $row->kd_guru; ?> </td>
                                <td> <?php echo $row->nip;?></td>
                                <td> <?php echo $row->nama_guru; ?> </td>
                                <td> <?php echo $row->jenkel; ?> </td>
                                <td> <?php echo $row->agama; ?> </td>
                                <td> <?php echo $row->alamat; ?> </td>
                                <td> <?php echo $row->username; ?> </td>
                                <td class="text-center">
                                    <a href="javascript:dialogHapusGuru('<?php echo base_url().'Admin/hapus_guru/'.$row->kd_guru;?>')"><span class="btn btn-danger btn-xsm" style="color: white;"><i class="icon-trash-alt"></i> Hapus Guru</span></a>
                                </td>
                            </tr>
                            <?php   
                                }
                                ?>
                        </tbody>
                    </table>                      
    </div>                        
</div>

<script>
    <?php if($this->session->flashdata('pesan')=="pegawai berhasil" || $this->session->flashdata('pesan')=="berhasil") { ?>
            $(document).ready(function(){
            alert('Data Berhasil Ditambahkan');
        });
    <?php }else if($this->session->flashdata('pesan')=='kode'){ ?>
            $(document).ready(function(){
            alert('kode guru yang dimasukkan sudah digunakan');
        });
    <?php }else if($this->session->flashdata('pesan')=='hapus guru'){ ?>
            $(document).ready(function(){
            alert('terima kasih, guru berhasil dihapus');
        });
    <?php }else if($this->session->flashdata('pesan')=='hapus pegawai'){ ?>
            $(document).ready(function(){
            alert('terima kasih, pegawai berhasil dihapus');
        });
    <?php } ?>

     
</script> 