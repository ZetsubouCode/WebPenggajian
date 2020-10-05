<?php
	 include "../config/config.php";
	 $sql="SELECT *FROM view_gaji_mentor where nama_jabatan='$_POST[jabatan]' and bulan='$_POST[bulan]' and tahun='$_POST[tahun]'";
	 $cek=mysql_num_rows(mysql_query($sql));
	 $sqlsearch="SELECT am.id_absen FROM tb_absensi_mentor am join t_tarif_mentor m on (am.id_gaji=m.id) join tb_jabatan j on (m.id_jabatan=j.kode) where nama_jabatan='$_POST[jabatan]' and bulan='$_POST[bulan]' and tahun='$_POST[tahun]'";
	 $data=mysql_fetch_assoc(mysql_query($sqlsearch));
	 if ($cek>0) {
	 	?>
	 	<script type="text/javascript">
	 	alert('Gaji pada bulan ini telah di input!');
	 	window.location.href="../index.php?p=data_tarifjabatan";
	 	</script>
	 	<?php
	 }else{
		$sql="INSERT INTO `t_penggajian`(
		`tanggal_penggajian`,
		`slip_mentor`)
		VALUES (CURDATE(),'$data[id_absen]')";
		mysql_query($sql) or die("Gagal Menyimpan");
		header ("location:../index.php?p=data_tarifjabatan");
	 }
?>