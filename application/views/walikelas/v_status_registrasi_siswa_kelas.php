<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Status Registrasi Siswa Kelas</h5>
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
                                <th>Tahun Ajaran</th>
                                <th class="text-center">Status Rapor</th>
                                <th class="text-center">Status Registrasi</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                foreach($list_siswa->result() as $row) { 
                                    $status_registrasi='belum diajukan';
                                    $status_rapor='belum diajukan';
                                    $id_dftr = 'default';
                                    foreach($list_daftar->result() as $key) { 
                                        if($key->nis == $row->nis){
                                            if($key->status_rapor=='proses'){
                                                $status_registrasi = $key->status_registrasi;
                                                $status_rapor= $key->status_rapor;
                                                $id_dftr= $key->id_daftar;
                                            }else{
                                                $status_registrasi = $key->status_registrasi;
                                                $status_rapor= $key->status_rapor;    
                                            }
                                            
                                        }
                                    }?>
                            <tr>
                                <td> 
                                   <?php echo $row->nis ?>
                                </td>
                                <td> <?php echo $row->nama_siswa; ?></td>
                                <td> <?php echo $row->nama_kelas; ?></td>
                                <td> <?php echo $row->tahun; ?></td>
                                <td class="text-center">
                                <?php
                                if($status_rapor=="valid"){ ?>
                                    <span class="label label-success">VALID</span>
                                <?php
                                }else if($status_rapor=="belum diajukan"){ ?>
                                    <span class="label label-danger">BELUM MENGAJUKAN DAFTAR ULANG</span>
                                <?php 
                                }else if ($status_rapor=='proses') { ?>
                                    <span class="label label-warning">PROSES</span>
                                <?php 
                                }else if ($status_rapor=='tidak valid') { ?>
                                    <span class="label label-warning">rapor tidak valid</span>
                                <?php } ?>
                                </td>

                                <td class="text-center">
                                <?php
                                if($status_registrasi=="selesai"){ ?>
                                    <span class="label label-success">SELESAI</span>
                                <?php
                                }else if($status_registrasi=="belum diajukan"){ ?>
                                    <span class="label label-danger">BELUM MENGAJUKAN</span>
                                <?php 
                                }else if ($status_registrasi=='proses') { ?>
                                    <span class="label label-warning">PROSES</span>
                                <?php } ?>
                                </td>

                                <?php
                                if($status_rapor=="valid"){ ?>
                                <td class="text-center">
                                    -
                                </td>
                                <?php
                                }else if($status_rapor=="belum diajukan"){ ?>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="<?php echo base_url().'Walikelas/Ingatkan/'.$row->nis; ?>"><i class="icon-file-excel"></i> Ingatkan Siswa</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                                <?php 
                                }else if ($status_rapor == 'proses') { ?>
                                    <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="<?php echo base_url().'Walikelas/Konfirmasi_detail/'.$id_dftr; ?>"><i class="icon-file-excel"></i> Konfirmasi Rapor</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                                 <?php 
                                }else if ($status_rapor == 'tidak valid') { ?>
                                    <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="<?php echo base_url().'Walikelas/Ingatkan/'.$row->nis; ?>"><i class="icon-file-excel"></i> Ingatkan Siswa</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                                <?php } ?>
                                
                            </tr>

                            <?php   
                                    
                                }
                                ?>
                        </tbody>
                    </table>                      
                        
</div>     

<script>
    <?php if($this->session->flashdata('pesan')=="terkirim") { ?>
        $(document).ready(function(){
            alert('Terima kasih, Pesan Berhasil Dikirim');
        });
    <?php } ?>
</script>        