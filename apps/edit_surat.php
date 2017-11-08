<?php
	include '../config/koneksi.php';
	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);

  	$id = $conn->real_escape_string(htmlentities(htmlspecialchars($_GET['id'], ENT_QUOTES)));
	$res = $conn->query("SELECT * FROM t_surat_keluar INNER JOIN t_user ON t_surat_keluar.id_user=t_user.id_user WHERE t_surat_keluar.id='$id' ORDER BY t_surat_keluar.id");
	$row = $res->fetch_assoc();


	if(isset($_POST['simpan']))
	{					
		$ekstensi = array('jpg','jpeg','png','JPG','PNG','JPEG','pdf','PDF');
    	$maxsize = 104407000;
    	$id = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['id'], ENT_QUOTES)));    
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


		if(empty($file))
		{
			$sql = "UPDATE t_surat_keluar set id_user='$id_user', no_s='$no_s',nosurat='$nosurat', untuk='$untuk', perihal='$perihal', asal_surat='$asal_surat', keterangan='$keterangan', tanggal_post='$tanggal_post' WHERE id='$id'";	
			$query = $conn->query($sql) or die();
			if($query)
    		{
    			print_r('<script>alert("Data Berhasil di Update!");
                             window.location.href="?page=surat";
                      </script>');
    		}
    		else    		
    		{
    			print_r('<script>alert("Data Gagal di Update!");
                             window.location.href="?page=surat";
                      </script>');
    		}
		}
		elseif (!empty($file))
		{
			if(in_array($eks, $ekstensi))
			{
				if($ukuran < $maxsize)
	        	{   
	        		move_uploaded_file($_FILES['file']['tmp_name'], '../assets/doc/'.$_FILES['file']['name']);
		        		$sql = "UPDATE t_surat_keluar set id_user='$id_user', no_s='$no_s',nosurat='$nosurat', untuk='$untuk', perihal='$perihal', asal_surat='$asal_surat', keterangan='$keterangan', file='$file', tanggal_post='$tanggal_post' WHERE id='$id'" or die();
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
								<section hidden="">
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="no_s" placeholder="No Surat" value="<?php echo $row['no_s'];?>">
										<b class="tooltip tooltip-bottom-right">No Urut Surat</b> </label>
								</section>
								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="nosurat" placeholder="No Surat" value="<?php echo $row['nosurat'];?>">
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
									<input type="text" name="id_user" readonly="" value="<?php echo $_SESSION['id_user'];?>">										
								</section>								
							</fieldset>
							<footer>
								<input type="submit" name="simpan" class="btn btn-primary" value="Update Surat">
								<input type="button" name="cancel" class="btn btn-primary" value="Cancel" onclick="window.location='?page=surat'">
							</footer>
						</form>					
					</div>							
				</div>				
			</div>		
		</article>				
	</div>
</section>