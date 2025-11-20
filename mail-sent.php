<?php
include "includes/class.phpmailer.php";
include "includes/class.smtp.php";	


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action']=='contact'){
    
    $name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];

	$str1='<p> "From Edurme Contact Request ";
	<p>Name :'.$name.'</p>	
	<p>Email :'.$email.' </p>
	<p>Phone :'.$phone.' </p>
    <p>subject :'.$subject.' </p>
    <p>message :'.$message.' </p>

	Regards,
	Web Support </p>';
	
    $mails = new PHPMailer();
	$mails->IsMail();
	$mails->WordWrap = 50;
	$mails->IsHTML(true);
	$mails->From = $email ;
	$mails->FromName = $name;
	$mails->AddAddress("jagadeesh@eparivartan.com");	
	$mails->Subject = "Edurme";
	$mails->Body = $str1;
	if($mails->Send()){
		header("Location:contact.php?pageid=7");
		exit();
		
	}else{
		header("Location:index.php");
		exit();	
	
	}


} 



?>
