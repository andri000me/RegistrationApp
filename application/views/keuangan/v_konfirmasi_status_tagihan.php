<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Konfirmasi Status Tagihan</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>

<div class="panel-body">
    <!-- <a href="<?php //echo base_url().'Keuangan/riwayat_konfirmasi_status_tagihan/'; ?>">
                                    <span class="btn btn-info btn-xsm col-sm-2" style="color: white; font-size: 14px;">Riwayat Konfirmasi</span>
                                    </a>-->
                    <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>NIS</th> 
                                <th>Nama</th> 
                                <th>Kelas</th>
                                <th>Program Studi</th>
                                <th>Status_tagihan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                foreach($list_siswa->result() as $row) { ?> 
                            <tr>
                                <td> <?php echo $row->nis ?></td> 
                                <td> <?php echo $row->nama_siswa; ?></td>
                                <td> <?php echo $row->nama_kelas; ?></td>
                                <td> <?php echo $row->nama_prodi; ?></td>
                                <td> <?php if($row->status_tagihan=='proses') {?> 
                                        <span class="label label-warning"><?php echo $row->status_tagihan; ?></span></td> 
                                     <?php }else{ ?>
                                        <span class="label label-danger"><?php echo $row->status_tagihan; ?></span></td> 
                                     <?php }?>
                                <td><a href="<?php echo base_url().'Keuangan/detail_konfirmasi_status_tagihan/'.$row->nis.'/'.$row->id_daftar.'/'.$row->status_tagihan; ?>">
                                    <span class="btn btn-info btn-xsm" style="color: white;">Konfirmasi</span>
                                    </a>
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
    <?php if($this->session->flashdata('pesan')!=null) { ?>
        $(document).ready(function(){
            alert('Terima Kasih, Konfirmasi Status Tagihan Berhasil Dilakukan');
        });
    <?php } ?>
</script>                