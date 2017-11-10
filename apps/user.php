<section id="widget-grid" class="">	
	<div class="row">		
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">				
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Data User </h2>
				</header>				
				<div>					
					<div class="jarviswidget-editbox">						
					</div>					
					<div class="widget-body no-padding">
						<table id="dt_basic" class="table table-striped table-responsive table-bordered table-hover" width="100%">
							<thead>			                
								<tr>
									<th>ID</th>
									<th>Username</th>
									<th>Email</th>
									<th>Password</th>
									<th>Nama Lengkap</th>
									<th>Level</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php
								include '../config/koneksi.php';
								$id = 1;
								$query = $conn->query("SELECT * FROM t_user ORDER BY id_user");
								while ($row = $query->fetch_assoc()) {
							?>
							<tbody>
								<tr>
									<td><?php echo $id++;?></td>
									<td><?php echo $row['username'];?></td>
									<td><?php echo $row['email'];?></td>
									<td><?php echo $row['password'];?></td>
									<td><?php echo $row['nama'];?></td>
									<td><?php echo $row['level'];?></td>
									<td style="text-align: center;"><a href="?page=edit_user&id_user=<?php echo $row['id_user'];?>"><img width="20px" src="../assets/img/icon/edit.png"></a><span><a id="hapus" href="?page=delete_user&id_user=<?php echo $row['id_user'];?>"><img width="20px" src="../assets/img/icon/delete.png"></span></td>
								</tr>								
							</tbody>
							<?php } ?>
						</table>
					</div>					
				</div>				
			</div>			
		</article>		
	</div>
</section>