<script>
function dialogHapus(urlHapus) {
  if (confirm("Apakah Anda Yakin Ingin Menghapus Kelas Ini ?")) {
    document.location = urlHapus;
  }
}
</script>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DAFTAR KELAS</h5>
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
        <a href="<?php echo base_url().'admin/tambah_kelas/'; ?>">
                                    <span class="btn btn-info btn-xsm col-sm-2" style="color: white; font-size: 14px;">Tambah Kelas</span>
                                    </a>
    </div>    
                    <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>KODE KELAS</th> 
                                <th>NAMA KELAS</th> 
                                <th>TINGKAT</th> 
                                <th>PROGRAM STUDI</th> 
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach($kelas->result() as $row) { ?> 
                            <tr>
                                <td> <?php echo $no;?></td>
                                <td> <?php echo $row->kd_kelas; ?></td>
                                <td> <?php echo $row->nama_kelas; ?></td>
                                <td> <?php echo $row->tingkat; ?> </td>
                                <td> <?php echo $row->nama_prodi; ?></td>
                                <td class="text-center">
                                    <a href="javascript:dialogHapus('<?php echo base_url().'Admin/hapus_kelas/'.$row->kd_kelas;?>')"><span class="btn btn-danger btn-xsm" style="color: white;"><i class="icon-trash-alt"></i> Hapus Kelas</span></a>
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
<script>
    <?php if($this->session->flashdata('pesan')=="berhasil") { ?>
        $(document).ready(function(){
            alert('Kelas Berhasil Ditambahkan');
        });
    <?php }else if($this->session->flashdata('pesan')=='hapus kelas'){ ?>
            $(document).ready(function(){
            alert('terima kasih, kelas berhasil dihapus');
        });
    <?php } ?>
</script> 