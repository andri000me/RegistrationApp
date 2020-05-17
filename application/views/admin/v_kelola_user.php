<script>
    function dialogHapus(urlHapus) {
        if (confirm("apakah anda yakin ingin menghapus user?")) {
            document.location = urlHapus;
        }
    }
</script>
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DAFTAR USER PEGAWAI</h5>
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
        <a href="<?php echo base_url().'Admin/tambah_user_pegawai/'; ?>">
                                    <li class="btn btn-info btn-xsm col-sm-2" style="color: white; font-size: 14px;">Tambah User Pegawai</li>
                                    </a>
    </div>
    
                    <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>KODE PEGAWAI</th> 
                                <th>NAMA PEGAWAI</th> 
                                <th>USERNAME</th> 
                                <th>TERAKHIR LOGIN</th>                                
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                foreach($list_user_pegawai->result() as $row) { ?> 
                            <tr>
                                <td> <?php echo $row->kd_pegawai; ?> </td>
                                <td> <?php echo $row->nama_pegawai; ?></td>
                                <td> <?php echo $row->username; ?></td>
                                <td> <?php echo $row->last_login; ?></td>
                                <td>
                                <?php
                                if($row->status_user=="aktif"){ ?>
                                    <span class="label label-success">AKtif</span>
                                <?php
                                }else if($row->status_user=="non-aktif"){ ?>
                                    <span class="label label-danger">Non-Aktif</span>
                                <?php 
                                } ?>
                                </td>
                                <td>
                                <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="javascript:dialogHapus('<?php echo base_url().'Admin/hapus_user/'.$row->username;?>')"><i class="icon-trash-alt"></i> Hapus User</a>
                                            
                                                <a href="<?php echo base_url().'Admin/edit_user/'.$row->username; ?>">
                                                <i class="icon-pencil4"></i> Edit User</a></li>
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
        <h5 class="panel-title">DAFTAR USER WALIKELAS</h5>
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
        <a href="<?php echo base_url().'Admin/tambah_user_walikelas/'; ?>">
                                    <li class="btn btn-info btn-xsm col-sm-2" style="color: white; font-size: 14px;">Tambah User Walikelas</li>
                                    </a>
    </div>
    
                    <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>KODE GURU</th> 
                                <th>NAMA GURU</th> 
                                <th>USERNAME</th> 
                                <th>TERAKHIR LOGIN</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                foreach($list_user_guru->result() as $row) { ?> 
                            <tr>
                                <td> <?php echo $row->kd_guru; ?> </td>
                                <td> <?php echo $row->nama_guru; ?></td>
                                <td> <?php echo $row->username; ?></td>
                                <td> <?php echo $row->last_login; ?></td>
                                <td>
                                <?php
                                if($row->status_user=="aktif"){ ?>
                                    <span class="label label-success">AKtif</span>
                                <?php
                                }else if($row->status_user=="non-aktif"){ ?>
                                    <span class="label label-danger">Non-Aktif</span>
                                <?php 
                                } ?>
                                </td>
                                <td>
                                <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="javascript:dialogHapus('<?php echo base_url().'Admin/hapus_user/'.$row->username;?>')"><i class="icon-trash-alt"></i> Hapus User</a>
                                            
                                                <a href="<?php echo base_url().'Admin/edit_user/'.$row->username; ?>">
                                                <i class="icon-pencil4"></i> Edit User</a></li>
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
    <?php if($this->session->flashdata('pesan')=="berhasil"){ ?>
            $(document).ready(function(){
            alert('User Berhasil Ditambahkan');
        });
    <?php } else if($this->session->flashdata('pesan')=="file"){ ?>
            $(document).ready(function(){
            alert('File User Berhasil Diimport');
        });
    <?php } else if($this->session->flashdata('pesan')=="hapus"){ ?>
            $(document).ready(function(){
            alert('berhasil hapus user');
        });
    <?php } ?>

     
</script> 