<?php

// konfigurasi database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_base = 'penggajian';

// koneksi database
mysql_connect($db_host, $db_user, $db_pass) or die('Tidak terhubung ke MySQL : ' . mysql_error());
mysql_select_db($db_base) or die('Tidak terhubung ke Database : ' . mysql_error());


?>
