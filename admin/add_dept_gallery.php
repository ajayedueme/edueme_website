<?php 
include "../includes/session.php";
include "../includes/DB.php";

if(!isset($_SESSION['admin_rquest_name']) || !isset($_SESSION['admin_rquest_id'])){
	header("Location: index.php");
	exit(); 
}else{ }  



if(isset($_POST['ADD']) && $_POST['ADD'] =='category'){
		
	$department = htmlspecialchars(addslashes($_POST['department']));
	$menusulg = htmlspecialchars(addslashes($_POST['menusulg']));
	$txtOrder = htmlspecialchars(addslashes($_POST['txtOrder']));
	$txtimgtitle = htmlspecialchars(addslashes($_POST['txtimgtitle']));
	if($_FILES['txtDocument']['name'] !=""){
		$thumbfile2= time().$_FILES['txtDocument']['name'];
		$imagename2= $_FILES['txtDocument']['name'];
		$tempimagename2= $_FILES['txtDocument']['tmp_name'];
		move_uploaded_file($tempimagename2,'../dept-gallery/'.time().$imagename2);
	}else{
		$thumbfile2="";
	}
	$sqladd = "INSERT INTO `tbl_mjcet_dept_gallery`(`deptMenu`, `deptBanner`, `imageTitle`, `menuSulg`, `banOrder`, `status`, `addOn`) VALUES ('{$department}', '{$thumbfile2}', '{$txtimgtitle}', '{$menusulg}', '{$txtOrder}', '1', Now())";
	$res_add =  mysqli_query($con,$sqladd);
	
	header('Location:dept_gallery.php?msg=4');
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
    <h1 class="title">Add Image</h1>
      <ol class="breadcrumb">
	  <li><a href="dept_gallery.php">Gallery List</a></li>
        <li class="active">Add Image</li>
    </ol>


  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-widget">
	<div class="col-md-12">
		<div class="col-md-12 col-lg-6">
			<div class="panel panel-default">  <br>
				<div class="panel-body">
				<form name="frmChangepassword" id="frmChangepassword" enctype="multipart/form-data"  action="" method="POST">
					
					<div class="form-group">
						<label for="input1" class="form-label">Main Menu List: </label>
						<select class="form-control" name="department" id="department">
							<option value="">Select</option>
							<option value="sections">Sections</option>
							<option value="departments">Departments</option>
							<option value="courses">Courses</option>
						</select>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Sub Menu List: </label>
						<select class="form-control" name="menusulg" id="menusulg">
							<option value="">Select</option>
						</select>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Banner: </label>
						<input type="file" class="form-control" name="txtDocument" id="txtDocument" >
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Title: </label>
						<input type="text" class="form-control" name="txtimgtitle" id="txtimgtitle">
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Order: </label>
						<input type="text" class="form-control" name="txtOrder" id="txtOrder" >
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



$('#department').change(function(){
	var dval = (this.value);
	$.ajax({
		url:'ajax.php',
		type:'post',
		data:{'action':"DeptBanners",'dval':dval},
		success:function(data){
			$("#menusulg").html(data);
		}
	}); 
});


</script>

</body>
</html>