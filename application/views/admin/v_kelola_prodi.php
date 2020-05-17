<script>
function dialogHapus(urlHapus) {
  if (confirm("Apakah Anda Yakin Ingin Menghapus Program Studi Ini ?")) {
    document.location = urlHapus;
  }
}
</script>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DAFTAR PRODI</h5>
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
        <a href="<?php echo base_url().'admin/tambah_Prodi/'; ?>">
                                    <span class="btn btn-info btn-xsm col-sm-2" style="color: white; font-size: 14px;">Tambah Prodi</span>
                                    </a>
    </div>    
                    <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>KODE PROGRAM STUDI</th> 
                                <th>NAMA PROGRAM STUDI</th> 
                                <th>TAHUN PERTAMA</th>
                                <th>LAMA BERDIRI</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach($prodi->result() as $row) { ?> 
                            <tr>
                                <td> <?php echo $no;?></td>
                                <td> <?php echo $row->kd_prodi; ?> </td>
                                <td> <?php echo $row->nama_prodi; ?> </td>
                                <td> <?php echo $row->thn_pertama; ?> </td>
                                <td> <?php  $b = date('Y');
                                            $b = $b-$row->thn_pertama;
                                            echo $b.' Tahun'; ?> </td>
                                <td class="text-center">
                                    <a href="javascript:dialogHapus('<?php echo base_url().'Admin/hapus_prodi/'.$row->kd_prodi;?>')"><span class="btn btn-danger btn-xsm" style="color: white;"><i class="icon-trash-alt"></i> Hapus Prodi</span></a>
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
            alert('Program Studi Berhasil Ditambahkan');
        });
    <?php }else if($this->session->flashdata('pesan')=="hapus") { ?>
        $(document).ready(function(){
            alert('Program Studi Berhasil Dihapus');
        });
    <?php } ?>
</script> 