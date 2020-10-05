<?php
include "config/config.php";
$tampil=mysql_query("SELECT nama_pegawai,gaji,bonus,kunjungan,tutorial,m.lesson,m.evaluasi,m.inskeh,m.insfile
                     from tb_absensi_mentor am join t_tarif_mentor m on (am.id_gaji=m.id) join t_pegawai p on (am.nip=p.nip) join tb_jabatan j on (j.kode=p.id_jabatan) 
                     where bulan='$_POST[bulan]' and tahun='$_POST[tahun]' and nama_jabatan='$_POST[jab]'");
$data=mysql_fetch_array($tampil);

$pegawai['nama']=$data['nama_pegawai'];
$pegawai['mentoring']=$data['gaji'];
$pegawai['bonus']=$data['bonus'];
$pegawai['kunjungan']=$data['kunjungan'];
$pegawai['tutorial']=$data['tutorial'];
$pegawai['lesson']=$data['lesson'];
$pegawai['evaluasi']=$data['evaluasi'];
$pegawai['inskeh']=$data['inskeh'];
$pegawai['insfile']=$data['insfile'];
header('Content-Type: application/json');
echo json_encode($pegawai);
?>
