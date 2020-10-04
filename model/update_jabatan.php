<?php
	include "../config/config.php";
		$sql="UPDATE `t_tarif_mentor` SET
		`gaji` = '$_POST[gapok]',
		`bonus` = '$_POST[tunjangan]',
		`kunjungan` = '$_POST[kunjungan]',
		`tutorial` = '$_POST[tutorial]',
		`lesson` = '$_POST[lesson]',
		`evaluasi` = '$_POST[evaluasi]',
		`inskeh` = '$_POST[inskeh]',
		`insfile` = '$_POST[insfile]'
		WHERE `id` ='$_POST[id_gaji_lama]';";
	mysql_query($sql) or die("Gagal Memperbaharui");
	header ("location:../index.php?p=data_jabatan");
?>