<?php
	include 'config/koneksi.php';
	if(isset($_POST['submit']))
    {    

    	// print_r('<script>alert("Hello");</script>');
        $username = $conn->real_escape_string(htmlentities(htmlspecialchars($_POST['username'], ENT_QUOTES)));
        $userpass = $conn->real_escape_string(htmlspecialchars($_POST['password'], ENT_QUOTES));
        $sql = "SELECT * FROM t_user WHERE username='$username'";
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
        $pass = $row['password'];
        $level = $row['level'];
        if(empty($username) or empty($userpass))    
        {
            echo '<script>alert("Username dan Password harus diisi!")</script>';
        }
        else
        {
            if(password_verify($userpass, $pass))
            {                    
                if($level == 'admin');
                {
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['level'] = $row['level'];                        
                    echo '<script language="javascript">
                          window.alert("Login Berhasil");                  
                          window.location.href="apps/index.php";
                        </script>';
                }
                if($level == 'humas')
                {
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['level'] = $row['level'];                        
                    echo '<script language="javascript">
                          window.alert("Login Berhasil");
                          window.location.href="apps/index.php";
                        </script>';
                }         
            }
            else
            {
                echo '<script>alert("Password tidak sesuai!");
                        location.href="?page=login";
                        </script>';
            }
        }                    
    }
?>
<div class="row">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	</div>					
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<div class="well no-padding">
			<form action="" method="POST" id="login-form" class="smart-form client-form">
				<header style="text-align: center;">
					<img src="assets/img/logo_seamolec.png" width="70px"><br/><br/>
					Aplikasi Persuratan
				</header>
				<fieldset>
					<section>
						<label class="label">Username</label>
						<label class="input"> <i class="icon-append fa fa-user"></i>
							<input type="text" name="username">
							<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter username</b></label>
					</section>

					<section>
						<label class="label">Password</label>
						<label class="input"> <i class="icon-append fa fa-lock"></i>
							<input type="password" name="password">
							<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>				
					</section>	
				</fieldset>
				<footer>
					<button type="submit" name="submit" class="btn btn-primary">
						Sign in
					</button>
				</footer>
			</form>

		</div>						
		
	</div>
</div>