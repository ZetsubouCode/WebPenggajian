<?php
	 include "../config/config.php";
	$sql="INSERT INTO `t_tarif_staff`(
	`tanggal_penggajian`,
	`bulan`,
	`tahun`,
	`nip`,
	`kontribusi_gereja`,
	`kontribusi_yci`
	)
	VALUES (CURDATE(),
			'$_POST[bulan]',
			'$_POST[tahun]',
			'$_POST[nip]',
			'$_POST[kontribusi]',
			'$_POST[yci]')";
	mysql_query($sql) or die("Gagal Menyimpan");
	header ("location:../index.php?p=data_jabatanstaflainlain");
?>