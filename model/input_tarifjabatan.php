<?php
	 include "../config/config.php";
	$sql="INSERT INTO `t_jabatan`(
	`nama_jab`,
	`posisi_jab`
	)
	VALUES ('$_POST[nama_jab]',
			'$_POST[posisi_jab]')";
	mysql_query($sql) or die("Gagal Menyimpan");
	header ("location:../index.php?p=data_tarifjabatan");
?>