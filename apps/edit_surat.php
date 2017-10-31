<?php
	include '../config/koneksi.php';
	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);

  	$id = $conn->real_escape_string(htmlentities(htmlspecialchars($_GET['id'], ENT_QUOTES)));
	$res = $conn->query("SELECT * FROM t_surat_keluar WHERE id='$id'");
	$row = $res->fetch_assoc();


	if(isset($_POST['simpan']))
	{					
		$ekstensi = array('jpg','jpeg','png','JPG','PNG','JPEG','pdf','PDF');
    	$maxsize = 104407000;
    	$id = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['id'], ENT_QUOTES)));
    	$id_user = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['id_user'], ENT_QUOTES)));
    	$tanggal_surat = $conn->real_escape_string(strtotime($_POST['tanggal_surat']));
    	$tanggal_surat = date("Y-m-d", $tanggal_surat);
    	$no_surat = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['no_surat'], ENT_QUOTES)));
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
        		// UPDATE t_user set username='$username', email='$email', password='$password', level='$level' WHERE id='$id'
        		$sql = "UPDATE t_surat_keluar set id_user='$id_user', no_surat='$no_surat', untuk='$untuk', perihal='$perihal', asal_surat='$asal_surat', keterangan='$keterangan', file='$file', tanggal_post='$tanggal_post' WHERE id='$id'";
        		print_r($sql);        		
        		// move_uploaded_file($_FILES['file']['tmp_name'], '../assets/doc/'.$_FILES['file']['name']);
        		// $sql = "INSERT INTO t_surat_keluar VALUES('','$id_user','$tanggal_surat','$no_surat','$untuk','$perihal','$asal_surat','$keterangan','$file','$tanggal_post')";
        		// $query = $conn->query($sql) or die($conn->error);
        		// if($query)
        		// {
        		// 	print_r('<script>alert("Data Berhasil di Input!");
          //                        window.location.href="?page=surat";
          //                 </script>');
        		// }
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
								<section hidden="">
									<label class="input" > <i class="icon-append fa fa-user"></i>
										<input type="text" readonly="" hidden="" name="id" value="<?php echo $row['id'];?>">										
									</label>
								</section>
								<section>
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" name="tanggal_surat" placeholder="Tanggal Surat" id="datepicker" class="datepicker" autocomplete="Off" value="<?php echo $row['tanggal_surat'];?>">
										<b class="tooltip tooltip-bottom-right">Masukan Tanggal Surat</b> </label>
								</section>
								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="no_surat" placeholder="No Surat" value="<?php echo $row['no_surat'];?>">
										<b class="tooltip tooltip-bottom-right">Masukan No Surat</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="untuk" placeholder="Ditujukan untuk" value="<?php echo $row['untuk'];?>">
										<b class="tooltip tooltip-bottom-right">Ditujukan untuk</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="perihal" placeholder="Perihal Surat" value="<?php echo $row['perihal'];?>">
										<b class="tooltip tooltip-bottom-right">Perihal Surat</b> </label>
								</section>								

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="asal_surat" placeholder="Asal Surat" value="<?php echo $row['asal_surat'];?>">
										<b class="tooltip tooltip-bottom-right">Asal Surat</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-lock"></i>
										<input type="text" name="keterangan" placeholder="Keterangan" id="keterangan" value="<?php echo $row['keterangan'];?>">
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
								<input type="submit" name="simpan" class="btn btn-primary" value="Update Surat">
							</footer>
						</form>					
					</div>							
				</div>				
			</div>		
		</article>				
	</div>
</section>