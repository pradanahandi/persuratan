<?php
	include '../config/koneksi.php';
	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);

  	$cek = $conn->query("SELECT IFNULL(MAX(no_m)+1,1) AS `no_m` FROM `t_mou` WHERE no_m AND DATE_FORMAT(`tanggal_post`,'%Y%m%d')=DATE_FORMAT(NOW(),'%Y%m%d')");
  	$cek1 = $conn->query("SELECT (COUNT(*)) AS `no_m` FROM `t_mou` WHERE no_m AND DATE_FORMAT(`tanggal_post`,'%Y')=DATE_FORMAT(NOW(),'%Y')");	    	  	
	$result = $cek->fetch_array();
	$result1 = $cek1->fetch_array();
	if($x = $result['no_m'] )
	{
		$x = $x;
	}	
	else
	{
		$x = $x+1;
	}		
		
	$z = $result1[0]+1;	

	

	$a = date('d');
	$b = 'SC';
	$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
	$d = date('Y');
	$e = 'MOU';
	
	$nomou = sprintf('%s/%03d.%s/%s/%s/%s/%d', $b,$x,$a,$z,$e,$c[date('n')], $d);	

	if(isset($_POST['simpan']))
	{	$path = '../assets/doc/mou/';
		$ekstensi = array('jpg','jpeg','png','JPG','PNG','JPEG','pdf','PDF');
    	$maxsize = 104407000;
    	$id_user = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['id_user'], ENT_QUOTES)));
    	$tanggal_mou = $conn->real_escape_string(strtotime($_POST['tanggal_mou']));
    	$tanggal_mou = date("Y-m-d", $tanggal_mou);
    	$no_m = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['no_m'], ENT_QUOTES)));
    	$nomou = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['nomou'], ENT_QUOTES)));
    	$nama_partner = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['nama_partner'], ENT_QUOTES)));
    	$perihal = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['perihal'], ENT_QUOTES)));    	
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
        		move_uploaded_file($_FILES['file']['tmp_name'], $path.$file);
        		$sql = "INSERT INTO t_mou VALUES('','$id_user','$tanggal_mou','$no_m','$nomou','$nama_partner','$perihal','$keterangan','$file','$tanggal_post')";
        		$query = $conn->query($sql) or die($conn->error);
        		if($query)
        		{
        			print_r('<script>alert("Data Berhasil di Input!");
                                 window.location.href="?page=mou";
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
					<h2>Management MoU </h2>					
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<form id="smart-form-register" class="smart-form" action="" method="POST" enctype="multipart/form-data">
							<header>
								Tambah MoU
							</header>							
							<fieldset>
								<section>
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" name="tanggal_mou" placeholder="Tanggal MoU" id="datepicker" class="datepicker" autocomplete="Off">
										<b class="tooltip tooltip-bottom-right">Masukan Tanggal MoU</b> </label>
								</section>
								<section hidden="">
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input readonly="" type="text" name="no_m" placeholder="No Surat" value="<?php echo $x;?>">
										<b class="tooltip tooltip-bottom-right">Masukan No MoU</b> </label>
								</section>
								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="nomou" placeholder="No Surat" value="<?php echo $nomou;?>">
										<b class="tooltip tooltip-bottom-right">Masukan No MoU</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="nama_partner" placeholder="Nama Partner">
										<b class="tooltip tooltip-bottom-right">Nama Partner</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="perihal" placeholder="Perihal">
										<b class="tooltip tooltip-bottom-right">Perihal</b> </label>
								</section>								

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="keterangan" placeholder="Keterangan">
										<b class="tooltip tooltip-bottom-right">Keterangan</b> </label>
								</section>
											
							</fieldset>
							<fieldset>
								<legend>File MoU</legend>						
								<div class="form-group">
									<label class="col-md-2 control-label">File MoU</label>
									<div class="col-md-10">
										<input type="file" name="file" class="btn btn-default form control" id="exampleInputFile1">
										<p class="help-block">
											Dalam bentuk PDF
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
								<input type="submit" name="simpan" class="btn btn-primary" value="Tambah MoU">
								<input type="button" name="cancel" class="btn btn-primary" value="Cancel" onclick="window.location='?page=mou'">
							</footer>
						</form>					
					</div>							
				</div>				
			</div>		
		</article>				
	</div>
</section>