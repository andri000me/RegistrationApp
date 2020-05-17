<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DAFTAR WALI KELAS <?php echo $this->session->userdata('thn_ajar').' '.$this->session->userdata('semester');?></h5>
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
        <a href="<?php echo base_url().'admin/set_walikelas_ajaran_baru/'; ?>">
                                    <span class="btn btn-info btn-xsm col-sm-2" style="color: white; font-size: 14px;">Set Walikelas Ajaran Baru</span>
                                    </a>
    </div>
                    <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>NAMA KELAS</th> 
                                <th>TAHUN</th> 
                                <th>SEMESTER</th> 
                                <th>NIP WALIKELAS</th>
                                <th>WALI KELAS</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                foreach($walikelas->result() as $row) { ?> 
                            <tr>
                                <td><?php echo $row->nama_kelas; ?></td>
                                <td><?php echo $row->tahun; ?></td>
                                <td> <?php echo $row->semester; ?></td>
                                <td> <?php echo $row->nip; ?></td>
                                <td><?php echo $row->nama_guru; ?></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="<?php echo base_url().'Admin/ganti_walikelas/'.$row->id_kelas_dibentuk.'/'.$row->kd_guru; ?>"><i class="icon-pencil4"></i> Ganti Wali Kelas</a></li>
                                        </li>
                                    </ul>
                                </td>
                            </tr>

                            <?php   
                                    
                                }
                                ?>
                        </tbody>
                    </table>                      
    </div>                        
</div>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DAFTAR WALI KELAS</h5>
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
                                <th>NAMA KELAS</th> 
                                <th>TAHUN</th> 
                                <th>SEMESTER</th> 
                                <th>NIP WALIKELAS</th>
                                <th>WALI KELAS</th>
                                <th class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                foreach($walikelas->result() as $row) { ?> 
                            <tr>
                                <td> <?php echo $row->nama_kelas; ?> </td>
                                <td> <?php echo $row->tahun; ?> </td>
                                <td> <?php echo $row->semester; ?></td>
                                <td> <?php echo $row->nip; ?></td>
                                <td> <?php echo $row->nama_guru; ?></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="<?php echo base_url().'Admin/ganti_walikelas/'.$row->id_kelas_dibentuk; ?>"><i class="icon-pencil4"></i> Ganti Wali Kelas</a></li>
                                        </li>
                                    </ul>
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
    <?php if($this->session->flashdata('pesan')=="ganti walikelas") { ?>
        $(document).ready(function(){
            alert('Wali Kelas Berhasil Diubah');
        });
    <?php } elseif($this->session->flashdata('pesan')=="tersimpan") { ?>
        $(document).ready(function(){
            alert('wali kelas Berhasil Disimpan');
        });
   <?php } elseif($this->session->flashdata('pesan')=="nggak berhasil") { ?>
        $(document).ready(function(){
            alert('maaf guru yang dipilih sudah menjadi wali kelas kelas lain atau kelas sudah memiliki wali kelas');
        });
    <?php } ?>

</script> 