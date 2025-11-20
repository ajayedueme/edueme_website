<?php 
include "../includes/session.php";
include "../includes/DB.php";

if(isset($_SESSION['admin_rquest_name']) || isset($_SESSION['admin_rquest_id'])){
	header("Location: menu.php");
	exit(); 
}else{
	
}  
if(isset($_POST['action']) && $_POST['action']=="login"){
	$username=htmlspecialchars(trim($_POST['txtemail']));
	$password=htmlspecialchars(trim($_POST['txtpassword']));
	
		
		$mjcetlogin = "Select * FROM tbl_mjcet_admin WHERE admin_email = '{$username}' OR admin_name = '{$username}'";
		$res_mjcetlogin = mysqli_query($con,$mjcetlogin);
		
		if(mysqli_num_rows($res_mjcetlogin)>0){
			$result_login = mysqli_fetch_object($res_mjcetlogin);
			$password_hash = $result_login->admin_password;

			if (password_verify($password, $password_hash)){
				 $_SESSION['admin_rquest_id'] = $result_login->admin_id;
				$_SESSION['admin_rquest_name'] = $result_login->admin_name;
				header("Location:menu.php");
				exit(); 
			}else {
				 $_SESSION['pwd'] = 2;
				header("Location:index.php");
				exit();
			}
		}else{
			$_SESSION['usr'] = 1;
			header("Location:index.php");
			exit();
		}

}else{
	
	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>EDUEME | Admin</title>

  <!-- ========== Css Files ========== -->
  <link href="css/root.css" rel="stylesheet">
  </head>
  <body style="background-color: #f5f5f5;">

    <div class="login-form">
      <form method="post" enctype="multipart/form-data" name="frmLogin" id="frmLogin" action="">
        <div class="top">
			<h1>Admin</h1>
        </div>
        <div class="form-area">
        <?php if(isset($_SESSION['usr']) && $_SESSION['usr'] !=''){
							echo "<p style='color:red'>This is an Invalid Email or Username.</p>";
						}
						if(isset($_SESSION['pwd']) && $_SESSION['pwd'] !=''){
							echo "<p style='color:red'>This is an Invalid Password.</p>";
						} 
						unset($_SESSION['usr']);
						unset($_SESSION['pwd']);
						?>
          <div class="group">
            <input type="text" name="txtemail" id="txtemail" class="form-control" placeholder="Username" required>
            <i class="fa fa-user"></i>
          </div>
          <div class="group">
            <input type="password" name="txtpassword" id="txtpassword" class="form-control" placeholder="Password" required>
            <i class="fa fa-key"></i>
          </div>
          <!--<div class="checkbox checkbox-primary">
            <input id="checkbox101" type="checkbox" checked>
            <label for="checkbox101"> Remember Me</label>
          </div>-->
          <input type="hidden" name="action" value="login">
          <button type="submit" class="btn btn-default btn-block">LOGIN</button>
        </div>
      </form>
      
      
    </div>

</body>
</html>