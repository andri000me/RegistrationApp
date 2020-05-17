<?php //$this->load->model('m_katu'); $peg = ($this->m_katu->get_pegawai_by_username($this->session->userdata('username'))); ?>
                        
<script>
    function search(){
        var a = $('#thn').val();
        // var c  = $('#thn').val();
        $.ajax({
            url:"<?php echo base_url()?>index.php/keuangan/filter_riwayat_daftar_ulang/"+a,
            success:function(data){
                // alert(data);
                $('#dataKunjungan').html(data);
            }
        });
    }
</script>
    
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="col-lg-14">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5 class="panel-title">Konfirmasi Pembayaran Iuran Online</h5>
        </div>
                           
                    <!-- /.panel-heading -->
            
                <table id="datad" class="table datatable-html">
                    <thead>
                        <tr>
                            <th>NIS</th> 
                            <th>NAMA</th> 
                            <th>TANGGAL BAYAR</th>
                            <th>JUMLAH DIBAYARKAN</th>
                            <th>JENIS PEMBAYARAN</th>
                            <th>KETERANGAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    
                    <tbody>                               
                        <?php
                        foreach($list_siswa->result() as $row) { ?> 
                    <tr>
                        <td> <?php echo $row->nis_siswa ?></td> 
                        <td> <?php echo $row->nama_siswa; ?></td>
                        <td> <?php echo $row->tgl_bayar; ?></td>
                        <td> <?php echo $row->jumlah_dibayarkan; ?></td>
                        <td> <?php echo $row->jenis_pembayaran; ?></td>
                        <td> <?php echo substr($row->keterangan,0,28).'...'; ?></td>
                        <td><a href="<?php echo base_url().'Keuangan/verifikasi_bayar_iuran_online/'.$row->id_bayar.'/'.$row->id_iuran; ?>"><li class="btn btn-info btn-xsm">
                                    <span style="color: white;">Detail</span>
                                </li></a>         
                       </td>                        
                    </tr>
                    
                                <?php   
                        
                                }
                                ?>
                    </tbody>

                </table>
            </div>
                    
                    <!-- /.panel-body -->

    </div>
                <!-- /.panel -->
</div>

<script>
<?php if($this->session->flashdata('pesan')=='terima') { ?>
    $(document).ready(function(){
    alert('Terima kasih, Konfirmasi penerimaan Pembayaran berhasil dilakukan');
});
<?php } else if($this->session->flashdata('pesan')=='tolak') { ?>
    $(document).ready(function(){
    alert('Terima kasih, Konfirmasi Penolakan Pembayaran Berhasil dilakukan');
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
