<?php  
	session_start();
	if(isset($_SESSION['level']))
	{
		session_destroy();
		header('Location:../index');
	}else{
		session_destroy();
		header('Location:../index');
	}
?>