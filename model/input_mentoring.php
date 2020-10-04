<?php
	 include "../config/config.php";
	 $dataJson=json_decode($_POST['kode_jabatan']);
	
	
	$sql="INSERT INTO `t_pk`(
	
	`kode_jabatan`,
	`jumlah_anak`,
	`kehadiran_anak`,
	`j_kehadirananak`,
	`j_kunjungan`,
	`j_pertemuan`,
	`lesson`,
	`id_gaji`
	)
	VALUES (
			'$dataJson->id',
			'$_POST[anak]',
			'$_POST[kehadiran]',
			'$_POST[bonus]',
			'$_POST[kunjungan]',
			'$_POST[pertemuan]',
			'$_POST[lesson]',
			'$dataJson->nama')";
	mysql_query($sql) or die("Gagal Menyimpan");
	header ("location:../index.php?p=data_mentoring");
?>