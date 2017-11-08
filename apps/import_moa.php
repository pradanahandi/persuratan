<?php
	include '../config/koneksi.php';
	include '../config/excel_reader2.php';
	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);

  	

	if(isset($_POST['simpan']))
	{		
		$data = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name']);
		$baris = $data->rowcount($sheet_index=0);

		$sukses =0;
		$gagal =0;

		//import data excel mulai baris 2. (Karena baris 1 untuk nama kolom)
		for($i=2; $i<=$baris; $i++)
		{
			$id_user = $data->val($i,2);
			$tanggal_moa = $data->val($i,3);
			$tanggal_moa = date("Y-m-d", strtotime($tanggal_moa));
			$no_m = $data->val($i,4);
			$nomoa = $data->val($i,5);
			$nama_partner = $data->val($i,6);
			$perihal = $data->val($i,7);			
			$keterangan = $data->val($i,8);
			$file = $data->val($i,9);
			$tanggal_post = $data->val($i,10);
			$tanggal_post = date("Y-m-d H:i:s", strtotime($tanggal_post));
			$rand = rand();

			$sql = "INSERT INTO t_moa VALUES('','$id_user','$tanggal_moa','$no_m','$nomoa','$nama_partner','$perihal','$keterangan','$file','$tanggal_post')";        		
			$query = $conn->query($sql) or die($conn->error);
			if($baris) $sukses++;
			else $gagal++;

			print_r($sql);
		}
		
		print_r('<script>alert("Data Berhasil di Input!");
                         window.location.href="?page=moa";
                  </script>');		    	
	}
?>

<section id="widget-grid" class="">
	<div class="row">		
		<article class="col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">	
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Management Import MoA </h2>					
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<form id="smart-form-register" class="smart-form" action="" method="POST" enctype="multipart/form-data">
							<header>
								Import MoA
							</header>							
							<fieldset>								
							<fieldset>
								<legend>File Import</legend>						
								<div class="form-group">
									<label class="col-md-2 control-label">File Import</label>
									<div class="col-md-10">
										<input type="file" name="file" class="btn btn-default form control" id="exampleInputFile1">
										<p class="help-block">
											some help text here.
										</p>
									</div>
								</div>
								
							</fieldset>							
							<footer>
								<input type="submit" name="simpan" class="btn btn-primary" value="Tambah Surat">
								<input type="button" name="cancel" class="btn btn-primary" value="Cancel" onclick="window.location='?page=moa'">
							</footer>
						</form>					
					</div>							
				</div>				
			</div>		
		</article>				
	</div>
</section>