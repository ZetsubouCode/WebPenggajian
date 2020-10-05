<?php
	 include "../config/config.php";
	$sql="INSERT INTO `t_tarif_mentor`(
	`gaji`,
	`bonus`,
	`kunjungan`,
	`tutorial`,
	`lesson`,
	`evaluasi`,
	`inskeh`,
	`insfile`,
	`id_jabatan`
	)
	VALUES (
			'$_POST[gapok]',
			'$_POST[bonus]',
			'$_POST[kunjungan]',
			'$_POST[tutorial]',
			'$_POST[lesson]',
			'$_POST[evaluasi]',
			'$_POST[inskeh]',
			'$_POST[insfile]',
			'$_POST[jabatan]');";

	mysql_query($sql) or die("Gagal Menyimpan");
	header ("location:../index.php?p=data_jabatan");
?>