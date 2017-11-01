<?php
	include '../config/koneksi.php';	
	$id  = $conn->real_escape_string(htmlentities(htmlspecialchars($_GET['id'])));		
	$query = $conn->query("DELETE FROM t_user WHERE id='$id'");
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