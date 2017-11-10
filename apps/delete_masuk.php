<?php
	include '../config/koneksi.php';	
	$id  = $conn->real_escape_string(htmlentities(htmlspecialchars($_GET['id'])));

	$cek = $conn->query("SELECT * FROM t_masuk INNER JOIN t_user on t_masuk.id_user=t_user.id_user WHERE t_masuk.id='$id' ORDER BY t_masuk.id");
	$hasil = $cek->fetch_array();
	$file = $hasil['file'];
	$path = '../assets/doc/suratmasuk/';

	$sql = "DELETE FROM t_masuk WHERE t_masuk.id='$id' ";		
	$query = $conn->query($sql);

	if($query)	
	{		
		unlink($path.$file);		
		// print_r("data berhasil dihapus");
		print_r('<script>alert("Data Berhasil di Hapus!");
		                        window.location.href="?page=surat_masuk";
                 </script>');
	}
	else
	{
		print_r('<script>alert("Data Gagal di Hapus!");
                 </script>');	
	}
?>