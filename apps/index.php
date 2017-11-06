<?php 
	session_start();
	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);
	if(!$_SESSION['username'] && !$_SESSION['level'])
    {
        header("Location:../index.php");
    }
    if($_SESSION['username'] && $_SESSION['level'])
    {    	
        $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
		<title> Aplikasi Persuratan SEAMOLEC </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/smartadmin-rtl.min.css">
		
		<link rel="stylesheet" type="text/css" media="screen" href="../assets/css/demo.min.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="../assets/img/logo_seamolec.png" type="image/x-icon">
		<link rel="icon" href="../assets/img/logo_seamolec.png" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">		
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="../assets/img/logo_seamolec.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="../assets/img/logo_seamolec.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="../assets/img/logo_seamolec.png" media="screen and (max-device-width: 320px)">

	</head>	
	<body class="">
		<header id="header">
			<div id="logo-group">
				<img src="../assets/img/logoseamolec.png" alt="" class="img img-responsive">
			</div>	
			<div class="pull-right">
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>				
								
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 							
						</a>						
					</li>
				</ul>				
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="logout.php" title="Sign Out" data-action="userLogout" data-logout-msg="Apakah yakin akan keluar?"><i class="fa fa-sign-out"></i></a> </span>
				</div>				
			</div>			
		</header>		
		<aside id="left-panel">
			<?php include 'menu.php';?>			
		</aside>						
		<div id="main" role="main">			
			<div id="ribbon">				
				<ol class="breadcrumb">
					<li>Home</li><li>Dashboard</li>
				</ol>				

			</div>			
			<!-- MAIN CONTENT -->
			<div id="content">
				<?php 
					$file = (isset($_REQUEST['page'])&& $_REQUEST['page'] !=NULL)?$_REQUEST['page']:'';
	                if(file_exists($file.".php"))
	                {
	                    include($file.".php");
	                }else{
	                    include("home.php");
	                }               
				?>
			</div>			

		</div>		
		
		<div class="page-footer">
			<?php include 'footer.php';?>
		</div>
		<?php include 'js.php';	?>
	</body>
</html>
<?php } ?>