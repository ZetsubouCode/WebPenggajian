

<?php
	 include "../config/config.php";
	 $sql="SELECT *FROM t_penggajian pg join t_tarif_staff s on (pg.slip_staff=s.id) where nip='$_POST[nip]' and bulan='$_POST[bulan]' and tahun='$_POST[tahun]'";
	 $cek=mysql_num_rows(mysql_query($sql));
	 $sqlsearch="SELECT id FROM t_tarif_staff s where nip='$_POST[nip]' and bulan='$_POST[bulan]' and tahun='$_POST[tahun]'";
	 $data=mysql_fetch_assoc(mysql_query($sqlsearch));
	 if ($cek>0) {
	 	?>
	 	<script type="text/javascript">
	 	alert('Gaji pada bulan ini telah di input!');
	 	window.location.href="../index.php?p=data_gaji";
	 	</script>
	 	<?php
	 }else{
		$sql="INSERT INTO `t_penggajian`(
		`tanggal_penggajian`,
		`slip_staff`)
		VALUES (CURDATE(),'$data[id]')";
		mysql_query($sql) or die("Gagal Menyimpan");
		header ("location:../index.php?p=data_gaji");
	 	
	 }
?>