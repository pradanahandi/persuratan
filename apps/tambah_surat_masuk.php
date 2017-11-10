<?php
	include '../config/koneksi.php';
	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);

  	$cek = $conn->query("SELECT IFNULL(MAX(no_a)+1,1) AS `no_a` FROM `t_masuk` WHERE no_a AND DATE_FORMAT(`tanggal_post`,'%Y')=DATE_FORMAT(NOW(),'%Y')");
  	$cek1 = $conn->query("SELECT (COUNT(*)) AS `no_a` FROM `t_masuk` WHERE no_a AND DATE_FORMAT(`tanggal_post`,'%Y')=DATE_FORMAT(NOW(),'%Y')");	    	  	
	$result = $cek->fetch_array();
	$result1 = $cek1->fetch_array();
	if($x = $result['no_a'] )
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
	
	$nosurat = sprintf('%04s/%s/%d', $z,$c[date('n')], $d);	

	if(isset($_POST['simpan']))
	{	
		$ekstensi = array('jpg','jpeg','png','JPG','PNG','JPEG','pdf','PDF');
    	$maxsize = 104407000;
    	$id_user = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['id_user'], ENT_QUOTES)));    	
    	$no_a = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['no_a'], ENT_QUOTES)));
    	$noagenda = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['noagenda'], ENT_QUOTES)));
    	$tanggal_agenda = $conn->real_escape_string(strtotime($_POST['tanggal_agenda']));    	
    	$tanggal_agenda = date("Y-m-d", $tanggal_agenda);

    	$tanggal_diterima = $conn->real_escape_string(strtotime($_POST['tanggal_diterima']));
    	$tanggal_diterima = date("Y-m-d", $tanggal_diterima);
    	$dikirim_melalui = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['dikirim_melalui'], ENT_QUOTES)));
    	$asal_surat = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['asal_surat'], ENT_QUOTES)));
    	$tanggal_surat = $conn->real_escape_string(strtotime($_POST['tanggal_surat']));
    	$tanggal_surat = date("Y-m-d", $tanggal_surat);

    	$no_surat = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['no_surat'], ENT_QUOTES)));
    	
    	$sifat_surat = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['sifat_surat'], ENT_QUOTES)));

    	$perihal = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['perihal'], ENT_QUOTES)));    	

    	$disposisi_kepada = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['disposisi_kepada'], ENT_QUOTES)));
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
        		move_uploaded_file($_FILES['file']['tmp_name'], '../assets/doc/suratmasuk/'.$_FILES['file']['name']);
        		$sql = "INSERT INTO t_masuk VALUES('','$id_user','$no_a','$noagenda','$tanggal_agenda','$tanggal_diterima','$dikirim_melalui','$asal_surat','$tanggal_surat','no_surat','$perihal','$disposisi_kepada','$sifat_surat','$file','$keterangan','$tanggal_post')";        		
        		$query = $conn->query($sql) or die($conn->error);
        		print_r('<script>alert("Data Berhasil di Input!");
                                 window.location.href="?page=surat_masuk";
                          </script>');        		
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
					<h2>Management Surat Masuk </h2>					
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<form id="smart-form-register" class="smart-form" action="" method="POST" enctype="multipart/form-data">
							<header>
								Tambah Surat Masuk
							</header>							
							<fieldset>			
								<section hidden="">
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="no_a" placeholder="No Agenda" value="<?php echo $x;?>">
										<b class="tooltip tooltip-bottom-right">No Urut Agenda</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" required="" name="noagenda" placeholder="No Agenda" value="<?php echo $nosurat;?>">
										<b class="tooltip tooltip-bottom-right">Masukan No Agenda</b> </label>
								</section>
								<section>
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" required="" name="tanggal_agenda" placeholder="Tanggal Agenda" id="datepicker" class="datepicker" autocomplete="Off">
										<b class="tooltip tooltip-bottom-right">Masukan Tanggal Agenda</b> </label>
								</section>		

								<section>
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" required="" name="tanggal_diterima" placeholder="Tanggal Diterima" id="datepicker1" class="datepicker" autocomplete="Off">
										<b class="tooltip tooltip-bottom-right">Tanggal Diterima</b> </label>
								</section>

								<section>
									<label class="select">
										<select name="dikirim_melalui">
											<option value="0" selected="" disabled="">Dikirim melalui</option>
											<option value="fax">Fax</option>
											<option value="email">Email</option>
											<option value="pos">Pos</option>	
											<option value="langsung">Langsung</option>
											<option value="lain-lain">Lain-lain</option>
										</select> <i></i> 
									</label>
								</section>	

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input required="" type="text" name="asal_surat" placeholder="Asal Surat">
										<b class="tooltip tooltip-bottom-right">Asal Surat</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input required="" type="text" name="tanggal_surat" placeholder="Tanggal Surat" id="datepicker2" class="datepicker" autocomplete="Off">
										<b class="tooltip tooltip-bottom-right">Tanggal Surat</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input required="" type="text" name="no_surat" placeholder="No Surat">
										<b class="tooltip tooltip-bottom-right">No Surat</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input required="" type="text" name="perihal" placeholder="Perihal Surat">
										<b class="tooltip tooltip-bottom-right">Perihal Surat</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input required="" type="text" name="disposisi_kepada" placeholder="Disposisi Kepada">
										<b class="tooltip tooltip-bottom-right">Disposisi Kepada</b> </label>
								</section>								
								<section>
									<label class="select">
										<select name="sifat_surat">
											<option value="0" selected="" disabled="">Sifat Surat</option>
											<option value="penting">Penting</option>
											<option value="biasa">Biasa</option>
											<option value="segera">Segera</option>	
											<option value="sangat segera">Sangat Segera</option>	
										</select> <i></i> 
									</label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-lock"></i>
										<input type="text" name="keterangan" placeholder="Keterangan (Optional)" id="keterangan">
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
								<input type="submit" name="simpan" class="btn btn-primary" value="Tambah Surat">
								<input type="button" name="cancel" class="btn btn-primary" value="Cancel" onclick="window.location='?page=surat_masuk'">
							</footer>
						</form>					
					</div>							
				</div>				
			</div>		
		</article>				
	</div>
</section>