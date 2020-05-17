 <div class="panel panel-flat">
		<div class="panel-heading">
				<h5 class="panel-title">Riwayat Waktu Daftar Ulang</h5>
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
        		<a href="<?php echo base_url().'Kesiswaan/atur_waktu/'; ?>">
                    <span class="btn btn-info btn-xsm col-sm-2" style="color: white; font-size: 14px;">Atur Waktu Daftar Ulang</span>
                                    </a>
    		</div>

    		<table class="table datatable-html">
                        <thead>
                            <tr>
                                <th>Tahun Ajaran</th> 
                                <th>Semester</th> 
                                <th>Tanggal Dimulai</th> 
                                <th></th>
                                <th>Tanggal Berakhir</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                foreach($list->result() as $row) { ?> 
                            <tr>
                                <td> <?php echo $row->tahun; ?></td>
                                <td> <?php echo $row->semester; ?></td>
                                <td> <?php echo $row->start_date; ?></td>
                                <td> </td>
                                <td> <?php echo $row->end_date; ?></td>
                                <td><?php if($thn==$row->tahun_ajaran){?> 
                                	<a href="<?php echo base_url().'Kesiswaan/atur_waktu/'; ?>"><span class="btn btn-info btn-xsm" style="color: white;">Update</span>
                                    </a></td>
                                    <?php }else{ ?>
                                    	<b>-</b>
                                    <?php } ?>
                            </tr>

                            <?php   
                                }
                                ?>
                        </tbody>
                    </table>    
		</div>
</div>
<script>
	<?php if($this->session->flashdata('pesan')=="update") { ?>
        $(document).ready(function(){
            alert('Berhasil update masa daftar ulang');
        });
    <?php }else if($this->session->flashdata('pesan')=="Berhasil"){ ?>
    	$(document).ready(function(){
            alert('Berhasil Mengatur Masa Daftar Ulang');
        });
    <?php } ?>
</script> 