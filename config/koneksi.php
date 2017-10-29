<?php
	date_default_timezone_set("Asia/Jakarta");

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "persuratan";

	$conn = mysqli_connect($host,$user,$pass,$db);
	if(!$conn)
	{
		print_r("failed") or die();
	}	
?>