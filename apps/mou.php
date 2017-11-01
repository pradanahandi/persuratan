<section id="widget-grid" class="">
	<div class="row">		
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">			
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">				
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Data MoU </h2>
				</header>
				<div>					
					<div class="jarviswidget-editbox">
					</div>					
					<div class="widget-body no-padding">
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>			                
								<tr>
									<th>ID</th>
									<th>Tanggal MoU</th>
									<th>No MoU</th>
									<th>Nama Partner</th>
									<th>Perihal</th>
									<th>Keterangan</th>
									<th>File MoU</th>
									<th>Oleh</th>
									<th>Tanggal Post</th>
									<th>Aksi</th>
								</tr>
							</thead>							
							<tbody>	
								<?php
									$No = 1;
									include '../config/koneksi.php';
									$query = $conn->query("SELECT * FROM t_mou INNER JOIN t_user on t_mou.id_user=t_user.id_user ORDER BY t_mou.id");
									while ($row = $query->fetch_assoc()) {
								?>							
								<tr>
									<td><?php echo $No++;?></td>
									<td><?php echo $row['tanggal_mou'];?></td>
									<td><?php echo $row['nomou'];?></td>
									<td><?php echo $row['nama_partner'];?></td>
									<td><?php echo $row['perihal'];?></td>
									<td><?php echo $row['keterangan'];?></td>
									<td><?php echo $row['file'];?></td>
									<td><a href="../assets/doc/mou/<?php echo $row['file'];?>"><?php echo $row['file'];?></a></td>
									<td><?php echo $row['nama'];?></td>
									<td><?php echo $row['tanggal_post'];?></td>
									<td style="text-align: center;"><a href="?page=edit_mou&id=<?php echo $row['id'];?>"><img width="20px" src="../assets/img/icon/edit.png"></a><span><a id="hapus" href="?page=delete_mou&id=<?php echo $row['id'];?>"><img width="20px" src="../assets/img/icon/delete.png"></span></td>
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