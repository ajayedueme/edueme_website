<?php 
include "../includes/session.php";
include "../includes/DB.php";

//update
$status=$_POST['status'];
$id=$_POST['id'];
$actionupdate=$_POST['actions'];
$tablename_u=$_POST['tablename_status'];
$idname_u=$_POST['idname_u'];
$status_name=$_POST['status_name'];
if($actionupdate == 'update'){
echo $upadtecommentstatus= "UPDATE {$tablename_u} SET {$status_name}='{$status}' WHERE {$idname_u}='{$id}'";
mysqli_query($con,$upadtecommentstatus);
echo "update";
}else{
	
}



?>