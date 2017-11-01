<?php
	include '../config/koneksi.php';	
	$id  = $conn->real_escape_string(htmlentities(htmlspecialchars($_GET['id'])));

	$cek = $conn->query("SELECT * FROM t_moa INNER JOIN t_user on t_moa.id_user=t_user.id_user WHERE t_moa.id='$id' ORDER BY t_moa.id");
	$hasil = $cek->fetch_array();
	$file = $hasil['file'];
	$path = '../assets/doc/moa/';

	$sql = "DELETE FROM t_moa WHERE t_moa.id='$id' ";	
	//print_r($sql);
	$query = $conn->query($sql);

	if($query)	
	{		
		unlink($path.$file);		
		// print_r("data berhasil dihapus");
		print_r('<script>alert("Data Berhasil di Hapus!");
		                        window.location.href="?page=moa";
                 </script>');
	}
	else
	{
		print_r('<script>alert("Data Gagal di Hapus!");
                 </script>');	
	}
?>