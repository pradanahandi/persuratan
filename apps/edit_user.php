<?php
	include '../config/koneksi.php';

	$ids = $conn->real_escape_string(htmlentities(htmlspecialchars($_GET['id_user'], ENT_QUOTES)));
	$result = $conn->query("SELECT * FROM t_user WHERE id_user='$ids'");
	$row = $result->fetch_assoc();

	if(isset($_POST['simpan']))
	{
		$options = [
	      'cost' => 12,
	    ];
	    $id_user = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['id_user'],ENT_QUOTES)));
	    $username = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['username'], ENT_QUOTES)));
	    $email = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['email'], ENT_QUOTES)));
	    $password = $conn->real_escape_string(htmlentities(htmlspecialchars(password_hash($_POST['password'], PASSWORD_BCRYPT, $options))));
	    $nama = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['nama'], ENT_QUOTES)));
	    $level = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['level'], ENT_QUOTES)));
	    
	    $query = $conn->query("UPDATE t_user set username='$username', email='$email', password='$password', level='$level' WHERE id_user='$id_user'");
	    if(!$query)
	    {
	    	echo '<script>alert("Data Gagal di Input!");';
	    }
	    else
	    {
	    	echo '<script>alert("Data Berhasil di Input!");
			                window.location.href="?page=user";
			      </script>';
	    }
	}
?>
<section id="widget-grid" class="">
	<div class="row">		
		<article class="col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">				
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Management User </h2>					
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<form id="smart-form-register" class="smart-form" action="" method="POST">
							<header>
								Tambah User
							</header>
							<fieldset>
								<section hidden="">
									<label class="input" > <i class="icon-append fa fa-user"></i>
										<input type="text" hidden="" name="id_user" value="<?php echo $row['id_user'];?>">										
									</label>
								</section>
								<section>
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input type="text" name="username" value="<?php echo $row['username'];?>" readonly="">
										<b class="tooltip tooltip-bottom-right">Needed to enter the website</b> </label>
								</section>
								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="email" name="email" value="<?php echo $row['email'];?>">
										<b class="tooltip tooltip-bottom-right">Needed to verify your account</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-lock"></i>
										<input type="password" name="password" value="<?php echo $row['password'];?>" id="password">
										<b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
								</section>
								<section>
									<label class="input"> <i class="icon-append fa fa-lock"></i>
										<input type="text" name="nama" value="<?php echo $row['nama'];?>" id="nama">
										<b class="tooltip tooltip-bottom-right">Don't forget your name</b> </label>
								</section>
							</fieldset>
							<fieldset>
								<div class="row">
									<section class="col col-6">
										<label class="select">
											<select name="level">
												<option value="0" selected="" disabled="">Level</option>
												<option
													<?php if($row['level'] =='admin' )
														{
															echo "selected";

													}?>
												 value="admin">Administrator</option>
												<option <?php if($row['level'] =='sekretaris' )
														{
															echo "selected";

													}?> value="sekretaris">Sekretaris</option>
												<option <?php if($row['level'] =='magang' )
														{
															echo "selected";

													}?> value="magang">Magang</option>
												<option <?php if($row['level'] =='compart' )
														{
															echo "selected";

													}?> value="compart">Compart</option>
											</select> <i></i> </label>
									</section>	
								</div>
							</fieldset>
							<footer>
								<input type="submit" name="simpan" class="btn btn-primary" value="Tambah User">								
							</footer>
						</form>					
					</div>
					<!-- end widget content -->				
				</div>				
			</div>		
		</article>				
	</div>
</section>