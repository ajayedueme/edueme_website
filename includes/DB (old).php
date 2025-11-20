<?php
// local server details	

	/* $dbhost 	= 	"localhost";
	$dbuname	=	"mjcollegeac_newU5er";
	$dbpwd		=	"MjC0l!@9E";
	$dbname		=	"mjcet_database"; */
	
	$dbhost 	= 	"localhost";
	$dbuname	=	"edueme_user";
	$dbpwd		=	"ep@ap_345";
	$dbname		=	"db_eduemeresearchlabs";
	$con = mysqli_connect($dbhost,$dbuname,$dbpwd,$dbname);
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}/*else{
		echo 'Connection Established';
	}*/
		
	

	
?>