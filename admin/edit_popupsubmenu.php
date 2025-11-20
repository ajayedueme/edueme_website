<?php 
include "../includes/session.php";
include "../includes/DB.php";

if(!isset($_SESSION['admin_rquest_name']) || !isset($_SESSION['admin_rquest_id'])){
	header("Location: index.php");
	exit(); 
}else{ }  

$eid =  htmlspecialchars($_GET['eid']);
if(isset($_POST['ADD']) && $_POST['ADD'] =='category'){
	$txtMenuType = htmlspecialchars(addslashes($_POST['txtMenuType']));
	$txtMenuname = htmlspecialchars(addslashes($_POST['txtMenuname']));
	$txtUrl = htmlspecialchars(addslashes($_POST['txtUrl']));
	$txtMenuContent2 = htmlspecialchars(addslashes($_POST['txtMenuContent2']));
	$txtMenuContent = htmlspecialchars(addslashes($_POST['txtMenuContent']));
	$txtMenuOrder = htmlspecialchars(addslashes($_POST['txtMenuOrder']));
	$menuTitle = htmlspecialchars(addslashes($_POST['menuTitle']));
	
	$sqlupdate = "UPDATE `tbl_mjcet_side_submenu` SET `menuType` = '{$txtMenuType}', `menuSulg` = '{$txtUrl}', `menuTitle` = '{$menuTitle}', `menuName` = '{$txtMenuname}', `menuContent` = '{$txtMenuContent}', `menuContentTwo` = '{$txtMenuContent2}', `menuOrder` = '{$txtMenuOrder}', `status` = '1'";
	
	if($_FILES['txtThumb']['name'] !=""){
		$thumbfile1= $_FILES['txtThumb']['name'];
		$imagename1= $_FILES['txtThumb']['name'];
		$tempimagename1= $_FILES['txtThumb']['tmp_name'];
		move_uploaded_file($tempimagename1,'../documents/'.$imagename1);
		$sqlupdate .= ", menuDocument = '{$thumbfile1}'";
	}
	if($_FILES['txtImage']['name'] !=""){
		$thumbfile2= $_FILES['txtImage']['name'];
		$imagename2= $_FILES['txtImage']['name'];
		$tempimagename2= $_FILES['txtImage']['tmp_name'];
		move_uploaded_file($tempimagename2,'../uploades/'.$imagename2);
		$sqlupdate .= ", menuImage = '{$thumbfile2}'";
	}
	$sqlupdate .= " WHERE menuId = '{$eid}'";
	$res_add =  mysqli_query($con,$sqlupdate);
		
	header('Location:popupsubmenu.php?msg=4');
	exit();
	
}else{
	$sql = "SELECT * FROM tbl_mjcet_side_submenu WHERE menuId = '{$eid}'";
	$res =  mysqli_query($con,$sql);
	$result = mysqli_fetch_object($res);
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
    <h1 class="title">Update Sub Menu</h1>
      <ol class="breadcrumb">
	  <li><a href="popupsubmenu.php">Sub Menu List</a></li>
        <li class="active">Update</li>
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
						<label for="input1" class="form-label">Menu Type: </label>
						<select class="form-control" name="txtMenuType" id="txtMenuType" >
							<option value="">Select</option>
							<?php 
							
								$mainmenu =  mysqli_query($con,"SELECT * FROM tbl_mjcet_side_menu ORDER BY menuOrder");
								while($res_mainmenu= mysqli_fetch_object($mainmenu)){
							
							?>
							<option value="<?php echo $res_mainmenu->menuId?>" <?php if($result->menuType == $res_mainmenu->menuId){ echo 'selected'; }?>><?php echo $res_mainmenu->menuName?></option>
								<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Menu Name: </label>
						<input type="text" class="form-control" name="txtMenuname" id="txtMenuname" value="<?php echo $result->menuName?>">
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Title: </label>
						<input type="text" class="form-control" name="menuTitle" id="menuTitle" value="<?php echo $result->menuTitle?>">
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Document: </label>
						<input type="file" class="form-control" name="txtThumb" id="txtThumb">
						<a href="../documents/<?php echo $result->menuDocument?>"><?php echo $result->menuDocument?></a>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Menu Url: </label>
						<input type="text" class="form-control" name="txtUrl" id="txtUrl" value="<?php echo $result->menuSulg?>">
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Image: </label>
						<input type="file" class="form-control" name="txtImage" id="txtImage">
						<a href="../uploades/<?php echo $result->menuImage?>"><?php echo $result->menuImage?></a>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Menu Content: </label>
						<textarea id="elm1" name="txtMenuContent"><?php echo $result->menuContent?></textarea>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Second Menu Content: </label>
						<textarea id="elm1" name="txtMenuContent2"><?php echo $result->menuContentTwo?></textarea>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Menu Order: </label>
						<input type="text" class="form-control" name="txtMenuOrder" id="txtMenuOrder" value="<?php echo $result->menuOrder?>">
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