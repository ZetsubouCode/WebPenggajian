<?php
error_log("script was called, processing request...");
include "../config/config.php";
$id=$_POST['uid'];
$sql="DELETE FROM `tb_absensi_mentor` WHERE `id_absen` ='$id'";
if(mysql_query($sql)){
	$data['say'] = "ok";
}else{
	$data['say'] = "NotOk";
}

if('IS_AJAX'){
    echo json_encode($data); //echo json string if ajax request
}
?>