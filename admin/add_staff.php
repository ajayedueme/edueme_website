<?php 
include "../includes/session.php";
include "../includes/DB.php";

if(!isset($_SESSION['admin_rquest_name']) || !isset($_SESSION['admin_rquest_id'])){
	header("Location: index.php");
	exit(); 
}else{ }  



if(isset($_POST['ADD']) && $_POST['ADD'] =='category'){
		
	$department = htmlspecialchars(addslashes($_POST['department']));
	$txtFname = htmlspecialchars(addslashes($_POST['txtFname']));
	$txtUname = htmlspecialchars(addslashes($_POST['txtUname']));
	$txtEmail = htmlspecialchars(addslashes($_POST['txtEmail']));
	$txtdesignation = htmlspecialchars(addslashes($_POST['txtdesignation']));
	$txtOrder = htmlspecialchars(addslashes($_POST['txtOrder']));
	$txtPWD = $_POST['txtPWD'];
		
	if($_FILES['txtImage']['name'] !=""){
		$thumbfile1= time().$_FILES['txtImage']['name'];
		$imagename1= $_FILES['txtImage']['name'];
		$tempimagename1= $_FILES['txtImage']['tmp_name'];
		move_uploaded_file($tempimagename1,'../faculty-img-doc/'.time().$imagename1);
	}else{
		$thumbfile1="";
	}
	if($_FILES['txtDocument']['name'] !=""){
		$thumbfile2= time().$_FILES['txtDocument']['name'];
		$imagename2= $_FILES['txtDocument']['name'];
		$tempimagename2= $_FILES['txtDocument']['tmp_name'];
		move_uploaded_file($tempimagename2,'../faculty-img-doc/'.time().$imagename2);
	}else{
		$thumbfile2="";
	}
	$sqladd = "INSERT INTO `userlogin`(`UserName`, `Password`, `FullName`, `EmailAddress`, `AccessLevel`, `Dept`, `ChangePwd`, `UpdateProfile`, `profileImg`, `designation`, `resume`, `stafforder`, `status`) VALUES ('{$txtUname}', '{$txtPWD}', '{$txtFname}', '{$txtEmail}', '1', '{$department}', '0', '0', '{$thumbfile1}', '{$txtdesignation}', '{$thumbfile2}', '{$txtOrder}', '1')";
	$res_add =  mysqli_query($con,$sqladd);
	
	header('Location:staff_list.php?msg=4');
	exit();
	
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
  <title>MJCET | Admin</title>

  <!-- ========== Css Files ========== -->
  <link href="css/root.css" rel="stylesheet">

	
  </head>
  <body>
  <!-- Start Page Loading -->
  <div class="loading"><img src="img/loading.gif" alt="loading-img"></div>
  <!-- End Page Loading -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
  <!-- START TOP -->
  <?php include 'topmenu.php';?>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEBAR -->
<?php include 'sidemenu.php'; ?>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Add Section</h1>
      <ol class="breadcrumb">
	  <li><a href="sections.php">Section List</a></li>
        <li class="active">Add Section</li>
    </ol>


  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-widget">

  <!-- Start Top Stats -->
  <div class="col-md-12">
 <div class="col-md-12 col-lg-6">
      <div class="panel panel-default">  <br>
  <div class="panel-body">
	   
				<form name="frmChangepassword" id="frmChangepassword" enctype="multipart/form-data"  action="" method="POST">
					
					<div class="form-group">
						<label for="input1" class="form-label">Department: </label>
						<select class="form-control" name="department" id="department">
							<option value="">Select</option>
							<?php
								$dept = mysqli_query($con,"SELECT * FROM departments");
								while($res_dept =  mysqli_fetch_object($dept)){
							?>
									<option value="<?php echo $res_dept->DeptCode ?>" ><?php echo $res_dept->DeptCode;?></option>
							<?php	}  ?>
						</select>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Full Name: </label>
						<input type="text" class="form-control" name="txtFname" id="txtUname" required value="<?php echo $result->FullName?>">
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">User Name: </label>
						<input type="text" class="form-control" name="txtUname" id="txtUname" required value="<?php echo $result->UserName?>">
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Password: </label>
						<input type="text" class="form-control" name="txtPWD" id="txtPWD" required value="<?php echo $result->UserName?>">
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Email: </label>
						<input type="text" class="form-control" name="txtEmail" id="txtEmail" required value="<?php echo $result->UserName?>">
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Image: </label>
						<input type="file" class="form-control" name="txtImage" id="txtImage" required >
						<a href='../faculty-img-doc/<?php echo $result->profileImg?>'><?php echo $result->profileImg?></a>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Designation: </label>
						<input type="text" class="form-control" name="txtdesignation" id="txtdesignation" value="<?php echo $result->designation?>">
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Document: </label>
						<input type="file" class="form-control" name="txtDocument" id="txtDocument" >
						<a href='../faculty-img-doc/<?php echo $result->resume?>'><?php echo $result->resume?></a>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Order: </label>
						<input type="text" class="form-control" name="txtOrder" id="txtOrder" value="<?php echo $result->stafforder?>">
					</div>
					<input type="hidden" name="ADD" value="category">
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
            </div>
            
            <br><br><br>
  </div>
  <!-- End Top Stats -->


  
</div>
</div>

</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<!-- Start Footer -->
<?php include 'footer.php'; ?>
<!-- End Footer -->


</div>

<script src="js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="js/bootstrap/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script src="js/plugins.js"></script>

<!-- ================================================
Bootstrap WYSIHTML5
================================================ -->
<!-- main file -->
<script src="js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script>
<!-- bootstrap file -->
<script src="js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<!-- ================================================
elm1
================================================ -->
<script src="js/elm1/elm1.min.js"></script>

<script src="plugins/tinymce/tinymce.min.js"></script>
	<script>
        $(document).ready(function() {
            if ($("#elm1").length > 0) {
                tinymce.init({
                    selector: "textarea#elm1",
                    theme: "modern",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [{
                        title: 'Bold text',
                        inline: 'b'
                    }, {
                        title: 'Red text',
                        inline: 'span',
                        styles: {
                            color: '#ff0000'
                        }
                    }, {
                        title: 'Red header',
                        block: 'h1',
                        styles: {
                            color: '#ff0000'
                        }
                    }, {
                        title: 'Example 1',
                        inline: 'span',
                        classes: 'example1'
                    }, {
                        title: 'Example 2',
                        inline: 'span',
                        classes: 'example2'
                    }, {
                        title: 'Table styles'
                    }, {
                        title: 'Table row 1',
                        selector: 'tr',
                        classes: 'tablerow1'
                    }]
                });
            }
        });




$('#txtbranch').change(function(){
	var branchid = (this.value);
	$.ajax({
		url:'ajax.php',
		type:'post',
		data:{'action':"BranchYear",'bid':branchid},
		success:function(data){
			$("#txtbranchyear").html(data);
		}
	}); 
});


</script>

</body>
</html>