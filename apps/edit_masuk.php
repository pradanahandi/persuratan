<?php
	include '../config/koneksi.php';
	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);


  	$id = $conn->real_escape_string(htmlentities(htmlspecialchars($_GET['id'], ENT_QUOTES)));
	$res = $conn->query("SELECT * FROM t_masuk INNER JOIN t_user ON t_masuk.id_user=t_user.id_user WHERE t_masuk.id='$id' ORDER BY t_masuk.id");
	$row = $res->fetch_assoc();
  	
	if(isset($_POST['simpan']))
	{	
		$ekstensi = array('jpg','jpeg','png','JPG','PNG','JPEG','pdf','PDF');
    	$maxsize = 104407000;
    	$id = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['id'], ENT_QUOTES)));
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

		if(empty($file))
		{			
			$sql = "UPDATE t_masuk set id_user='$id_user', no_a='$no_a',noagenda='$noagenda',tanggal_agenda='$tanggal_agenda',tanggal_diterima='$tanggal_diterima',dikirim_melalui='$dikirim_melalui',asal_surat='$asal_surat',tanggal_surat='$tanggal_surat',no_surat='$no_surat', perihal='$perihal',perihal='$perihal',disposisi_kepada='$disposisi_kepada', sifat_surat='$sifat_surat', keterangan='$keterangan', tanggal_post='$tanggal_post' WHERE id='$id'";	
			$query = $conn->query($sql) or die();
			if($query)
    		{
    			print_r('<script>alert("Data Berhasil di Update!");
                             window.location.href="?page=surat_masuk";
                      </script>');
    		}
    		else    		
    		{
    			print_r('<script>alert("Data Gagal di Update!");
                             window.location.href="?page=surat_masuk";
                      </script>');
    		}
		}
		elseif (!empty($file))
		{
			if(in_array($eks, $ekstensi))
			{
				if($ukuran < $maxsize)
	        	{   
	        		move_uploaded_file($_FILES['file']['tmp_name'], '../assets/doc/suratmasuk/'.$_FILES['file']['name']);
        			$sql = "UPDATE t_masuk set id_user='$id_user', no_a='$no_a',noagenda='$noagenda',tanggal_agenda='$tanggal_agenda',tanggal_diterima='$tanggal_diterima',dikirim_melalui='$dikirim_melalui',asal_surat='$asal_surat',tanggal_surat='$tanggal_surat',no_surat='$no_surat', perihal='$perihal',perihal='$perihal',disposisi_kepada='$disposisi_kepada', sifat_surat='$sifat_surat',file='$file', keterangan='$keterangan', tanggal_post='$tanggal_post' WHERE id='$id'" or die();	
	        		
	        		$query = $conn->query($sql) or die($conn->error);
	        		if($query)
	        		{
	        			print_r('<script>alert("Data Berhasil di UPDATE!");
	                                 window.location.href="?page=surat_masuk";
	                          </script>');
	        		}
	        		else    		
		    		{
		    			print_r('<script>alert("Data Gagal di Update!");
		                             window.location.href="?page=surat_masuk";
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
										<input type="text" name="id" placeholder="ID" value="<?php echo ;?>">
										<b class="tooltip tooltip-bottom-right">No Urut Agenda</b> </label>
								</section>		
								<section hidden="">
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" name="no_a" placeholder="No Agenda" value="<?php echo $row['no_a']?>">
										<b class="tooltip tooltip-bottom-right">No Urut Agenda</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="text" required="" name="noagenda" placeholder="No Agenda" value="<?php echo $noagenda;?>">
										<b class="tooltip tooltip-bottom-right">Masukan No Agenda</b> </label>
								</section>
								<section>
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" required="" name="tanggal_agenda" placeholder="Tanggal Agenda" id="datepicker" class="datepicker" autocomplete="Off" value="<?php echo $row['tanggal_agenda'];?>">
										<b class="tooltip tooltip-bottom-right">Masukan Tanggal Agenda</b> </label>
								</section>		

								<section>
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" required="" name="tanggal_diterima" placeholder="Tanggal Diterima" id="datepicker1" class="datepicker" autocomplete="Off" value="<?php echo $row['tanggal_diterima'];?>">
										<b class="tooltip tooltip-bottom-right">Tanggal Diterima</b> </label>
								</section>

								<section>
									<label class="select">
										<select name="dikirim_melalui">
											<option value="0" selected="" disabled="">Dikirim melalui</option>
											<option
												<?php 
													if($row['dikirim_melalui'] =='fax' )
														{
															echo "selected";

													}
												?>
												value="fax">Fax
											</option>
											<option 
												<?php 
													if($row['dikirim_melalui'] =='email' )
														{
															echo "selected";

													}
												?>
											value="email">Email</option>
											<option 
												<?php 
													if($row['dikirim_melalui'] =='pos' )
														{
															echo "selected";

													}
												?>
											value="pos">Pos</option>	
											<option 
												<?php 
													if($row['dikirim_melalui'] =='langsung' )
														{
															echo "selected";

													}
												?>
											value="langsung">Langsung</option>
											<option 
												<?php 
													if($row['dikirim_melalui'] =='lain-lain' )
														{
															echo "selected";

													}
												?>
											value="lain-lain">Lain-lain</option>
										</select> <i></i> 
									</label>
								</section>	

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input required="" type="text" name="asal_surat" placeholder="Asal Surat" value="<?php echo $row['asal_surat'];?>">
										<b class="tooltip tooltip-bottom-right">Asal Surat</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input required="" type="text" name="tanggal_surat" placeholder="Tanggal Surat" id="datepicker2" class="datepicker" autocomplete="Off" value="<?php echo $row['tanggal_surat'];?>">
										<b class="tooltip tooltip-bottom-right">Tanggal Surat</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input required="" type="text" name="no_surat" placeholder="No Surat" value="<?php echo $row['no_surat'];?>">
										<b class="tooltip tooltip-bottom-right">No Surat</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input required="" type="text" name="perihal" placeholder="Perihal Surat" value="<?php echo $row['perihal'];?>">
										<b class="tooltip tooltip-bottom-right">Perihal Surat</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input required="" type="text" name="disposisi_kepada" placeholder="Disposisi Kepada" value="<?php echo $row['disposisi_kepada'];?>">
										<b class="tooltip tooltip-bottom-right">Disposisi Kepada</b> </label>
								</section>								
								<section>
									<label class="select">
										<select name="sifat_surat">
											<option value="0" selected="" disabled="">Sifat Surat</option>
											<option 
												<?php 
													if($row['sifat_surat'] =='penting' )
														{
															echo "selected";

													}
												?>
											value="penting">Penting</option>
											<option 
												<?php 
													if($row['sifat_surat'] =='biasa' )
														{
															echo "selected";

													}
												?>
											value="biasa">Biasa</option>
											<option 
												<?php 
													if($row['sifat_surat'] =='segera' )
														{
															echo "selected";

													}
												?>
											value="segera">Segera</option>	
											<option 
												<?php 
													if($row['sifat_surat'] =='sangat segera' )
														{
															echo "selected";

													}
												?>
											value="sangat segera">Sangat Segera</option>	
										</select> <i></i> 
									</label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-lock"></i>
										<input type="text" name="keterangan" placeholder="Keterangan (Optional)" id="keterangan" value="<?php echo $row['keterangan'];?>">
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