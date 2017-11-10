<div class="login-info">
	<span>
		
		<a href="index">			
			<span>
				<?php echo $_SESSION['nama'];?><br/>
			</span>			
		</a> 
		
	</span>
</div>
<?php
	if($_SESSION['level'] == 'admin')
	{
?>
		<nav>		
			<ul>
				<li>
					<a href="index" title="Dashboard"><i class="fa fa-lg fa-home"></i><span class="menu-item-parent">Dashboard</span></a>
				</li>		
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-envelope"></i> <span class="menu-item-parent">Surat Masuk</span></a>
					<ul>
						<li>
							<a href="?page=tambah_surat_masuk">Input Surat Masuk</a>
						</li>
						<li>
							<a href="?page=surat_masuk">View Surat Masuk</a>
						</li>				
					</ul>
				</li>

				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Surat Keluar</span></a>
					<ul>
						<li>
							<a href="?page=tambah_surat">Input Surat</a>
						</li>
						<li>
							<a href="?page=surat">View Surat</a>
						</li>				
					</ul>
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">MoU</span></a>
					<ul>
						<li>
							<a href="?page=tambah_mou">Input MoU</a>
						</li>				
						<li>
							<a href="?page=mou">View MoU</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">MoA</span></a>
					<ul>
						<li>
							<a href="?page=tambah_moa">Input MoA</a>
						</li>
						<li>
							<a href="?page=moa">View MoA</a>
						</li>				
					</ul>
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-desktop"></i> <span class="menu-item-parent">User</span></a>
					<ul>
						<li>
							<a href="?page=tambah_user">Input User</a>
						</li>
						<li>
							<a href="?page=user">View User</a>
						</li>				
					</ul>
				</li>
			</ul>	
		</nav>
<?php 
	}
	if($_SESSION['level'] == 'sekretaris')
	{
?>
		<nav>		
			<ul>
				<li>
					<a href="index" title="Dashboard"><i class="fa fa-lg fa-home"></i><span class="menu-item-parent">Dashboard</span></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-envelope"></i> <span class="menu-item-parent">Surat Masuk</span></a>
					<ul>
						<li>
							<a href="?page=tambah_surat_masuk">Input Surat Masuk</a>
						</li>
						<li>
							<a href="?page=surat_masuk">View Surat Masuk</a>
						</li>				
					</ul>
				</li>

				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Surat Keluar</span></a>
					<ul>
						<li>
							<a href="?page=tambah_surat">Input Surat</a>
						</li>
						<li>
							<a href="?page=surat">View Surat</a>
						</li>				
					</ul>
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">MoU</span></a>
					<ul>
						<li>
							<a href="?page=tambah_mou">Input MoU</a>
						</li>				
						<li>
							<a href="?page=mou">View MoU</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">MoA</span></a>
					<ul>
						<li>
							<a href="?page=tambah_moa">Input MoA</a>
						</li>
						<li>
							<a href="?page=moa">View MoA</a>
						</li>				
					</ul>
				</li>
			</ul>	
		</nav>
<?php 
	} 
	if($_SESSION['level'] == 'magang')
	{
?>
		<nav>		
			<ul>
				<li>
					<a href="index" title="Dashboard"><i class="fa fa-lg fa-home"></i><span class="menu-item-parent">Dashboard</span></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-envelope"></i> <span class="menu-item-parent">Surat Masuk</span></a>
					<ul>
						<li>
							<a href="?page=tambah_surat_masuk">Input Surat Masuk</a>
						</li>
						<li>
							<a href="?page=surat_masuk">View Surat Masuk</a>
						</li>				
					</ul>
				</li>
				
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Surat Keluar</span></a>
					<ul>
						<li>
							<a href="?page=tambah_surat">Input Surat</a>
						</li>
						<li>
							<a href="?page=surat">View Surat</a>
						</li>				
					</ul>
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">MoU</span></a>
					<ul>
						<li>
							<a href="?page=tambah_mou">Input MoU</a>
						</li>				
						<li>
							<a href="?page=mou">View MoU</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">MoA</span></a>
					<ul>
						<li>
							<a href="?page=tambah_moa">Input MoA</a>
						</li>
						<li>
							<a href="?page=moa">View MoA</a>
						</li>				
					</ul>
				</li>
			</ul>	
		</nav>
<?php 		 
	}
	if($_SESSION['level'] == 'compart')
	{
?>
		<nav>		
			<ul>
				<li>
					<a href="index" title="Dashboard"><i class="fa fa-lg fa-home"></i><span class="menu-item-parent">Dashboard</span></a>
				</li>				
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">MoU</span></a>
					<ul>
						<li>
							<a href="?page=tambah_mou">Input MoU</a>
						</li>				
						<li>
							<a href="?page=mou">View MoU</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i> <span class="menu-item-parent">MoA</span></a>
					<ul>
						<li>
							<a href="?page=tambah_moa">Input MoA</a>
						</li>
						<li>
							<a href="?page=moa">View MoA</a>
						</li>				
					</ul>
				</li>
			</ul>	
		</nav>
<?php
	}
?>

<span class="minifyme" data-action="minifyMenu"> 
	<i class="fa fa-arrow-circle-left hit"></i> 
</span>