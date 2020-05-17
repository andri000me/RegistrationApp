<script>
    function dialogHapus(urlHapus) {
        if (confirm("Menghapus Tahun Ajaran Akan Menghapus Seluruh Data Transaksi Yang Terkait Dengan Tahun Ajaran, Tetap Hapus Tahun Ajaran?")) {
            document.location = urlHapus;
        }
    }

    function lunas(){
        var a = $('#jenis_bayar').val();
        var b = $('#sisa_iuran').val();
        // var c  = $('#thn').val();
        if (a=="Lunas") {
            $.ajax({
                url:"<?php echo base_url();?>/Siswa/lunas/"+b,
                    success:function(data){
                    // alert(data);
                    $('#jumlah').html(data);
                }
            });
        }else{
            window.location.reload();
        }
        
    }
</script>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">DAFTAR TAHUN AJARAN</h5>
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
          <a href="<?php echo base_url().'Admin/Atur_tahun_ajaran/'; ?>">
                <li class="btn btn-info btn-xsm col-sm-2" style="color: white; font-size: 14px;">Atur Tahun Ajaran Baru</li></a>
        </div>    
                    <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>Tahun Ajaran</th> 
                                <th>Tahun</th> 
                                <th>Semester</th> 
                                <th></th>
                                <th class="text-center">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach($thn->result() as $row) { ?> 
                            <tr>
                                <td> <?php echo $no;?></td>
                                <td><?php echo $row->tahun_ajaran; ?></td>
                                <td> <?php echo $row->tahun; ?></td>
                                <td> <?php echo $row->semester; ?></td>
                                <td><!--<a href="<?php //echo base_url().'Admin/update_thn_ajar/'.$row->tahun_ajaran; ?>">
                                     <i class="icon-pencil4">
                                     </i>
                                </a>-->
                                </td>
                                <td class="text-center">
                                    <a href="javascript:dialogHapus('<?php echo base_url().'Admin/hapus_thn_ajar/'.$row->tahun_ajaran;?>')"><span class="btn btn-danger btn-xsm" style="color: white;"><i class="icon-trash-alt"></i> Hapus Tahun Ajaran</span></a>
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
    <?php if($this->session->flashdata('pesan')=='ubah') { ?>
        $(document).ready(function(){
            alert('Terima kasih, Perubahan Berhasil Disimpan');
        });
    <?php } elseif($this->session->flashdata('pesan')=="Semester") { ?>
        $(document).ready(function(){
            alert('Semester Berhasil Dirubah');
        });
    <?php } elseif ($this->session->flashdata('pesan')=="Tahun") {?>
    	 $(document).ready(function(){
            alert('Tahun Ajaran Berhasil Diubah');
        });
    <?php } elseif ($this->session->flashdata('pesan')=="hapus") {?>
         $(document).ready(function(){
            alert('Tahun Ajaran Berhasil Dihapus');
        });
    <?php } ?>
</script> 