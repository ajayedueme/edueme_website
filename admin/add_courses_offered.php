<?php 
include "../includes/session.php";
include "../includes/DB.php";

if(!isset($_SESSION['admin_rquest_name']) || !isset($_SESSION['admin_rquest_id'])){
	header("Location: index.php");
	exit(); 
}else{ }  



if(isset($_POST['ADD']) && $_POST['ADD'] =='category'){
	
	$txtDeptcat = htmlspecialchars(addslashes($_POST['txtDeptcat']));
	$txtName = htmlspecialchars(addslashes($_POST['txtName']));
	$txtOrder = htmlspecialchars(addslashes($_POST['txtOrder']));
	$txturl = htmlspecialchars(addslashes($_POST['txturl']));
	
	
	if($_FILES['txtThumb']['name'] !=""){
		$thumbfile1= time().$_FILES['txtThumb']['name'];
		$imagename1= $_FILES['txtThumb']['name'];
		$tempimagename1= $_FILES['txtThumb']['tmp_name'];
		move_uploaded_file($tempimagename1,'../uploades/'.time().$imagename1);
	}else{
		$thumbfile1="";
	}
		
	$sqladd = "INSERT INTO `tbl_mjcet_courses_offered`(`deptid`, `name`, `icon`, `sulg`, `corder`, `status`, `addOn`) VALUES ('{$txtDeptcat}', '{$txtName}', '{$thumbfile1}', '{$txturl}', '{$txtOrder}', '1', Now())";
	$res_add =  mysqli_query($con,$sqladd);
	$lattid = mysqli_insert_id($con);

	header('Location:courses_offered.php?msg=4');
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
		<h1 class="title">Add Courses Offered</h1>
		  <ol class="breadcrumb">
		  <li><a href="courses_offered.php">Courses Offered List</a></li>
			<li class="active">Add Courses Offered</li>
		</ol>
	</div>
	<div class="container-widget">
		<div class="col-md-12">
			<div class="col-md-12 col-lg-6">
				<div class="panel panel-default">  <br>
					<div class="panel-body">
						<form name="frmChangepassword" id="frmChangepassword" enctype="multipart/form-data"  action="" method="POST">
							<div class="form-group">
								<label for="input1" class="form-label">Depatment: </label>
								<select class="form-control" name="txtDeptcat" id="txtDeptcat" required>
									<option value="">Select One</option>
									<?php
										$dept = mysqli_query($con,"SELECT * FROM tbl_mjcet_departments");
										while($res_dept =  mysqli_fetch_object($dept)){
											echo '<option value="'.$res_dept->sid.'">'.$res_dept->dept_name.'</option>';
										}
									
									?>
								</select>  
							</div>
							<div class="form-group">
								<label for="input1" class="form-label">Name: </label>
								<input type="text" class="form-control" name="txtName" id="txtName" required>
							</div>
							<div class="form-group">
								<label for="input1" class="form-label">Icon: </label>
								<input type="file" class="form-control" name="txtThumb" id="txtThumb" >
							</div>
							<div class="form-group">
								<label for="input1" class="form-label">Page Url: </label>
								<input type="text" class="form-control" name="txturl" id="txturl" required>
							</div>
							<div class="form-group">
								<label for="input1" class="form-label">Order: </label>
								<input type="text" class="form-control" name="txtOrder" id="txtOrder" required>
							</div>
							
							<div class="form-group">
							<input type="hidden" name="ADD" value="category">
							<button type="submit" class="btn btn-default">Submit</button>
							</div>
						</form>
					</div><br><br><br>
				</div>
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