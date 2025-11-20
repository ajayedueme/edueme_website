<?php
	include "../includes/session.php";
	include "../includes/DB.php";
	
	
	if($_POST['action'] == 'pagelink'){
		$id = $_POST['id'];
		$getpagecheckvalue = $_POST['getpagecheckvalue'];


	mysqli_query($con,"UPDATE `tbl_main_menu` SET `pageCheck`='{$getpagecheckvalue}' WHERE menuId = '{$id}'");

		echo "suc";
	}

	if($_POST['action'] == 'headerlink'){
		$id = $_POST['id'];
		$getheadercheckvalue = $_POST['getheadercheckvalue'];


	mysqli_query($con,"UPDATE `tbl_main_menu` SET `menu_display_header`='{$getheadercheckvalue}' WHERE menuId = '{$id}'");

		echo "suc";
	}

	if($_POST['action'] == 'footerlink'){
		$id = $_POST['id'];
		$getfootercheckvalue = $_POST['getfootercheckvalue'];


	mysqli_query($con,"UPDATE `tbl_main_menu` SET `menu_display_footer`='{$getfootercheckvalue}' WHERE menuId = '{$id}'");

		echo "suc";
	}

	if($_POST['action'] == 'popular'){
		$id = $_POST['id'];
		$getpopcheckvalue = $_POST['getpopcheckvalue'];


	mysqli_query($con,"UPDATE `tbl_courses` SET `popular`='{$getpopcheckvalue}' WHERE course_id = '{$id}'");

		echo "suc";
	}

	// if($_GET['action'] == 'MenuUpdate'){
	// 	$id = $_GET['id'];
	// 	$url = $_GET['url'];
	// 	mysqli_query($con,"UPDATE `tbl_mjcet_megha_menu_dept_section` SET `menuDocument`='' WHERE tlmid = '{$dltval}'");
	// 	if($url == 'd'){
	// 		header("Location:edit_dept_menu.php?eid=$url");
	// 	}
	// }
	// if($_GET['action'] == 'GalCat'){
	// 	$url = $_GET['url'];
	// 	$id = $_GET['id'];
		
	// 	echo "UPDATE `tbl_mjcet_announcements` SET `pubDocument`='' WHERE pubId = '{$id}'";
		
	// 	mysqli_query($con,"UPDATE `tbl_mjcet_announcements` SET `pubDocument`='' WHERE pubId = '{$id}'");
	// 	if($url == 'd'){
	// 		header("Location:edit_announce.php?eid=$id");
	// 	}
	// }
		
	
?>  