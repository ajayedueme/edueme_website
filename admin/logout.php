<?php 
include "../includes/session.php";

	unset($_SESSION['admin_rquest_name']);
	unset($_SESSION['admin_rquest_id']);
	header('Location:index.php?msg=2');
	exit();
?>