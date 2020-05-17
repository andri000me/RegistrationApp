<div class="panel panel-flat">
		<div class="panel-heading">
				<h5 class="panel-title">Grafik Laporan Daftar Ulang</h5>
			<div class="heading-elements">
				<ul class="icons-list">
		            <li><a data-action="collapse"></a></li>
		      		<li><a data-action="reload"></a></li>
		      	</ul>
	        </div>
		</div>

		<div class="panel-body">
			 <div class="col-sm-12">
                <form name="formm" enctype="multipart/form-data" action="<?php echo base_url(); ?>Kesiswaan/filter_laporan_daftar_ulang" class="form-horizontal validation" method="post">              
                <th>
                    <div class="form-group col-sm-12"> 
                        <div class="col-sm-2">   
                        <select style="width:200px" class="form-control" name="thn_ajar" required>
                            <option value="">- Pilih Tahun Ajaran -</option>
                            <?php foreach ($thn->result() as $th) {?>
                                <option value="<?php echo $th->tahun_ajaran;?>"><?php echo $th->tahun.'-'.$th->semester;?></option>
                            <?php } ?>
                        </select>
                        </div>
                        <div class="col-sm-offset-1 col-sm-4">   
                        <button type="submit" name="tombol" value="lunas" class="btn btn-success col-sm-4">Filter</button>
                        </div>
                    </div>
                </th>
            </form>
                
            </div>  
		</div>
        <div class="chart-container">
                     <div class="chart" id="chart_laporan"></div>
                </div>
</div>

<div class="panel panel-flat">
        <div class="panel-heading">
                <h5 class="panel-title">Tabel Laporan Daftar Ulang</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">

            

            
            <table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>Kelas</th> 
                                <th>Tahun Ajaran</th>
                                <th>Jumlah Siswa</th> 
                                <th>Jumlah Sudah Daftar Ulang</th> 
                                <th>Jumlah Belum Daftar Ulang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($kelas->result() as $row) { 
                                    $total1=0;
                                    $totals=0;
                                    $totals=0;
                                    ?> 
                            <tr>
                                <td> <?php echo $row->nama_kelas; ?></td>
                                <td> <?php echo $row->tahun; ?></td>
                                <td class="text-center"> 
                                <?php 
                                foreach ($siswa->result() as $ss) {
                                    if($row->id_kelas_dibentuk==$ss->id_kelas_dibentuk){
                                        $total1++;
                                    }
                                }
                                echo $total1;
                                ?>
                                </td>
                                <td class="text-center"> 
                                <?php 
                                foreach ($siswa_daftar->result() as $sm) {
                                    if($row->id_kelas_dibentuk==$sm->id_kelas_dibentuk){
                                        $totals++;
                                    }
                                }

                                echo $totals; 
                                ?>
                                </td>
                                <td class="text-center"> <?php echo $total1-$totals; ?></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li id="belum" class="<?php echo $row->id_kelas_dibentuk;?>"><a><i class="icon-pencil4"></i>belum Daftar Ulang</a></li>
                                                <li id="sudah" class="<?php echo $row->id_kelas_dibentuk;?>"><a><i class="icon-pencil4"></i>sudah Daftar Ulang</a></li>
                                            </ul>
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

<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Siswa Kelas Belum Daftar Ulang</h4>
                </div>
                <!-- body modal -->
                <div id="modal" class="modal-body">
                    
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
</div>

<div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Siswa Kelas Sudah Daftar Ulang</h4>
                </div>
                <!-- body modal -->
                <div id="modal1" class="modal-body">
                    
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
</div>
<script type="text/javascript">
    var axis_tick_rotation = c3.generate({

        bindto: '#chart_laporan',
        size: { height: 400 },
        data: {
            x : 'x',
            columns: [
                    ['x',<?php foreach($kelas->result() as $key) { echo "'".$key->kd_kelas."'";?> , <?php } ?>],
         
                    ["Jumlah Siswa Kelas",

                    <?php foreach($kelas->result() as $k) {
                            $total=0;
                            foreach ($siswa->result() as $s) {
                                if($k->id_kelas_dibentuk==$s->id_kelas_dibentuk){
                                    $total++;
                                }
                            }

                        echo "'".$total."'";
                    ?> 


                    , <?php } ?>],

                    ["Jumlah Siswa Sudah Daftar Ulang", 

                     <?php foreach($kelas->result() as $kj) {
                            $total=0;
                            foreach ($siswa_daftar->result() as $sj) {
                                if($kj->id_kelas_dibentuk==$sj->id_kelas_dibentuk){
                                    $total++;
                                }
                            }

                        echo "'".$total."'";
                    ?>

                     , <?php } ?>],
                
            ],
            type: 'bar'
        },
        color: {
            pattern: ['#4CAF50', '#f44336']
        },
        axis: {
            x: {
                type: 'category',
                tick: {
                    rotate: -90
                },
                height: 80
            }
        },
        grid: {
            y: {
                show: true
            }
        }
    });

    $(document).on("click","#belum",function(e){
    var id_kelas = $(this).attr("class");
    $.ajax({
        type:"POST",
        data:{id_kelas_dibentuk:id_kelas},
        url:"<?php echo site_url('Kesiswaan/kelas_belum/') ?>",
        success:function(msg){
            $("#modal").html(msg);
        },
        error: function(result){
            $("#modal").html("Error");
        }
    });
        e.preventDefault();
        $("#myModal").modal('show');
    });

    $(document).on("click","#sudah",function(e){
    var id_kelas = $(this).attr("class");
    $.ajax({
        type:"POST",
        data:{id_kelas_dibentuk:id_kelas},
        url:"<?php echo site_url('Kesiswaan/kelas_sudah/') ?>",
        success:function(msg){
            $("#modal1").html(msg);
        },
        error: function(result){
            $("#modal1").html("Error");
        }
    });
        e.preventDefault();
        $("#myModal1").modal('show');
    });

</script>