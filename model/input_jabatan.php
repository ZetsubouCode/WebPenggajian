<?php
	 include "../config/config.php";
	$sql="INSERT INTO `t_tarif_mentor`(
	`id_gaji`,
	`gaji`,
	`bonus`,
	`kunjungan`,
	`tutorial`,
	`lesson`,
	`evaluasi`,
	`intkeh`,
	`intfid`
	)
	VALUES ('$_POST[id_gaji]',
			'$_POST[gapok]',
			'$_POST[bonus]',
			'$_POST[kunjungan]',
			'$_POST[tutorial]',
			'$_POST[lesson]',
			'$_POST[evaluasi]',
			'$_POST[inskeh]',
			'$_POST[insfile]')";
	mysql_query($sql) or die("Gagal Menyimpan");
	header ("location:../index.php?p=data_jabatan");
?>