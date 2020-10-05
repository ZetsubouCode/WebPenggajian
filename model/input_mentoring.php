<?php
	 include "../config/config.php";

	$data=mysql_query("SELECT * from t_tarif_mentor where id_jabatan='$_POST[jabatan]'");
	$result=mysql_fetch_assoc($data);
	$sql="INSERT INTO `tb_absensi_mentor`(
	
	`bulan`,
	`tahun`,
	`jumlah_anak`,
	`kehadiran_anak`,
	`j_kehadirananak`,
	`j_kunjungan`,
	`j_pertemuan`,
	`lesson`,
	 `evaluasi`,
	 `inskeh`,
	 `insfile`,
	`id_gaji`,
	`nip`
	)
	VALUES (
			'$_POST[bulan]',
			'$_POST[tahun]',
			'$_POST[anak]',
			'$_POST[kehadiran]',
			'$_POST[bonus]',
			'$_POST[kunjungan]',
			'$_POST[pertemuan]',
			'$_POST[lesson]',
			'$_POST[evaluasi]',
			'$_POST[inskeh]',
			'$_POST[insfile]',
			'$result[id]',
			'$_POST[nip]')";
		
	mysql_query($sql) or die("Gagal Menyimpan");
	header ("location:../index.php?p=data_mentoring");
?>