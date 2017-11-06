<?php
	include '../config/koneksi.php';
	include '../config/fungsi.php';
?>
<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Dashboard <span>> My Dashboard</span></h1>
	</div>	
</div>
<section id="widget-grid" class="">
	<?php
		if($_SESSION['level'] == 'admin')
		{
	?>
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="sparks-info">
				<h5> Total Surat Masuk <br/><span class="txt-color-blue"><?php viewSurat();?></span></h5>
			</div>			
		</div>		

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="sparks-info">
				<h5> Total MoU <br/><span class="txt-color-blue"><?php viewMoU();?></span></h5>
			</div>			
		</div>

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="sparks-info">
				<h5> Total MoA <br/><span class="txt-color-blue"><?php viewMoA();?></span></h5>
			</div>			
		</div>

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="sparks-info">
				<h5> Total User <br/><span class="txt-color-blue"><?php viewUser();?></span></h5>
			</div>			
		</div>
	</div>
	<?php 
	 	}
	 	if($_SESSION['level'] == 'sekretaris')
		{
	?>				
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="sparks-info">
				<h5> Total Surat Masuk <br/><span class="txt-color-blue"><?php viewSurat();?></span></h5>
			</div>			
		</div>		

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="sparks-info">
				<h5> Total MoU <br/><span class="txt-color-blue"><?php viewMoU();?></span></h5>
			</div>			
		</div>

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="sparks-info">
				<h5> Total MoA <br/><span class="txt-color-blue"><?php viewMoA();?></span></h5>
			</div>			
		</div>
	</div>
	<?php 
	 	}
	 	if($_SESSION['level'] == 'magang')
	 	{	 		
	?>
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="sparks-info">
				<h5> Total Surat Masuk <br/><span class="txt-color-blue"><?php viewSurat();?></span></h5>
			</div>			
		</div>		

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="sparks-info">
				<h5> Total MoU <br/><span class="txt-color-blue"><?php viewMoU();?></span></h5>
			</div>			
		</div>

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="sparks-info">
				<h5> Total MoA <br/><span class="txt-color-blue"><?php viewMoA();?></span></h5>
			</div>			
		</div>
	</div>
	<?php 
		}
		if($_SESSION['level'] == 'compart')
		{
	?>
	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="sparks-info">
				<h5> Total MoU <br/><span class="txt-color-blue"><?php viewMoU();?></span></h5>
			</div>			
		</div>

		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="sparks-info">
				<h5> Total MoA <br/><span class="txt-color-blue"><?php viewMoA();?></span></h5>
			</div>			
		</div>
	</div>
	<?php
		}
	?>
</section>