<div class="col-lg-14">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">Daftar Iuran Siswa</h5>
        </div>

    <div class="panel-body">
         <a href="<?php echo base_url().'Siswa/form_bayar_lebih/'.$nis; ?>">
                                    <span class="btn btn-info btn-xsm" style="color: white;">Bayar Lunas Iuran</span>
                                    </a>
        <table id="dataa" class="table datatable-html">
                    <thead>
                        <tr>                            
                            <th>Bulan</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Terbayar</th>
                            <th>Sisa Tagihan</th>
                            <th class="text-center"> Status Iuran</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>                               
                        <?php 
                        foreach($list_iuran->result() as $row) { ?> 
                    <tr>
                        <td> <?php echo $row->bulan; ?></td>
                        <td> <?php echo $row->semester; ?></td>
                        <td> <?php echo $row->tahun; ?></td>
                        <td> <?php
                            $total_bayar=0;
                                            
                            foreach ($riwayat_bayar->result() as $key) {
                                if($key->id_iuran == $row->id_iuran && $key->status_bayar=='selesai'){
                                    $total_bayar = $total_bayar+ $key->jumlah_dibayarkan;     
                                }
                            }

                            echo $total_bayar; ?>
                        </td>

                        <td> <?php 

                            $total_bayar=0;
                                            
                            foreach ($riwayat_bayar->result() as $key) {
                                if($key->id_iuran == $row->id_iuran && $key->status_bayar=='selesai'){
                                    $total_bayar = $total_bayar+$key->jumlah_dibayarkan;     
                                }
                            }
                            $sisa_iuran=$row->total_tagihan-$total_bayar;

                            echo $sisa_iuran; ?>
                        </td>


                        <td class="text-center">
                        <?php
                            $total_bayar=0;
                                            
                            foreach ($riwayat_bayar->result() as $key) {
                                if($key->id_iuran == $row->id_iuran && $key->status_bayar=='selesai'){
                                    $total_bayar = $total_bayar+$key->jumlah_dibayarkan;     
                                }
                            }
                            $sisa_iuran=$row->total_tagihan-$total_bayar;

                            if($sisa_iuran==0){ ?>       
                                <span class="label label-success">Lunas</span>
                        <?php }else if($sisa_iuran>0){ ?>
                                <span class="label label-danger">Belum Lunas</span>
                        <?php } ?></td>
                        
                        <td class="text-center">
                            <?php if($sisa_iuran>0){ ?>
                                    <a href="<?php echo base_url().'Siswa/form_bayar_iuran/'.$row->id_iuran; ?>">
                                        <span class="btn btn-info btn-xsm" style="color: white;">Bayar Iuran</span>
                                    </a>            
                            <?php }elseif($sisa_iuran==0){?>
                                    NO ACTION
                            <?php } ?>
                        </td>
                    </tr>
                                <?php   
                        }
                                ?>
                    </tbody>

        </table>
    </div>
    </div>
</div>

<script>
<?php if($this->session->flashdata('pesan')=='tersimpan') { ?>
$(document).ready(function(){
alert('Terimakasih, Pembayaran anda sedang diproses');
});
<?php }else if($this->session->flashdata('pesan')=='max') { ?>
$(document).ready(function(){
alert('maaf, ukuran file tidak boleh lebih dari 2 mega byte');
});
<?php } ?>
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#data').DataTable({
                   responsive: true,
               });
    });
</script>
