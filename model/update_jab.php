<?php
	include "../config/config.php";
		$sql="UPDATE `tb_jabatan` SET
		`nama_jabatan` = '$_POST[nama_jab]',
		`kategori_jabatan` = '$_POST[kategori_jab]' WHERE `kode` =
		'$_POST[posisi]';";
	mysql_query($sql) or die("Gagal Memperbaharui");
	header ("location:../index.php?p=data_jab");
?>