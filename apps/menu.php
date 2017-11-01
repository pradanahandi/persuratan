<!-- User info -->
<div class="login-info">
	<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
		
		<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
			<img src="../assets/img/avatars/sunny.png" alt="me" class="online" /> 
			<span>
				<?php echo $_SESSION['nama'];?><br/>
			</span>
			<i class="fa fa-angle-down"></i>
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
		<!-- <li class="active">
			<a href="index.php" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
		</li> -->					
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
		<!-- <li class="active">
			<a href="index.php" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
		</li> -->					
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
<?php } ?>
<?php
	if($_SESSION['level'] == 'compart')
	{
?>
 	<?php echo $$_SESSION['level'];?>
<!-- <nav>		
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
</nav> -->
<?php 
	}	
?>


<span class="minifyme" data-action="minifyMenu"> 
	<i class="fa fa-arrow-circle-left hit"></i> 
</span>