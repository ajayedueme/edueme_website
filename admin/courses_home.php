<?php 
include "../includes/session.php";
include "../includes/DB.php";
if(!isset($_SESSION['admin_rquest_name']) || !isset($_SESSION['admin_rquest_id'])){
	header("Location: index.php");
	exit(); 
}else{

}  
$sqlfaq = "SELECT * FROM tbl_courses";
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

	<div class="page-header" style="width: 100%; overflow: hidden;">
		<div style="width: 600px; float: left;"> 
			<h1 class="title">Courses List</h1>
		</div>
		<div style="float: right;"> 
			<a class="btn btn-default" href="add_courses_home.php">Add</a>
		</div>
			
	</div>
  
  
  <!-- End Page Header -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  <!-- Start Row -->
  <div class="row">

    <!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        
        <div class="panel-body table-responsive">
          <?php 
						if(isset($_GET['msg']) && $_GET['msg'] =='2'){
							echo "<p style='color:red'>Issue in updating this record, try again</p>";
						}else if(isset($_GET['msg']) && $_GET['msg'] =='1'){
							echo "<p style='color:green'>Record added successfully</p>";
						}else if(isset($_GET['msg']) && $_GET['msg'] =='3'){
							echo "<p style='color:green'>Record deleted</p>";
						}else if(isset($_GET['msg']) && $_GET['msg'] =='4'){
							echo "<p style='color:green'>Record updated successfully</p>";
						}
					?>


            <table id="example0" class="table display">
                <thead>
                    <tr>
                    <th>Sno</th>
                    <th>Popular</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Order</th>
                        <th>Tag line</th>
						<th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
             
             
                <tbody>
                <?php $i=1; while($row_faq = mysqli_fetch_object($res_faq)){?>
                    <tr>
                        <td width="4%"><?php echo $i; $i++; ?></td>
                        <td width=5%"><input type="checkbox" class="country" name="country1" value="<?= $row_faq->course_id?>" <?php echo  $row_faq->popular == 1? "checked":"" ?>></td>
                        <td width="28%"><?php echo stripslashes($row_faq->courses_name);?></td>
                        <?php  

$sqlfaqmenu = "SELECT * FROM tbl_course_categories WHERE id ='{$row_faq->courses_cat_id}'";
$res_faq_mmenu =  mysqli_query($con,$sqlfaqmenu);
$resultmenu = mysqli_fetch_object($res_faq_mmenu);
?>

                        <td width="28%"><?php echo stripslashes($resultmenu->title);?></td>
                        <td width="28%"><img width="70px" height="55px" src="../uploades/<?php echo stripslashes($row_faq->courses_image);?>" ></td>
                        <td width="10%"><?php echo stripslashes($row_faq->  order);?></td>
                        <td width="30%"><?php echo stripslashes($row_faq->tag_line);?></td>
						<td width="8%">
							<?php
								if($row_faq->status==1){
									$sel = "selected";
									$unsel = "";
								}elseif($row_faq->status==0){
									$sel = "";
									$unsel = "selected";
								} 
							?>
							<select class="form-control" name="statchnage" >
								<option  value="1r<?= $row_faq->course_id?>" <?=$sel?> >Active</option>
								<option  value="0r<?= $row_faq->course_id?>" <?=$unsel?> >Inactive</option>
							</select>
						</td>
                        <td width="10%">
							<a href="edit_courses_home.php?eid=<?php echo $row_faq->course_id;?>">Edit</a> | 
							<a class="delete" href="javascript:void(0)" data-id="<?php echo $row_faq->course_id;?>">Delete</a>
						</td>
                    </tr>
                   <?php } ?> 
                </tbody>
            </table>


        </div>

      </div>
    </div>
    <!-- End Panel -->





  </div>
  <!-- End Row -->






</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<!-- Start Footer -->
<?php include 'footer.php'; ?>
<!-- End Footer -->


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEPANEL -->
<!-- END SIDEPANEL -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 



<!-- ================================================
jQuery Library
================================================ -->
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
Data Tables
================================================ -->
<script src="js/datatables/datatables.min.js"></script>


<script>
    getpopcheckvalue=0
    $("input:checkbox.country").click(function() {

        if(!$(this).is(":checked")){
            // alert('you are unchecked ' + $(this).val());
            getpopcheckvalue=0
        }else{
            // alert('you are checed ' + $(this).val());
            getpopcheckvalue=1
        }
    
        $.ajax({
				url:'menu_records.php',
				type:'post',
				data:{'action':"popular",'id':$(this).val(),'getpopcheckvalue':getpopcheckvalue},
				success:function(data){
                  
					location.reload();
				}
			});
        
    }); 

    </script>
<script>
$(document).ready(function() {
    $('#example0').DataTable({
		
		"aLengthMenu": [[50, 100, -1], [50, 100, "All"]],
        "iDisplayLength": 50
		
	});
} );
</script>



<script>
$(document).ready(function() {
	//delete
	
	$('.delete').click(function(e) {
		var r = confirm("Are you sure you want to delete?");
		if (r == true) {
			var dltid = $(this).data('id');
			$.ajax({
				url:'delete_records.php',
				type:'post',
				data:{'action':"Delete",'tblname':'tbl_courses','dltid':'course_id','dltval':dltid},
				success:function(data){
					location.reload();
				}
			}); 
		} else {
			
		}
		e.preventDefault();
		 
	});
	
	$('select[name^="statchnage"]').change(function(){
		var ptid = (this.value);
		var array = ptid.split('r');
		var status_value= array[0];
		var cahnge_id= array[1];
		$.ajax({
			url:'ajax.php',
			type:'post',
			data:{'actions':'update','tablename_status':'tbl_courses','statuscolumn':'status','status':status_value,'idcolumn':'course_id','id':cahnge_id},
			success:function(data){
				location.reload();
			}
		}); 
	});
	
	
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
	
	// Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    } );
} );
</script>

</body>
</html>