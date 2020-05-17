<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DAFTAR USER SISWA</h5>
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
                                <th>TANGGAL DAFTAR</th> 
                                <th>HER-REGISTRASI TAHUN AJARAN</th>
                                <th>STATUS RAPOR</th>
                                <th>STATUS TAGIHAN</th>
                                <th>STATUS AKHIR HER-REGISTRASI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                foreach($list_daftar_ulang->result() as $row) { ?> 
                            <tr>
                                <td> <?php echo $row->nis; ?></td>
                                <td> <?php echo $row->nama_siswa; ?></td>
                                <td> <?php echo $row->tanggal_daftar; ?></td>
                                <td> <?php echo $row->tahun_ajaran; ?></td>
                                <td>
                                <?php
                                if($row->status_rapor=="valid"){ ?>
                                    <span class="label label-success">valid</span>
                                <?php
                                }else if($row->status_rapor=="tidak valid"){ ?>
                                    <span class="label label-danger">tidak valid</span>
                                <?php 
                                } ?>
                                </td>

                                <td>
                                <?php
                                if($row->status_tagihan=="lunas"){ ?>
                                    <span class="label label-success">lunas</span>
                                <?php
                                }else if($row->status_tagihan=="belum lunas"){ ?>
                                    <span class="label label-danger">belum lunas</span>
                                <?php 
                                } ?>
                                </td>

                                <td>
                                <?php
                                if($row->status_registrasi=="selesai"){ ?>
                                    <span class="label label-success">selesai</span>
                                <?php
                                }else if($row->status_registrasi    =="ditolak"){ ?>
                                    <span class="label label-danger">ditolak</span>
                                <?php 
                                } ?>
                                </td>
                            </tr>

                            <?php   
                                }
                                ?>
                        </tbody>
                    </table>                      
    </div>                        
</div>