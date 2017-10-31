<?php
	include '../config/koneksi.php';

	$cek = $conn->query("SELECT no_surat FROM t_surat_keluar ORDER BY id DESC LIMIT 1");
	$result = $cek->fetch_array();

	$ex = explode('/', $result['no_surat']);

	if(date('d')=='01')
	{
		$a = '01';
	}
	else
	{
		$a = $ex[0]+1;
	}

	// $e = $result['no_surat']+1;

	$b = 'SC';
	$c = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
	$d = date('Y');
	
	$no_surat = $b.'/'.$a.'/'.$c[date('n')].'/'.$d;

	if(isset($_POST['simpan']))
	{	

		$tanggal_surat = $conn->real_escape_string($_POST['tanggal_surat']);
    	$tanggal_surat = date("d/m/Y", strtotime($tanggal_surat));

	    $no_surat = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['no_surat'], ENT_QUOTES)));
	    $untuk = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['untuk'], ENT_QUOTES)));	    
	    $perihal = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['perihal'], ENT_QUOTES)));
	    $asal_surat = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['asal_surat'], ENT_QUOTES)));

	    $keterangan = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['keterangan'], ENT_QUOTES)));
	    $id_user = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['id_user'], ENT_QUOTES)));
	    $tanggal_post = date("d-m-Y H:i:s");
	    
	    $ekstensi_boleh = array('pdf','jpg','jpeg');
	    $file = $_FILES['file']['name'];
	    $x = explode('.', $file);
	    $ekt = strtolower(end($x));
	    $ukuran = $_FILES['file']['size'];
	    $file_tmp = $_FILES['file']['tmp_name'];

	    if(in_array($ekt, $ekstensi_boleh) === true)
	    {
	    	if($ukuran < 25000000)
	    	{
	    		move_uploaded_file($file_tmp, '../assets/doc/'.$file);
	    		$cek = "INSERT INTO t_surat_keluar VALUES('','$id_user','$tanggal_surat','$no_surat','$untuk','$perihal','$asal_surat','$keterangan','$file','$tanggal_post')";

	    		print_r($cek);
	    		// $query = $conn->query("INSERT INTO t_surat_keluar VALUES('','$id_user','$tanggal_surat','$no_surat','$untuk','$perihal','$asal_surat','$keterangan','$file')");
	    		// if($query)
	    		// {
	    		// 	print_r('<script>alert("Data Berhasil di Input!");
			    //             window.location.href="?page=surat";
			    //   			</script>');
	    		// }
	    		// else
	    		// {
	    		// 	echo "gagal diinput" or die();
	    		// }
	    	}
	    	else
	    	{
	    		print_r('<script>alert("File terlalu besar!");			               
		      			 </script>');
	    	}
	    }
	    else
	    {
	    	print_r('<script>alert("File hanya boleh PDF atau JPG!");			               
		      			 </script>');
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
								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="no_surat" placeholder="No Surat" value="<?php echo $no_surat;?>">
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
								<input type="submit" name="simpan" class="btn btn-primary" value="Tambah User">
							</footer>
						</form>					
					</div>							
				</div>				
			</div>		
		</article>				
	</div>
</section>