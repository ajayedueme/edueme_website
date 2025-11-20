<?php 
include "../includes/session.php";
include "../includes/DB.php";

if(!isset($_SESSION['admin_rquest_name']) || !isset($_SESSION['admin_rquest_id'])){
	header("Location: index.php");
	exit(); 
}else{ }  

if(isset($_POST['edit']) && $_POST['edit'] =='editBlock'){
	

	

	$txtAbout = htmlspecialchars(addslashes($_POST['txtAbout']));
	$order = htmlspecialchars(addslashes($_POST['order']));
    $editid = htmlspecialchars(addslashes($_POST['editid']));
    $cid = htmlspecialchars(addslashes($_POST['cid']));
	

	
	$sqlupdate = "UPDATE `tbl_courses_details` SET  `block_content`='{$txtAbout}',`block_order`='{$order}'WHERE id = '{$editid}' AND courses_id='{$cid}'";
	
  


	$res_add =  mysqli_query($con,$sqlupdate);
	
	
	header("Location:courses_details_add.php?id=$cid&type=Update");
	exit();
	
}else{
    //DELETE
    if(isset($_GET['type']) && $_GET['type'] =='delete'){
        $did =  htmlspecialchars($_GET['did']);
        $cid =  htmlspecialchars($_GET['cid']);
        $sqlDelete =  "DELETE FROM `tbl_courses_details` WHERE id=$did AND courses_id=$cid";
       
         mysqli_query($con,$sqlDelete);
         header("Location:courses_details_add.php?id=$cid&type=Delete");
	    exit();
    }


}
?>