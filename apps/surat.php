<section id="widget-grid" class="">
	<div class="row">		
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">			
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">				
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Data Surat </h2>
				</header>
				<div>					
					<div class="jarviswidget-editbox">
					</div>					
					<div class="widget-body no-padding">
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>			                
								<tr>
									<th>ID</th>
									<th>Tanggal Surat</th>
									<th>No Surat</th>
									<th>Ditujukan Untuk</th>
									<th>Perihal</th>
									<th>Asal Surat</th>
									<th>Keterangan</th>
									<th>File</th>
									<th>Oleh</th>
									<th>Tanggal Post</th>
									<th>Aksi</th>
								</tr>
							</thead>							
							<tbody>	
								<?php
									$No = 1;
									include '../config/koneksi.php';
									$query = $conn->query("SELECT * FROM t_surat_keluar INNER JOIN t_user on t_surat_keluar.id_user=t_user.id_user ORDER BY t_surat_keluar.id");
									while ($row = $query->fetch_assoc()) {
								?>							
								<tr>
									<td><?php echo $No++;?></td>
									<td><?php echo $row['tanggal_surat'];?></td>
									<td><?php echo $row['nosurat'];?></td>
									<td><?php echo $row['untuk'];?></td>
									<td><?php echo $row['perihal'];?></td>
									<td><?php echo $row['asal_surat'];?></td>
									<td><?php echo $row['keterangan'];?></td>
									<td><a href="../assets/doc/<?php echo $row['file'];?>"><?php echo $row['file'];?></a></td>
									<td><?php echo $row['nama'];?></td>
									<td><?php echo $row['tanggal_post'];?></td>
									<td style="text-align: center;"><a href="?page=edit_surat&id=<?php echo $row['id'];?>"><img width="20px" src="../assets/img/icon/edit.png"></a><span><a id="hapus" href="?page=delete_surat&id=<?php echo $row['id'];?>"><img width="20px" src="../assets/img/icon/delete.png"></span></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>					
				</div>				
			</div>			
		</article>		
	</div>
</section>