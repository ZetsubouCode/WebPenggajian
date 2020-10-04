<?php
	include "../config/config.php";
		$sql="UPDATE `t_tarif_staff` SET
		`bulan` = '$_POST[bulan]',
		`tahun` = '$_POST[tahun]',
		`gereja` = '$_POST[kontribusi]',
		`yci` = '$_POST[yci]' WHERE `id` =
		'$_POST[id]';";
	mysql_query($sql) or die("Gagal Memperbaharui");
	header ("location:../index.php?p=data_jabatanstaf");
?>