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

<script>


    function searchnama(){
        var a = document.getElementById('tugas').value;
        $.ajax({
            url:"<?php echo base_url()?>index.php/Ka_tu/filterNamaAbsen/"+a,
            method: 'GET',
            data: { nama: a }, 
            success:function(data){
                // alert(data);
                $('#dataKunjungan').html(data);
            }
        });
    }

    $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('isi')
    var modal = $(this)
    modal.find('.modal-body input').val(recipient)
  })
</script>

<script>


    function searchnama(){
        var a = document.getElementById('tugas').value;
        $.ajax({
            url:"<?php echo base_url()?>index.php/Ka_tu/filterNamaAbsen/"+a,
            method: 'GET',
            data: { nama: a }, 
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
            <h5 class="panel-title">Riwayat Transaksi</h5>
        </div>
        <div class="panel-body">
    
        </div>
                           
                    <!-- /.panel-heading -->
            
                <table id="datas" class="table datatable-html">
                    <thead>
                        <tr>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah dibayarkan</th>
                            <th>Tipe Pembayaran</th>
                            <th>Jenis Pembayaran</th>
                            <th>Status</th>
                            <th>Bukti</th>
                            <th>Nota</th>
                            <th>Dibayarkan Ke</th>
                        </tr>
                    </thead>
             
                    <tbody>                               
                    <?php
                        foreach($list_transaksi->result() as $row) { 
                    ?>
                    <tr>
                        <td> <?php echo $row->tahun; ?></td>
                        <td> <?php echo $row->semester; ?></td>
                        <td> <?php echo $row->tgl_bayar; ?></td>
                        <td> <?php echo $row->jumlah_dibayarkan; ?></td>
                        <td> <?php echo $row->tipe_pembayaran; ?></td>
                        <td> <?php echo $row->jenis_pembayaran; ?></td>
                    <?php
                        if($row->status_bayar=="selesai"){ ?>
                            <td><span class="label label-success">SELESAI</span></td>
                    <?php }else if($row->status_bayar=="ditolak"){ ?>
                            <td>
                            <span class="label label-danger">DITOLAK</span></td>
                    <?php } ?>

                        <td> <a href="<?php echo base_url().'siswa/lihat_bukti_bayar/'.$row->id_bayar; ?>"  target="_blank"> <span class="btn btn-info btn-xsm">Lihat Bukti</span><a></td>
                    <?php
                        if($row->status_bayar=="selesai"){ ?>
                            <td>
                            <?php //<li class="btn btn-info btn-xsm" data-toggle="modal" data-target="#myModal1">?>
                                    <a href="<?php echo base_url().'Siswa/lihat_nota_pdf/'.$row->id_bayar; ?>"  target="_blank">
                                        <span class="btn btn-info btn-xsm">Lihat Kwitansi</span>
                                    </a>
                            <?php //   </li> ?>
                        
                            </td>
                    <?php }else if($row->status_bayar=="ditolak"){ ?>
                            <td>
                            <span>-</span></td>
                    <?php } ?>
                         <td> <?php echo $row->nama_pegawai; ?></td>
                        
                    </tr>
                 
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
            <!-- konten modal-->
                <div class="modal-content">
                <!-- heading modal -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">BUKTI PEMBAYARAN</h4>
                            </div>
                <!-- body modal -->
                            <div class="modal-body">
                                <p class="col-md-offset-1 col-sm-3"><img src="<?php echo base_url(); echo $row->bukti_bayar; ?>" height="600px" width="450px;"></p>
                            </div>
                <!-- footer modal -->
                            <div class="modal-footer">
                                
                            </div>
                </div>
            </div>
        </div>      
                    
                               
                               <?php   
                                    
                        }
                                ?>
                </tbody>
                </table>
   
        </div>
</div>
                
    
                <!-- /.panel -->
                

<script>
<?php if($this->session->flashdata('pesan')!=null) { ?>
$(document).ready(function(){
alert('Terimakasih, Data Tersimpan');
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
