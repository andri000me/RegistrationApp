<div class="col-lg-14">
        
        <div class="panel panel-default">
        <div class="panel-heading">
                        <h5 class="panel-title">Status Pembayaran Siswa</h5>
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
                                <th>No</th> 
                                <th>NIS</th> 
                                <th>Nama</th> 
                                <th>Kelas</th>
                                <th>Jumlah Tunggakan</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                                
                                foreach($list_siswa->result() as $row) { 

                                            $tunggakan=0;
                                            foreach($list_iuran->result() as $key) {

                                                $sisa_iuran=0;

                                                if($key->nis_siswa == $row->nis ){
                                                    $jlh_bayar=0;
                                                    foreach($riwayat_bayar->result() as $s) {
                                                        if($key->id_iuran == $s->id_iuran){
                                                            $jlh_bayar=$jlh_bayar+$s->jumlah_dibayarkan;
                                                        }    
                                                    }
                                                    $sisa_iuran=$key->total_tagihan-$jlh_bayar;
                                                }
                                                $tunggakan=$tunggakan+$sisa_iuran;
                                            }
                                    ?> 

                            <tr>
                                <td> <?php echo $no ?></td> 
                                <td> <?php echo $row->nis ?></td> 
                                <td> <?php echo $row->nama_siswa; ?></td>
                                <td> <?php echo $row->nama_kelas; ?></td>
                                <td> 
                                    <?php if($tunggakan>0){?>
                                        <span class="label label-danger"><?php echo $tunggakan; ?></span></td>
                                    <?php }else{?>
                                        <span class="label label-succes"><?php echo $tunggakan; ?></span></td>
                                    <?php } ?>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <?php if($tunggakan>0){?>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="<?php echo base_url().'Keuangan/list_status_pembayaran/'.$row->nis; ?>"><i class="icon-file-pdf"></i> Lihat List Status Pembayaran</a></li>
                                                <li><a href="<?php echo base_url().'Keuangan/pdf/'.$row->nis.'/'.$nip.'/'.$nama; ?>"><i class="icon-file-excel"></i> Cetak Surat Teguran</a></li>
                                            </ul>
                                            <?php }else{?>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="<?php echo base_url().'Keuangan/list_status_pembayaran/'.$row->nis; ?>"><i class="icon-file-pdf"></i> Lihat List Status Pembayaran</a></li>
                                            </ul>
                                            <?php } ?>
                                        </li>
                                    </ul>
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