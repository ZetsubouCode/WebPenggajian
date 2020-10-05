<?php
include "config/config.php";

$tampil=mysql_query("SELECT * from t_penggajian pg join t_tarif_staff s on (pg.slip_staff=s.id) join t_pegawai p on (s.nip=p.nip) join tb_jabatan j on (j.kode=p.id_jabatan) WHERE s.nip='$_POST[nip]' and s.bulan='$_POST[bulan]' AND s.tahun='$_POST[tahun]'");
$data=mysql_fetch_array($tampil);

$pegawai['nama_pegawai']=$data['nama_pegawai'];
$pegawai['nama_jabatan']=$data['nama_jabatan'];
$pegawai['gaji_kontribusi']=$data['gereja'];
$pegawai['gaji_yci']=$data['yci'];
$pegawai['bulan']=$data['bulan'];
$pegawai['tahun']=$data['tahun'];
header('Content-Type: application/json');
echo json_encode($pegawai);
?>
