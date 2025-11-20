<?php 
include "../includes/session.php";
include "../includes/DB.php";

if(!isset($_SESSION['admin_rquest_name']) || !isset($_SESSION['admin_rquest_id'])){
	header("Location: index.php");
	exit(); 
}else{ }  

if(isset($_POST['ADD']) && $_POST['ADD'] =='category'){
	
	$txtDeptcat = htmlspecialchars(addslashes($_POST['txtDeptcat']));
	$txtDeptname = htmlspecialchars(addslashes($_POST['txtDeptname']));
	$txtMenuname = $_POST['txtMenuname'];
	$txtnofoFacultys = htmlspecialchars(addslashes($_POST['txtnofoFacultys']));
	$title = strtolower($txtMenuname);
	$result = preg_replace('/[ ,&]+/', '-', trim($title));
	$txtSulg = $title."-dept";
	$txtAbout = htmlspecialchars(addslashes($_POST['txtAbout']));
	$txtTitle = htmlspecialchars(addslashes($_POST['txtTitle']));
	$txtIntroduction = htmlspecialchars(addslashes($_POST['txtIntroduction']));
	$txtDescription = htmlspecialchars(addslashes($_POST['txtDescription']));
	$txtVision = htmlspecialchars(addslashes($_POST['txtVision']));
	$txtMission = htmlspecialchars(addslashes($_POST['txtMission']));
	$txtHomeContent = htmlspecialchars(addslashes($_POST['txtHomeContent']));
	
	if($_FILES['txtThumb']['name'] !=""){
		$thumbfile1= time().$_FILES['txtThumb']['name'];
		$imagename1= $_FILES['txtThumb']['name'];
		$tempimagename1= $_FILES['txtThumb']['tmp_name'];
		move_uploaded_file($tempimagename1,'../uploades/'.time().$imagename1);
	}else{
		$thumbfile1="";
	}
	if($_FILES['txtImage']['name'] !=""){
		$thumbfile2= time().$_FILES['txtImage']['name'];
		$imagename2= $_FILES['txtImage']['name'];
		$tempimagename2= $_FILES['txtImage']['tmp_name'];
		move_uploaded_file($tempimagename2,'../uploades/'.time().$imagename2);
	}else{
		$thumbfile2="";
	}
	if($_FILES['txtHODImage']['name'] !=""){
		$thumbfile3= time().$_FILES['txtHODImage']['name'];
		$imagename3= $_FILES['txtHODImage']['name'];
		$tempimagename3= $_FILES['txtHODImage']['tmp_name'];
		move_uploaded_file($tempimagename3,'../uploades/'.time().$imagename3);
	}else{
		$thumbfile3="";
	}
	if($_FILES['txtVMImage']['name'] !=""){
		$thumbfile4= time().$_FILES['txtVMImage']['name'];
		$imagename4= $_FILES['txtVMImage']['name'];
		$tempimagename4= $_FILES['txtVMImage']['tmp_name'];
		move_uploaded_file($tempimagename4,'../uploades/'.time().$imagename4);
	}else{
		$thumbfile4="";
	}
		
		
	$sqladd = "INSERT INTO `tbl_mjcet_departments`(`menuid`, `deptCode`, `dept_name`, `menuNmae`, `thumbnail`, `dept_image`, `sulgname`, `about_dept`, `hod_title`, `hod_image`, `hod_introduction`, `hod_description`, `numberofsatff`, `dept_vision`, `dept_mission`, `dept_v_m_image`, `deptCourses`, `status`, `addOn`) VALUES ('1', '{$txtDeptcat}', '{$txtDeptname}', '{$txtMenuname}', '{$thumbfile1}', '{$thumbfile2}', '{$txtSulg}', '{$txtAbout}', '{$txtTitle}', '{$thumbfile3}', '{$txtIntroduction}', '{$txtDescription}', '{$txtnofoFacultys}', '{$txtVision}', '{$txtMission}', '{$thumbfile4}', '{$txtHomeContent}', '1', Now())";
	$res_add =  mysqli_query($con,$sqladd);
	$lattid = mysqli_insert_id($con);
		
	$values = array(
        "Home"  => $title."-dept",
        "Faculty"  => $title."-staff-list",
        "Publications"  => $title."-publications",
        "R&D Projects"  => $title."-r-and-d-projects",
        "Patents"  => $title."-patents",
        "MoUs"  => $title."-mous",
        "Internship"  => $title."-internship",
        "News Letter"  => $title."-news-letters",
        "Professional Chapters"  => $title."-professional-chapter",
        "Notice Board"  => $title."-dnb"
	);
	$i=1;
	foreach ($values as $key => $value) {
		mysqli_query($con,"INSERT INTO `tbl_mjcet_megha_menu_dept_section`(`menuCategory`, `mainMenuName`, `mainMenuId`, `subMenuId`, `menuName`, `menuSulg`, `menuDocument`, `menuContent`, `menuOrder`, `status`, `addOn`) VALUES('{$txtDeptcat}', '{$txtMenuname}','1','{$lattid}','{$key}','{$value}','','','{$i}','1',NOW())");
		$i++;
	}
	
	header('Location:dept_home.php?msg=4');
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
    <h1 class="title">Add Home Page Details</h1>
      <ol class="breadcrumb">
	  <li><a href="sections.php">Department List</a></li>
        <li class="active">Add Department</li>
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
						<label for="input1" class="form-label">Dept Category: </label>
						<select class="form-control" name="txtDeptcat" id="txtDeptcat" required>
							<option value="">Select One</option>
							<?php
								$dept = mysqli_query($con,"SELECT * FROM departments");
								while($res_dept =  mysqli_fetch_object($dept)){
									echo '<option value="'.$res_dept->DeptCode.'">'.$res_dept->DeptCode.'</option>';
								}
							
							?>
						</select>  
					</div>
					
					<div class="form-group">
						<label for="input1" class="form-label">Dept Name: </label>
						<input type="text" class="form-control" name="txtDeptname" id="txtDeptname" required>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Dept Menu Name: </label>
						<input type="text" class="form-control" name="txtMenuname" id="txtMenuname" required>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Dept Thumbnail: </label>
						<input type="file" class="form-control" name="txtThumb" id="txtThumb" required>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Dept Image: </label>
						<input type="file" class="form-control" name="txtImage" id="txtImage" >
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">About Dept: </label>
						<textarea class="form-control" name="txtAbout" id="elm1" required> </textarea>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Number Of Facultys: </label>
						<input type="text" class="form-control" name="txtnofoFacultys" id="txtnofoFacultys" >
					</div>
					
					
					<div class="form-group">
						<label for="input1" class="form-label">Home Page Content: </label>
						<textarea class="form-control" name="txtHomeContent" id="elm1"> </textarea>
					</div>
					
					<h1>Vision and Mission</h1>
					<div class="form-group">
						<label for="input1" class="form-label">Image: </label>
						<input type="file" class="form-control" name="txtVMImage" id="txtVMImage" required >
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Vision: </label>
						<textarea class="form-control" name="txtVision" id="elm1" required> </textarea>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Mission: </label>
						<textarea class="form-control" name="txtMission" id="elm1" > </textarea>
					</div>
					<h1>HOD</h1>
					<div class="form-group">
						<label for="input1" class="form-label">Title: </label>
						<input type="text" class="form-control" name="txtTitle" id="txtTitle" required>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Image: </label>
						<input type="file" class="form-control" name="txtHODImage" id="txtHODImage" required >
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Introduction: </label>
						<textarea class="form-control" name="txtIntroduction" id="elm1" required> </textarea>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Description: </label>
						<textarea class="form-control" name="txtDescription" id="elm1" > </textarea>
					</div>
					<div class="form-group">
					<input type="hidden" name="ADD" value="category">
					<button type="submit" class="btn btn-default">Submit</button>
					</div>
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