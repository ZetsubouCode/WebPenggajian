<?php
include "config/config.php";

$tampil=mysql_query("SELECT * from t_penggajian pg join t_pegawai p on (pg.nip=p.nip) join tb_jabatan j on (j.kode=p.id_jabatan) WHERE pg.nip='$_POST[nip]' and pg.bulan='$_POST[bulan]' AND pg.tahun='$_POST[tahun]'");
$data=mysql_fetch_array($tampil);

$pegawai['nama_pegawai']=$data['nama_pegawai'];
$pegawai['nama_jabatan']=$data['nama_jabatan'];
$pegawai['gaji_kontribusi']=$data['kontribusi_gereja'];
$pegawai['gaji_yci']=$data['kontribusi_yci'];
$pegawai['bulan']=$data['bulan'];
$pegawai['tahun']=$data['tahun'];
header('Content-Type: application/json');
echo json_encode($pegawai);
?>
