<?php
	 include "../config/config.php";

	if(isset($_POST['posisi'])){
		if($_POST['posisi']!="1"){
			$posisi=$_POST['posisi'];
		} else{
		?>
		<script type="text/javascript">
	 	alert('Harap pilih opsi dengan benar!');
	 	window.location.href="../index.php?p=data_jab";
	 	</script>
		 <?php
		}
	} else{?>
		
		<script type="text/javascript">
	 	alert('Belum memilih posisi pelayanan!');
	 	window.location.href="../index.php?p=data_jab";
	 	</script>
		 <?php
	}
	$sql="INSERT INTO `tb_jabatan`(
	`nama_jabatan`,
	`kategori_jabatan`
	)
	VALUES (
			'$_POST[nama_jab]',
			'$_POST[posisi]')";
	mysql_query($sql) or die("Gagal Menyimpan");
	header ("location:../index.php?p=data_jab");
?>