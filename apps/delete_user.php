<?php
	include '../config/koneksi.php';	
	$id_user  = $conn->real_escape_string(htmlentities(htmlspecialchars($_GET['id_user'])));		
	$query = $conn->query("DELETE FROM t_user WHERE id_user='$id_user'");
	echo ('<script>alert("Data Berhasil di Hapus!");
					 document.location.href=?page=user;
			</script>');
	// if($query)
	// {		
	// 	print_r('<script>
	// 				alert("Data Berhasil di Hapus!");
	// 				document.location.href=?page=user;
	// 		  </script>');
	// }
	// else 
	// {
	// 	print_r('<script>
	// 			alert("Data gagal di Hapus!");
	// 			document.location.href=?page=user;
	// 		  </script>');
	// }


?>