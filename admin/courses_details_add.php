<?php 
include "../includes/session.php";
include "../includes/DB.php";

if(!isset($_SESSION['admin_rquest_name']) || !isset($_SESSION['admin_rquest_id'])){
	header("Location: index.php");
	exit(); 
}else{ }  
$eid =  htmlspecialchars($_GET['id']);
if(isset($_POST['ADD']) && $_POST['ADD'] =='category'){
	


	$txtAbout = htmlspecialchars(addslashes($_POST['txtAbout']));
	$order = htmlspecialchars(addslashes($_POST['order']));
	
	
	
	
	// if($_FILES['txtThumb']['name'] !=""){
	// 	$thumbfile1= time().$_FILES['txtThumb']['name'];
	// 	$imagename1= $_FILES['txtThumb']['name'];
	// 	$tempimagename1= $_FILES['txtThumb']['tmp_name'];
	// 	move_uploaded_file($tempimagename1,'../uploades/'.time().$imagename1);
	// }else{
	// 	$thumbfile1="";
	// }

		
		
    $sqladd = "INSERT INTO `tbl_courses_details`( `courses_id`, `block_content`,`block_order`,`status`,`add_date` ) VALUES ('{$eid}', '{$txtAbout}', '{$order}','1', Now())";
 
	$res_add =  mysqli_query($con,$sqladd);
	$lattid = mysqli_insert_id($con);
	
	

	
	header("Location:courses_details_add.php?id=$eid&type=s");
    exit();
    
    //get list

}

$sqlfaq = "SELECT * FROM tbl_courses_details WHERE courses_id ='{$eid}' ORDER BY block_order DESC";
$res_faq =  mysqli_query($con,$sqlfaq);


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
    <h1 class="title">Courses Details</h1>
      <ol class="breadcrumb">
	  <li><a href="courses_details.php">Courses Details</a></li>
        <li class="active">Add & Edit Courses Details</li>
    </ol>


  </div>
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-widget">
	<div class="col-md-12">
		<div class="col-md-12 col-lg-6">
			<div class="panel panel-default">Add Block Content<br>
			<div class="panel-body">
	            <form name="frmChangepassword" id="frmChangepassword" enctype="multipart/form-data"  action="" method="POST">
			
    
					<div class="form-group">
						<label for="input1" class="form-label">Block description: </label>
						<textarea class="form-control" name="txtAbout" id="elm1" required> </textarea>
					</div>
			
		
					
					<div class="form-group">
						<label for="input1" class="form-label">Block Order</label>
						<input type="Number" class="form-control" name="order" id="order" required>
					</div>
					<div class="form-group">
					<input type="hidden" name="ADD" value="category">
					<button type="submit" class="btn btn-default">Save</button>
					</div>
				</form>
            </div>
            
            <br><br><br>
  </div>
  <!-- End Top Stats -->


  
</div>




<div class="col-md-12 col-lg-6">

<?php  ?>
            <?php 
            $i=1;
            while($row_faq = mysqli_fetch_object($res_faq)){?>
        <div class="panel panel-default" id="<?php echo $row_faq->id ?>"> 
        <?php if($i == 1){ ?>
            Update Block Content <br>
        <?php } ?>
       
            
            
			<div class="panel-body">
            <form name="frmChangepassword<?php echo $i ?>" id="frmChangepassword<?php echo $i ?>" enctype="multipart/form-data"  action="editDetailsPage.php" method="POST">
				    <div class="form-group">
						<label for="input1" class="form-label">Block description <?php echo $i; ?>: </label>
						<textarea class="form-control"  id="elm1" name="txtAbout"  required><?php echo $row_faq->block_content ?></textarea>
					</div>
			
		
					
					<div class="form-group">
						<label for="input1" class="form-label">Block Order</label>
						<input type="Number" value="<?php echo $row_faq->block_order ?>" class="form-control" name="order" id="order" required>
					</div>
					<div class="form-group">
                    <input type="hidden" name="edit" value="editBlock">  
                    <input type="hidden" name="cid" value="<?php echo $row_faq->courses_id ?>">
                    <input type="hidden" name="editid" value="<?php echo $row_faq->id ?>">
                    <button type="submit" class="btn btn-default">Edit & Update</button>
                    <!-- <button on type="submit" class="btn btn-default">Delete</button> -->
                    <a href="editDetailsPage.php?type=delete&did=<?php echo $row_faq->id ?>&cid=<?php echo $row_faq->courses_id ?>">Delete</a>
					</div>
			</form>	
            </div>
        
          
  </div>
  <!-- End Top Stats -->
      
  <?php 
         $i++;
        } ?>
            

  
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