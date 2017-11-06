<?php
	include '../config/koneksi.php';
	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);

  	$id = $conn->real_escape_string(htmlentities(htmlspecialchars($_GET['id'], ENT_QUOTES)));
	$res = $conn->query("SELECT * FROM t_moa INNER JOIN t_user ON t_moa.id_user=t_user.id_user WHERE t_moa.id='$id' ORDER BY t_moa.id");
	$row = $res->fetch_assoc();


	if(isset($_POST['simpan']))
	{	$path = '../assets/doc/moa/';
		$ekstensi = array('jpg','jpeg','png','JPG','PNG','JPEG','pdf','PDF');
    	$maxsize = 104407000;
    	$id_user = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['id_user'], ENT_QUOTES)));
    	$tanggal_moa = $conn->real_escape_string(strtotime($_POST['tanggal_moa']));
    	$tanggal_moa = date("Y-m-d", $tanggal_moa);
    	$no_m = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['no_m'], ENT_QUOTES)));
    	$nomoa = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['nomoa'], ENT_QUOTES)));
    	$nama_partner = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['nama_partner'], ENT_QUOTES)));
    	$perihal = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['perihal'], ENT_QUOTES)));    	
    	$keterangan = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['keterangan'], ENT_QUOTES)));

    	$file = $conn->real_escape_string($_FILES['file']['name']);
	    $x = explode('.', $file);
	    $eks = strtolower(end($x));
	    $ukuran = $conn->real_escape_string($_FILES['file']['size']);
		$tanggal_post = date("Y-m-d H:i:s");

		if(empty($file))
		{
			$sql = "UPDATE t_moa set id_user='$id_user', no_m='$no_m',nomoa='$nomoa', nama_partner='$nama_partner', perihal='$perihal', keterangan='$keterangan', tanggal_post='$tanggal_post' WHERE id='$id'";	
			$query = $conn->query($sql) or die();
			if($query)
    		{
    			print_r('<script>alert("Data Berhasil di Update!");
                             window.location.href="?page=moa";
                      </script>');
    		}
    		else    		
    		{
    			print_r('<script>alert("Data Gagal di Update!");
                             window.location.href="?page=moa";
                      </script>');
    		}
		}
		elseif (!empty($file))
		{
			if(in_array($eks, $ekstensi))
			{
				if($ukuran < $maxsize)
	        	{   
	        		move_uploaded_file($_FILES['file']['tmp_name'], $path.$file);
	        		$sql = "UPDATE t_moa set id_user='$id_user', no_m='$no_m',nomoa='$nomoa', nama_partner='$nama_partner', perihal='$perihal', keterangan='$keterangan',file='$file', tanggal_post='$tanggal_post' WHERE id='$id'";
	        		$query = $conn->query($sql) or die();
	        		if($query)
	        		{
	        			print_r('<script>alert("Data Berhasil di Input!");
	                                 window.location.href="?page=moa";
	                          </script>');
	        		}
	        		else
	        		{
	        			print_r('<script>alert("Data Gagal di Input!");
	                                 window.location.href="?page=moa";
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
					<h2>Management MoA </h2>					
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<form id="smart-form-register" class="smart-form" action="" method="POST" enctype="multipart/form-data">
							<header>
								Tambah MoA
							</header>							
							<fieldset>
								<section hidden="">
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input readonly="" type="text" name="id"  value="<?php echo $row['id'];?>">
										<b class="tooltip tooltip-bottom-right">ID</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" name="tanggal_moa" placeholder="Tanggal MoA" id="datepicker" class="datepicker" autocomplete="Off" value="<?php echo $row['tanggal_moa'];?>">
										<b class="tooltip tooltip-bottom-right">Masukan Tanggal MoU</b> </label>
								</section>
								<section hidden="">
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input readonly="" type="text" name="no_m" placeholder="No Surat" value="<?php echo $row['no_m'];?>">
										<b class="tooltip tooltip-bottom-right">Masukan No MoU</b> </label>
								</section>
								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="nomoa" placeholder="No MoA" value="<?php echo $row['nomoa'];?>">
										<b class="tooltip tooltip-bottom-right">Masukan No MoU</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="nama_partner" placeholder="Nama Partner" value="<?php echo $row['nama_partner']?>">
										<b class="tooltip tooltip-bottom-right">Nama Partner</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="perihal" placeholder="Perihal" value="<?php echo $row['perihal'];?>">
										<b class="tooltip tooltip-bottom-right">Perihal</b> </label>
								</section>								

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="keterangan" placeholder="Keterangan" value="<?php echo $row['keterangan'];?>">
										<b class="tooltip tooltip-bottom-right">Keterangan</b> </label>
								</section>
											
							</fieldset>
							<fieldset>
								<legend>File MoA</legend>						
								<div class="form-group">
									<label class="col-md-2 control-label">File MoA</label>
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
								<input type="submit" name="simpan" class="btn btn-primary" value="Edit MoU">
								<input type="button" name="cancel" class="btn btn-primary" value="Cancel" onclick="window.location='?page=moa'">
							</footer>
						</form>					
					</div>							
				</div>				
			</div>		
		</article>				
	</div>
</section>