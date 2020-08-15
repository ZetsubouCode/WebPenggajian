
<?php
	include "../config/config.php";
// Fungsi SQL Injection
	function antiinjection($data){
	 $filter_sql =
	mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars
	($data,ENT_QUOTES))));
	 return $filter_sql;
	}
	
if($_POST['username']!="" && $_POST['password']!=""){
	if(isset($_SESSION["wrong"])){
	unset($_SESSION["wrong"]);
	}
	$username = antiinjection($_POST['username']);
	$password = antiinjection(md5($_POST['password']));
	$sql="SELECT * FROM view_pengguna WHERE username='$username' AND password='$password' ";
	$tampil=mysql_query($sql);
	$jumlah=mysql_num_rows($tampil);
	$data=mysql_fetch_array($tampil);
	if ($jumlah > 0){
	 session_start();
	// Inisialisasi data pada session
	$_SESSION[nip] = $data['nip'];
	$_SESSION[username] = $data['username'];
	$_SESSION[password] = $data['password'];
	$_SESSION[level] = $data['level'];
	$_SESSION[nama_pegawai] = $data['nama_pegawai'];
	$_SESSION[imagefile] = $data['imagefile'];
	header('location:../index.php');
	}
	// Apabila login gagal
	else{
	 
	 echo "<script>alert('Login Gagal, username atau password tidak cocok'); window.location = '../index.php'</script>";
	}
} else {
	$_SESSION["wrong"]="Masukkan data lengkap untuk login!";
	$msg=$_SESSION["wrong"];
	echo "<script>alert('$msg'); window.location = '../index.php'</script>";
}
?>