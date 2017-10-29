<!-- widget grid -->
<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">				
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Data User </h2>

				</header>
				<!-- widget div-->
				<div>
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
					</div>
					<!-- end widget edit box -->
					<!-- widget content -->
					<div class="widget-body no-padding">
						<table id="dt_basic" class="table table-striped table-responsive table-bordered table-hover" width="100%">
							<thead>			                
								<tr>
									<th>ID</th>
									<th>Username</th>
									<th>Email</th>
									<th>Password</th>
									<th>Level</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php
								include '../config/koneksi.php';
								$id = 1;
								$query = $conn->query("SELECT * FROM t_user ORDER BY id");
								while ($row = $query->fetch_assoc()) {
							?>
							<tbody>
								<tr>
									<td><?php echo $id++;?></td>
									<td><?php echo $row['username'];?></td>
									<td><?php echo $row['email'];?></td>
									<td><?php echo $row['password'];?></td>
									<td><?php echo $row['level'];?></td>
									<td style="text-align: center;"><a href="?page=edit_user&id=<?php echo $row['id'];?>"><img width="20px" src="../assets/img/icon/edit.png"></a><span><a id="hapus" href="?page=delete_user&id=<?php echo $row['id'];?>"><img width="20px" src="../assets/img/icon/delete.png"></span></td>
								</tr>								
							</tbody>
							<?php } ?>
						</table>
					</div>
					<!-- end widget content -->
				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->	
		</article>
		<!-- WIDGET END -->
	</div>
</section>