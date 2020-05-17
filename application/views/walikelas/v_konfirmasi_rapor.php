<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Konfirmasi Rapor Registrasi</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>
                    <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>ID DAFTAR</th> 
                                <th>NIS</th> 
                                <th>NAMA SISWA</th>
                                <th>TANGGAL DAFTAR</th>
                                <th>STATUS RAPOR</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                foreach($list_dftr->result() as $row) { ?> 
                            <tr>
                                <td> <?php echo $row->id_daftar ?></td>   
                                <td> <?php echo $row->nis ?> </td>   
                                <td> <?php echo $row->nama_siswa; ?></td>
                                <td> <?php echo $row->tanggal_daftar; ?></td>
                                <?php
                                if($row->status_rapor=="selesai"){ ?>
                                    <td><span class="label label-success">SELESAI</span></td>
                                <?php
                                }else if($row->status_rapor=="ditolak"){ ?>
                                    <td>
                                    <span class="label label-danger">DITOLAK</span></td>
                                <?php 
                                }else if ($row->status_rapor=='proses') { ?>
                                    <td>
                                    <span class="label label-warning">PROSES</span></td>
                                <?php } ?>
                                <td><li class="btn btn-info btn-xsm"><a href="<?php echo base_url().'Walikelas/konfirmasi_detail/'.$row->id_daftar; ?>">
                                    <span style="color: white;">VERIFIKASI</span>
                                    </a>
                                </li></td>

                            </tr>
                            <?php   
                                    
                                }
                                ?>
                        </tbody>
                    </table>                      
                        
</div>   
          
<script>
    <?php if($this->session->flashdata('pesan')=="tolak") { ?>
        $(document).ready(function(){
            alert('Terima kasih, Penolakan rapor Berhasil');
        });
    <?php }elseif($this->session->flashdata('pesan')=="simpan"){ ?>
        $(document).ready(function(){
            alert('Terima kasih, konfirmasi rapor berhasil dilakukan');
        });
    <?php } ?>
</script>