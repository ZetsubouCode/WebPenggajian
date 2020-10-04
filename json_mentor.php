<?php
include "config/config.php";
$tampil=mysql_query("select * from view_gaji_mentor where Bulan='$_POST[bulan]' and Tahun='$_POST[tahun]' and jabatan='$_POST[jab]'");
$data=mysql_fetch_array($tampil);
$pegawai['nama']=$data['Nama Pegawai'];
$pegawai['mentoring']=$data['Gaji Pokok'];
$pegawai['kehadiran']=$data['<80%'];
$pegawai['kunjungan']=$data['Kunjungan'];
$pegawai['tutorial']=$data['Tutorial'];
$pegawai['lesson']=$data['Lesson Plan'];
$pegawai['eva']=$data['Evaluasi Kinerja'];
$pegawai['inskeh']=$data['Intensif Kehadiran'];
$pegawai['insfile']=$data['Intensif File Data'];
header('Content-Type: application/json');
echo json_encode($pegawai);
?>
