<?php
	 include "../config/config.php";
	$sql="INSERT INTO `t_tarif_staff`(
	`bulan`,
	`tahun`,
	`nip`,
	`gereja`,
	`yci`
	)
	VALUES (
			'$_POST[bulan]',
			'$_POST[tahun]',
			'$_POST[nip]',
			'$_POST[kontribusi]',
			'$_POST[yci]')";
	$sqlsearch=mysql_query("SELECT id from t_tarif_staff where bulan = '$_POST[bulan]' AND tahun = '$_POST[tahun]' AND nip = '$_POST[nip]'");
	$result=mysql_fetch_assoc($sqlsearch);
	$sql2="INSERT INTO `t_penggajian`(
		`tanggal_penggajian`,
		`slip_staff`
		)
		VALUES (CURDATE(),
		$result[id])";
	mysql_query($sql) or die("Gagal Menyimpan slip");
	mysql_query($sql2) or die("Gagal Menyimpan");
	header ("location:../index.php?p=data_jabatanstaf");
?>