<?php
	include "../config/config.php";
		$sql="UPDATE `t_pk` SET
		`jumlah_anak` = '$_POST[anak]',
		`kehadiran_anak` = '$_POST[kehadiran]',
		`j_kehadirananak` = '$_POST[bonus]',
		`j_kunjungan` = '$_POST[kunjungan]',
		`j_pertemuan` = '$_POST[pertemuan]',
		`lesson` = '$_POST[lesson]'
		
		WHERE `id` ='$_POST[id_gaji_lama]';";
	mysql_query($sql) or die("Gagal Memperbaharui");
	header ("location:../index.php?p=data_mentoring");
?>