<?php 
include "../includes/session.php";
include "../includes/DB.php";

if(!isset($_SESSION['admin_rquest_name']) || !isset($_SESSION['admin_rquest_id'])){
	header("Location: index.php");
	exit(); 
}else{ }  

$sqlfaq = "SELECT *  FROM `tbl_contacus` ORDER BY id DESC";
$res_faq =  mysqli_query($con,$sqlfaq);
$row_faq = mysqli_fetch_object($res_faq);

if(isset($_POST['ADD']) && $_POST['ADD'] =='category'){
    $one = htmlspecialchars(addslashes($_POST['one']));
    $two = htmlspecialchars(addslashes($_POST['two']));
    $three = htmlspecialchars(addslashes($_POST['three']));

    $oneone = htmlspecialchars(addslashes($_POST['oneone']));
    $twotwo = htmlspecialchars(addslashes($_POST['twotwo']));
    $threethree = htmlspecialchars(addslashes($_POST['threethree']));

    $mapfit = htmlspecialchars(addslashes($_POST['mapfit']));


    
    if( $row_faq->id != ""){
        $sqladd = "UPDATE `tbl_contacus` SET `addr_r_office`='{$one}',`addr_w_office`='{$oneone}',`contact_r_office`='{$two}',`contact_w_office`='{$twotwo}',`email_r_office`='{$three}',`email_w_office`='{$threethree}',`addr_map`='{$mapfit}'  WHERE id='{$row_faq->id}'";
        $res_add =  mysqli_query($con,$sqladd);

        header('Location:add_contact.php?msg=edit');
        exit();

    }else{
        $sqladd = "INSERT INTO `tbl_contacus`(`addr_r_office`, `addr_w_office`, `contact_r_office`, `contact_w_office`, `email_r_office`, `email_w_office`, `addr_map`) VALUES ('{$one}','{$oneone}','{$two}','{$twotwo}','{$three}','{$threethree}','{$mapfit}')	";
        $res_add =  mysqli_query($con,$sqladd);
            
        header('Location:add_contact.php?msg=add');
        exit();
        
    }

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
    <h1 class="title">Add & Edit Contact</h1>
      <!-- <ol class="breadcrumb">
	  <li><a href="submenu_two.php">Sub Menu List</a></li>
        <li class="active">Add</li>
    </ol> -->


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
						<label for="input1" class="form-label">Registered Office Location: </label>
						<!-- <input type="text" class="form-control" name="one" value="<?php //echo $row_faq->addr_r_office ?>" id="txtMenuname" required> -->
                        <textarea id="elm1" name="one"><?php echo $row_faq->addr_r_office ?></textarea>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Registered Office Contact: </label>
						<input type="text" class="form-control" name="two" value="<?php echo $row_faq->contact_r_office	 ?>" id="menuTitle" required>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Registered Office email: </label>
                        <input type="text" class="form-control" value="<?php echo $row_faq->email_r_office ?>"name="three" id="menuTitle" required>
					</div>
					<div class="form-group">
						<label for="input1" class="form-label">Work Office Location: </label>
						<!-- <input type="text" class="form-control" value="<?php //echo $row_faq->addr_w_office ?>" name="oneone" id="txtUrl" > -->

                        <textarea id="elm1" name="oneone"><?php echo $row_faq->addr_w_office ?></textarea>
                    </div>
                    
                    <div class="form-group">
						<label for="input1" class="form-label">Work Office Contact: </label>
						<input type="text" class="form-control" value="<?php echo $row_faq->contact_w_office ?>" name="twotwo" id="txtUrl" >
                    </div>
                    
                    <div class="form-group">
						<label for="input1" class="form-label">Work Office Email: </label>
						<input type="text" class="form-control" value="<?php echo $row_faq->email_w_office ?>" name="threethree" id="txtUrl" >
					</div>
				
					<div class="form-group">
						<label for="input1" class="form-label">Loaction Map : </label>
						<textarea id="elm1" name="mapfit"><?php echo $row_faq->addr_map ?></textarea>
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