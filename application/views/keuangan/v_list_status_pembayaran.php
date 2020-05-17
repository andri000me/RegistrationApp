<div class="col-lg-14">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">Daftar Iuran Siswa</h5>
        </div>
        <table id="dataa" class="table datatable-html">
                    <thead>
                        <tr>                            
                            <th>Nama Siswa</th>
                            <th>Id Iuran</th> 
                            <th>Bulan</th>
                            <th>Terbayar</th>
                            <th>Sisa Tagihan</th>
                            <th class="text-center"> Status Iuran</th>
                        </tr>
                    </thead>
                    
                    <tbody>                               
                        <?php 
                        foreach($list_iuran->result() as $row) { ?> 
                    <tr>
                        <td> <?php echo $row->nama_siswa; ?></td> 
                        <td> <?php echo $row->id_iuran; ?></td>                         
                        <td> <?php echo $row->bulan; ?></td>
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
alert('Terimakasih, Pembayaran sudah diproses');
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
