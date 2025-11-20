<?php
	include "../includes/session.php";
	include "../includes/DB.php";
	
	
	if($_POST['action'] == 'Delete'){
		$dltid = $_POST['dltid'];
		$dltval = $_POST['dltval'];
		$tblname = $_POST['tblname'];

		$SQL = "DELETE FROM {$tblname} WHERE {$dltid} = '{$dltval}'";
		$result = mysqli_query($con,$SQL);
		echo "suc";
	}
	if($_GET['action'] == 'MenuUpdate'){
		$id = $_GET['id'];
		$url = $_GET['url'];
		mysqli_query($con,"UPDATE `tbl_mjcet_megha_menu_dept_section` SET `menuDocument`='' WHERE tlmid = '{$dltval}'");
		if($url == 'd'){
			header("Location:edit_dept_menu.php?eid=$url");
		}
	}
	if($_GET['action'] == 'GalCat'){
		$url = $_GET['url'];
		$id = $_GET['id'];
		
		echo "UPDATE `tbl_mjcet_announcements` SET `pubDocument`='' WHERE pubId = '{$id}'";
		
		mysqli_query($con,"UPDATE `tbl_mjcet_announcements` SET `pubDocument`='' WHERE pubId = '{$id}'");
		if($url == 'd'){
			header("Location:edit_announce.php?eid=$id");
		}
	}
		
	
?>  