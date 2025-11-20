<?php 
include "../includes/session.php";
include "../includes/DB.php";
if(!isset($_SESSION['admin_rquest_name']) || !isset($_SESSION['admin_rquest_id'])){
	header("Location: index.php");
	exit(); 
}else{

}  
$sqlfaq = "SELECT * FROM tbl_mjcet_megha_menu_dept_section WHERE mainMenuId = '1'";
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
    <h1 class="title">Department Menu List</h1>
      <ol class="breadcrumb">
    </ol>


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
                        <th>S.No.</th>
                        <th>Department Name</th>
                        <th>Menu Title</th>
                        <th>URL</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
             
             
                <tbody>
                <?php $j=1; while($row_faq = mysqli_fetch_object($res_faq)){?>
                    <tr>
                        <td width="2%"><?php echo $j;?></td>
                        <td width="20%"><?php echo stripslashes($row_faq->mainMenuName);?></td>
                        <td width="20%"><?php echo stripslashes($row_faq->menuName);?></td>
                        <td width="20%"><?php echo stripslashes($row_faq->menuSulg);?></td>
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
								<option  value="1r<?= $row_faq->tlmid?>" <?=$sel?> >Active</option>
								<option  value="0r<?= $row_faq->tlmid?>" <?=$unsel?> >Inactive</option>
							</select>
						</td>
                        <td width="10%" style="align:center">
							<a href="edit_dept_menu.php?eid=<?php echo $row_faq->tlmid;?>">Edit</a>
						</td>
                    </tr>
                   <?php $j++; } ?> 
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
				data:{'action':"Delete",'tblname':'tbl_mjcet_megha_menu_dept_section','dltid':'tlmid','dltval':dltid},
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
			data:{'actions':'update','tablename_status':'tbl_mjcet_megha_menu_dept_section','statuscolumn':'status','status':status_value,'idcolumn':'tlmid','id':cahnge_id},
			success:function(data){
				
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