<?php
	include '../config/koneksi.php';
	if(isset($_POST['simpan']))
	{
		$options = [
	      'cost' => 12,
	    ];
	    $username = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['username'], ENT_QUOTES)));
	    $email = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['email'], ENT_QUOTES)));
	    $password = $conn->real_escape_string(htmlentities(htmlspecialchars(password_hash($_POST['password'], PASSWORD_BCRYPT, $options))));
	    $nama = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['nama'], ENT_QUOTES)));
	    $level = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['level'], ENT_QUOTES)));
	    
	    $cek = $conn->query("SELECT * FROM t_user WHERE username='$username' and email='$email' ORDER BY id_user");
	    if($cek->num_rows > 0)
	    {
	    	print_r('<script>alert("Username dan Email sudah terdaftar");</script>');
	    }
	    else
	    {
	    	$query = $conn->query("INSERT INTO t_user VALUES('','$username','$email','$password','$nama','$level')");
	    	print_r('<script>alert("Data Berhasil di Input!");
			                window.location.href="?page=user";
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
								<section>
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input type="text" name="username" placeholder="Username">
										<b class="tooltip tooltip-bottom-right">Needed to enter the website</b> </label>
								</section>
								<section>
									<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
										<input type="email" name="email" placeholder="Email address">
										<b class="tooltip tooltip-bottom-right">Needed to verify your account</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-lock"></i>
										<input type="password" name="password" placeholder="Password" id="password">
										<b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
								</section>

								<section>
									<label class="input"> <i class="icon-append fa fa-users"></i>
										<input type="text" name="nama" placeholder="Nama Lengkap" id="nama">
										<b class="tooltip tooltip-bottom-right">Don't forget your name</b> </label>
								</section>
							</fieldset>
							<fieldset>
								<div class="row">
									<section class="col col-6">
										<label class="select">
											<select name="level">
												<option value="0" selected="" disabled="">Level</option>
												<option value="admin">Administrator</option>
												<option value="sekretaris">Sekretaris</option>
												<option value="magang">Magang</option>
												<option value="compart">Compart</option>			
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