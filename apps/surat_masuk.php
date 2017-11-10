<section id="widget-grid" class="">
	<div class="row">		
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">			
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">				
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Data Surat Masuk </h2>
				</header>
				<div>					
					<div class="jarviswidget-editbox">
					</div>					
					<div class="widget-body no-padding">
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>			                
								<tr>
									<th>ID</th>
									<th>No Agenda</th>
									<th>Tanggal Agenda</th>
									<th>Tanggal Diterima</th>
									<th>Dikirim Melalui</th>
									<th>Asal Surat</th>
									<th>Tanggal Surat</th>
									<th>No Surat</th>		
									<th>Perihal</th>
									<th>Disposisi Kepada</th>
									<th>Sifat Surat</th>
									<th>File</th>
									<th>Log</th>									
									<th>Aksi</th>
								</tr>
							</thead>							
							<tbody>	
								<?php
									$No = 1;
									include '../config/koneksi.php';
									$sql = "SELECT * FROM t_masuk INNER JOIN t_user on t_masuk.id_user=t_user.id_user ORDER BY id DESC";
									$query = $conn->query($sql);
									while ($row = $query->fetch_assoc()) {
								?>							
								<tr>	
									<td><?php echo $No++;?></td>
									<td><?php echo $row['noagenda'];?></td>
									<td><?php echo $row['tanggal_agenda'];?></td>
									<td><?php echo $row['tanggal_diterima'];?></td>
									<td><?php echo $row['dikirim_melalui'];?></td>
									<td><?php echo $row['asal_surat'];?></td>
									<td><?php echo $row['tanggal_surat'];?></td>
									<td><?php echo $row['no_surat'];?></td>
									<td><?php echo $row['perihal'];?></td>
									<td><?php echo $row['disposisi_kepada'];?></td>
									<td><?php echo $row['sifat_surat'];?></td>		
									<td><a href="../assets/doc/suratmasuk/<?php echo $row['file'];?>"><?php echo $row['file'];?></a></td>
									<td><?php echo $row['nama'];?><br/><?php echo $row['tanggal_post']?></td>									
									<td style="text-align: center;">
										<a href="?page=edit_masuk&id=<?php echo $row['id'];?>"><img width="20px" src="../assets/img/icon/edit.png"></a>
										<span>
											<a id="hapus" href="?page=delete_masuk&id=<?php echo $row['id'];?>"><img width="20px" src="../assets/img/icon/delete.png">
										</span>
										<span>
											<a href="?page=print_masuk&id=<?php echo $row['id'];?>"><img width="20px" src="../assets/img/icon/printer.png">
										</span>
									</td>
								</tr>
								<?php }
								?>
							</tbody>
						</table>
					</div>					
				</div>				
			</div>			
		</article>		
	</div>
</section>