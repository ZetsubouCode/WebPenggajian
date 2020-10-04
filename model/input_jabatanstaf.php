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
	$data=mysql_query("SELECT * from t_tarif_staff where bulan ='$_POST[bulan]' and tahun='$_POST[tahun]' and nip='$_POST[nip]'");
	if(mysql_num_rows ( $data ) > 0){
		echo "<script type='text/javascript'>alert('Data sudah ada!');
		window.location.replace('../index.php?p=data_jabatanstaf');
		</script>";
	}else{
	mysql_query($sql) or die("Gagal Menyimpan slip");
	header ("location:../index.php?p=data_jabatanstaf");
	}
	
?>