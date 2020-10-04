<?php
	include "../config/config.php";
	$pass=md5($_POST[pass]);
		$sql="UPDATE `tb_pengguna` SET
		`username` = '$_POST[username]',
		`password` = '$pass',
		`level` = '$_POST[levelz]',
		`nip`=$_POST[nip]
		 WHERE `username` =
		'$_POST[hiddenusername]';";
	mysql_query($sql) or die("Gagal Memperbaharui");
	header ("location:../index.php?p=data_user");
?>