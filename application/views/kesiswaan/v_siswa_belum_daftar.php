<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DAFTAR SISWA BELUM DAFTAR ULANG</h5>
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
                                <th>NO.</th> 
                                <th>NIS</th> 
                                <th>NAMA</th> 
                                <th>TAHUN DITERIMA</th>
                                <th>STATUS DAFTAR ULANG</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no =1;
                                foreach($list_siswa->result() as $row) {
                                    $status = 'belum mengajukan';
                                    foreach($list_daftar_ulang->result() as $key) {
                                        if($row->nis==$key->nis){
                                            $status = 'selesai';
                                        }
                                    } 

                                if($status=='belum mengajukan'){?> 
                            <tr>
                                <td> <?php echo $no; ?></td>
                                <td> <?php echo $row->nis ?></td>
                                <td> <?php echo $row->nama_siswa; ?></td>
                                <td> <?php echo $row->thn_diterima; ?></td>
                                <td> <span class="label label-danger"> <?php echo $status;; ?></span></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="<?php echo base_url();?>Kesiswaan/ingatkan_siswa/<?php echo $row->nis;?>"><i class="icon-pencil4"></i> Ingatkan Siswa</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>

                            <?php
                                }
                                  
                                   $no++;
                                        
                                    
                                }
                                ?>
                        </tbody>
                    </table>                      
    </div>                        
</div>

<script>
    <?php if($this->session->flashdata('pesan')=="terkirim"){ ?>
            $(document).ready(function(){
            alert('Notifikasi Berhasil Dikirimkan');
        });
    <?php } else if($this->session->flashdata('pesan')=="file"){ ?>
            $(document).ready(function(){
            alert('File User Berhasil Diimport');
        });
    <?php } ?>

     
</script> 