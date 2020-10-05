<?php
	include "../config/config.php";
		$sql="UPDATE `tb_absensi_mentor` SET
		`jumlah_anak` = '$_POST[anak]',
		`kehadiran_anak` = '$_POST[kehadiran]',
		`j_kehadirananak` = '$_POST[bonus]',
		`j_kunjungan` = '$_POST[kunjungan]',
		`j_pertemuan` = '$_POST[pertemuan]',
		`lesson` = '$_POST[lesson]',
		`evaluasi` = '$_POST[evaluasi]',
		`inskeh` = '$_POST[inskeh]',
		`insfile` = '$_POST[insfile]'
		WHERE `id_absen` ='$_POST[id_gaji_lama]';";
	mysql_query($sql) or die("Gagal Memperbaharui");
	header ("location:../index.php?p=data_mentoring");
?>