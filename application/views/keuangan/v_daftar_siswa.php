<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Pembayaran Iuran Langsung</h5>
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
                                <th>NIS</th> 
                                <th>Nama</th> 
                                <th>Kelas</th>
                                <th>Program Studi</th>
                                <th>Tahun Diterima</th>
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
                                <td> <?php echo $row->thn_diterima; ?></td> 
                                <td><a href="<?php echo base_url().'Keuangan/bayar_iuran_siswa/'.$row->nis; ?>">
                                    <span class="btn btn-info btn-xsm" style="color: white;">Pembayaran</span>
                                    </a>
                                </td>
                            </tr>

                            <?php   
                                    
                                }
                                ?>
                        </tbody>
                    </table>                      
                        
</div>

<script>
    <?php if($this->session->flashdata('pesan')!=null) { ?>
        $(document).ready(function(){
            alert('Terimakasih, Data Tersimpan');
        });
    <?php } ?>
</script>                