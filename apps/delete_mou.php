<?php
	include '../config/koneksi.php';	
	$id  = $conn->real_escape_string(htmlentities(htmlspecialchars($_GET['id'])));

	$cek = $conn->query("SELECT * FROM t_mou INNER JOIN t_user on t_mou.id_user=t_user.id_user WHERE t_mou.id='$id' ORDER BY t_mou.id");
	$hasil = $cek->fetch_array();
	$file = $hasil['file'];
	$path = '../assets/doc/mou/';

	$sql = "DELETE FROM t_mou WHERE t_mou.id='$id' ";	
	//print_r($sql);
	$query = $conn->query($sql);

	if($query)	
	{		
		unlink($path.$file);		
		// print_r("data berhasil dihapus");
		print_r('<script>alert("Data Berhasil di Hapus!");
		                        window.location.href="?page=mou";
                 </script>');
	}
	else
	{
		print_r('<script>alert("Data Gagal di Hapus!");
                 </script>');	
	}
?>