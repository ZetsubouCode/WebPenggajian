<?php
	include "../config/config.php";
		$sql="UPDATE `t_tarif_staff` SET
		`bulan` = '$_POST[bulan]',
		`tahun` = '$_POST[tahun]',
		`gereja` = '$_POST[kontribusi]',
		`yci` = '$_POST[yci]' WHERE `id` =
		'$_POST[id]';";
	$data=mysql_query("SELECT * from t_tarif_staff where bulan ='$_POST[bulan]' and tahun='$_POST[tahun]' and nip='$_POST[nip]'");
	if(mysql_num_rows ( $data ) > 0){
		echo "<script type='text/javascript'>alert('Data sudah ada!');
		window.location.replace('../index.php?p=data_jabatanstaflainlain');
		</script>";
	}else{
	mysql_query($sql) or die("Gagal Memperbaharui");
	header ("location:../index.php?p=data_jabatanstaf");
}
?>