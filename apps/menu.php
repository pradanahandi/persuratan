<!-- User info -->
<div class="login-info">
	<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
		
		<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
			<img src="../assets/img/avatars/sunny.png" alt="me" class="online" /> 
			<span>
				<?php echo $_SESSION['email'];?> 
			</span>
			<i class="fa fa-angle-down"></i>
		</a> 
		
	</span>
</div>
<!-- end user info -->

<!-- NAVIGATION : This navigation is also responsive-->
<nav>	
	<?php
		if($_SESSION['username'] == 'admin')
			{
		?>
	<ul>
		<li class="active">
			<a href="index.html" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
		</li>					
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Surat Masuk</span></a>
			<ul>
				<li>
					<a href="flot.html">Input Surat</a>
				</li>
				<li>
					<a href="?page=Surat">View Surat</a>
				</li>				
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">MoU</span></a>
			<ul>
				<li>
					<a href="table.html">Input MoU</a>
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
					<a href="form-elements.html">Input MoA</a>
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
	<?php } ?>
	<?php
		if($_SESSION['username'] == 'sekretaris')
		{
	?>	
	<ul>	
		<li class="active">
			<a href="index.html" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
		</li>					
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Surat Masuk</span></a>
			<ul>
				<li>
					<a href="flot.html">Input Surat</a>
				</li>
				<li>
					<a href="?page=Surat">View Surat</a>
				</li>				
			</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-lg fa-fw fa-table"></i> <span class="menu-item-parent">MoU</span></a>
			<ul>
				<li>
					<a href="table.html">Input MoU</a>
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
					<a href="form-elements.html">Input MoA</a>
				</li>
				<li>
					<a href="?page=moa">View MoA</a>
				</li>				
			</ul>
		</li>		
	</ul>
	<?php } ?>
</nav>
<span class="minifyme" data-action="minifyMenu"> 
	<i class="fa fa-arrow-circle-left hit"></i> 
</span>