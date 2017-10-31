<?php
	include '../config/koneksi.php';
	ini_set('display_errors', 0);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);

  	$cek = $conn->query("SELECT IFNULL(MAX(`no_s`)+1,1) AS `no_s` FROM `t_surat_keluar_new` WHERE DATE_FORMAT(`tanggal_post`,'%Y%m')=DATE_FORMAT(NOW(),'%Y%m')");	
	$result = $cek->fetch_array();
	
	if($x = $result['no_s'])
	{
		$x = $x;
	}	
	else
	{
		$x = $x+1;
	}

	
	$a = date('d');
	$b = 'SC';
	$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
	$d = date('Y');
	
	$nosurat = sprintf('%s/%03d.%s/%s/%d', $b, $x, $a, $c[date('n')], $d);
	// $no_surat = $b.'/'.$a.'.'.date('d').'/'.$c[date('n')].'/'.$d;
	// $no_surat = sprintf( '%s/%02d/%s/%s/%04d' , $b,$a, $romawi[$c] , $d );

	$no = 1;
	$tanggal = 31;
	$tahun = 2012;
	$bulan = 8;
	$romawi = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
	//$surat = 2;
	$tipesurat = "SC";

	// echo sprintf( '%03d/%s/%s/%04d' , $no , $tipesurat[$surat] , $romawi[$bulan] , $tahun );

	// $tahun = 12;

	$coba = sprintf( '%02d/%s/%s/%s/%04d' , $no ,$tanggal , $tipesurat , $romawi[$bulan] , $tahun );
	//echo 

	echo $coba;

	if(isset($_POST['simpan']))
	{	
		$ekstensi = array('jpg','jpeg','png','JPG','PNG','JPEG','pdf','PDF');
    	$maxsize = 104407000;
    	$id_user = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['id_user'], ENT_QUOTES)));
    	$tanggal_surat = $conn->real_escape_string(strtotime($_POST['tanggal_surat']));
    	$tanggal_surat = date("Y-m-d", $tanggal_surat);
    	$no_s = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['no_s'], ENT_QUOTES)));
    	$nosurat = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['nosurat'], ENT_QUOTES)));
    	$untuk = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['untuk'], ENT_QUOTES)));
    	$perihal = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['perihal'], ENT_QUOTES)));
    	$asal_surat = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['asal_surat'], ENT_QUOTES)));
    	$keterangan = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['keterangan'], ENT_QUOTES)));

    	$file = $conn->real_escape_string($_FILES['file']['name']);
	    $x = explode('.', $file);
	    $eks = strtolower(end($x));
	    $ukuran = $conn->real_escape_string($_FILES['file']['size']);
		$tanggal_post = date("Y-m-d H:i:s");

		if(in_array($eks, $ekstensi))
		{
			if($ukuran < $maxsize)
        	{
        		move_uploaded_file($_FILES['file']['tmp_name'], '../assets/doc/'.$_FILES['file']['name']);
        		$sql = "INSERT INTO t_surat_keluar_new VALUES('','$id_user','$tanggal_surat','no_s','$nosurat','$untuk','$perihal','$asal_surat','$keterangan','$file','$tanggal_post')";
        		$query = $conn->query($sql) or die($conn->error);
        		if($query)
        		{
        			print_r('<script>alert("Data Berhasil di Input!");
                                 window.location.href="?page=surat";
                          </script>');
        		}
        	}        	
		}
	}
?>
<section id="widget-grid" class="">
	<div class="row">		
		<article class="col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">	
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Management Surat Keluar </h2>					
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<form id="smart-form-register" class="smart-form" action="" method="POST" enctype="multipart/form-data">
							<header>
								Tambah Surat Keluar
							</header>							
							<fieldset>
								<section>
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" name="tanggal_surat" placeholder="Tanggal Surat" id="datepicker" class="datepicker" autocomplete="Off">
										<b class="tooltip tooltip-bottom-right">Masukan Tanggal Surat</b> </label>
								</section>
								<section hidden="">
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input readonly="" type="text" name="no_s" placeholder="No Surat" value="<?php echo $x;?>">
										<b class="tooltip tooltip-bottom-right">Masukan No Surat</b> </label>
								</section>
								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="nosurat" placeholder="No Surat" value="<?php echo $nosurat;?>">
										<b class="tooltip tooltip-bottom-right">Masukan No Surat</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="untuk" placeholder="Ditujukan untuk">
										<b class="tooltip tooltip-bottom-right">Ditujukan untuk</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="perihal" placeholder="Perihal Surat">
										<b class="tooltip tooltip-bottom-right">Perihal Surat</b> </label>
								</section>								

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="asal_surat" placeholder="Asal Surat">
										<b class="tooltip tooltip-bottom-right">Asal Surat</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-lock"></i>
										<input type="text" name="keterangan" placeholder="Keterangan" id="keterangan">
										<b class="tooltip tooltip-bottom-right">Untuk keterangan</b> </label>
								</section>								
							</fieldset>
							<fieldset>
								<legend>File Surat</legend>						
								<div class="form-group">
									<label class="col-md-2 control-label">File Surat</label>
									<div class="col-md-10">
										<input type="file" name="file" class="btn btn-default form control" id="exampleInputFile1">
										<p class="help-block">
											some help text here.
										</p>
									</div>
								</div>
								
							</fieldset>
							<fieldset>
								<legend>Oleh</legend>						
								<section>
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input type="text" value="<?php echo $_SESSION['nama'];?>" readonly="">										
								</section>								
							</fieldset>
							<fieldset>
								<legend hidden="">ID</legend>						
								<section hidden="">
									<label class="input"> <i class="icon-append fa fa-users"></i>
									<input type="text" name="id_user" readonly="" value="<?php echo $_SESSION['id'];?>">										
								</section>								
							</fieldset>
							<footer>
								<input type="submit" name="simpan" class="btn btn-primary" value="Tambah Surat">
							</footer>
						</form>					
					</div>							
				</div>				
			</div>		
		</article>				
	</div>
</section>