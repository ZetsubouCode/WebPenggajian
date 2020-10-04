<?php
error_log("script was called, processing request...");
include "../config/config.php";
$id=$_POST['uid'];

$sql="DELETE FROM `t_penggajian` WHERE `no_penggajian` ='$id'";
$sqlsearch=mysql_query("SELECT slip_staff from t_penggajian where no_penggajian=$id");
$result=mysql_fetch_assoc($sqlsearch);
$sql="DELETE FROM `t_tarif_staff` WHERE `id` ='$result[slip_staff]'";
if(mysql_query($sql) && mysql_query($sql2)){
	$data['say'] = "ok";
}else{
	$data['say'] = "NotOk";
}

if('IS_AJAX'){
    echo json_encode($data); //echo json string if ajax request
}
?>