<?php

	function viewSurat()
	{
		global $conn;

		$query = $conn->query("SELECT COUNT(*) FROM t_surat_keluar ORDER BY id");
		$row = $query->fetch_array();
		echo $row[0];
	}

	function viewMou()
	{
		global $conn;

		$query = $conn->query("SELECT COUNT(*) FROM t_mou ORDER BY id");
		$row = $query->fetch_array();
		echo $row[0];
	}

	function viewMoa()
	{
		global $conn;

		$query = $conn->query("SELECT COUNT(*) FROM t_moa ORDER BY id");
		$row = $query->fetch_array();
		echo $row[0];
	}

	function viewUser()
	{
		global $conn;

		$query = $conn->query("SELECT COUNT(*) FROM t_userw ORDER BY id");
		$row = $query->fetch_array();
		echo $row[0];
	}

	function viewPostAdmin($id_user)
	{
		global $conn;

		$query = $conn->query("SELECT COUNT(*) FROM t_surat_keluar where id_user='id_user' ORDER BY id");
		$row = $query->fetch_array();
		echo $row[0];
	}	

?>