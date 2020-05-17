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
            <h5 class="panel-title">Riwayat Daftar Ulang</h5>
        </div>
        <div class="panel-body">
            <form role="form" method="post" action="#" enctype="multipart/form-data" >              
                                    
                    <!-- /.panel-heading -->
            
                <table id="datas" class="table datatable-html">
                    <thead>
                        <tr>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Tanggal Daftar</th>
                            <th class="text-center">Rapor</th>
                            <th>Status Rapor</th>
                            <th>Status Tagihan</th>
                            <th class="text-center">Status Registrasi</th>
                        </tr>
                    </thead>
             
                    <tbody>                               
                    <?php
                        foreach($list_daftar_ulg->result() as $row) { 
                    ?>
                    <tr>
                        <td> <?php echo $row->tahun; ?></td> 
                        <td> <?php echo $row->semester; ?></td>
                        <td> <?php echo $row->tanggal_daftar; ?></td>
                        <td class="text-center">
                            <a href="<?php echo base_url().'Siswa/lihat_rapor_pdf/'.$row->id_daftar; ?>"  target="_blank">
                                <span class="btn btn-info btn-xsm">Lihat Rapor</span>
                            </a>
                        </td>

                        <?php
                        if($row->status_rapor=="valid"){ ?>
                            <td><span class="label label-success">Valid</span></td>
                        <?php }else if($row->status_rapor=="tidak valid"){ ?>
                            <td>
                            <span class="label label-danger">Tidak Valid</span></td>
                        <?php }else{ ?>
                            <td>
                            <span class="label label-warning">Proses</span></td>
                        <?php } ?>

                        <?php
                        if($row->status_tagihan=="lunas"){ ?>
                            <td><span class="label label-success">Lunas</span></td>
                        <?php }else if($row->status_tagihan=="tidak valid"){ ?>
                            <td>
                            <span class="label label-danger">Belum Lunas</span></td>
                       <?php }else{ ?>
                            <td>
                            <span class="label label-warning">Proses</span></td>
                        <?php } ?>

                        <?php
                        if($row->status_registrasi=="selesai"){ ?>
                            <td class="text-center"><span class="label label-success">Selesai</span></td>
                        <?php }else if($row->status_registrasi=="proses"){ ?>
                            <td class="text-center">
                            <span class="label label-warning">Proses</span></td>
                        <?php } ?>

                    </tr>         
                    
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
