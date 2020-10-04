<?php
	 include "../config/config.php";
	 $sql="SELECT *FROM tb_pengguna where username='$_POST[username]' and nip='$_POST[nip]'";
	 $cek=mysql_num_rows(mysql_query($sql));
	 if ($cek>0) {
	 	?>
	 	<script type="text/javascript">
	 	alert('NIP / username telah digunakan!');
	 	window.location.href="../index.php?p=data_pengguna";
	 	</script>
	 	<?php
	 }else{
					$sql="INSERT INTO `tb_pengguna`(`username`, `password`, `level`, `imagefile`, `nip`)
					VALUES ('".$_POST['username']."','".md5($_POST['pass'])."','".$_POST['levelz']."','default.jpg','".$_POST['nip']."')";
					mysql_query($sql) or die("Data sudah ada!");
					header ("location:../index.php?p=data_user");
				}
	 
	 

?>