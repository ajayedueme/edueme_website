<?php 
include "../includes/session.php";
include "../includes/DB.php";
if(!isset($_SESSION['admin_rquest_name']) || !isset($_SESSION['admin_rquest_id'])){
	header("Location: index.php");
	exit(); 
}else{

}  
$sqlfaq = "SELECT * FROM tbl_mjcet_nacc_pdf";
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
	<style>
	.dataTables_length{display:none;}
	.dataTables_paginate{display:none;}
	</style>

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
     <div style="width: 600px; float: left;"> <h1 class="title" >NACC PDF List</h1> </div>
     <div style="float: right;"> 
		<a class="btn btn-default" href="add_naccpdf.php">Add</a>
		
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
                        <th>S.No.</th>
                        <th>Pdf Name</th>
                        <th colspan="2">PDF</th>
                        <th style="text-align:center;">Actions</th>
                    </tr>
                </thead>
             
             
                <tbody>
                <?php $i=1; while($row_faq = mysqli_fetch_object($res_faq)){?>
                    <tr>
                        <td width="5%"><?php echo $i;?></td>
                        <td width="20%"><?php echo ucfirst($row_faq->pdfName);?></td>
                        <td width="25%">
							<a href='../nacc-documents/<?php echo $row_faq->pdf;?>' target="_blank"><?php echo $row_faq->pdf;?></a>
						</td>
						<td width="20%">
							<input type="text" readonly value="<?php echo 'nacc-documents/'.$row_faq->pdf;?>" class="form-control select-this<?php echo $row_faq->pdfid;?>">
						</td>
                        <td width="10%" style="text-align:center;">
							<a href="javascript:void();" id="clickMe<?php echo $row_faq->pdfid;?>" type="button">Copy</a>
						</td>
                    </tr>
					
					<script>
						var button = document.getElementById('clickMe<?php echo $row_faq->pdfid;?>');
						button.addEventListener('click', function (e) {
							e.preventDefault();
							document.execCommand('copy', false, $(".select-this<?php echo $row_faq->pdfid;?>").select());
							$('<div style="color:#008a20;">Copied!</div>').prependTo('.test').delay(2000).fadeOut(600, function() { 
								$('.copy-notification').remove();
							});
						});
					</script>
					
                   <?php $i++; } ?> 
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
		
		"aLengthMenu": [[-1], ["All"]],
        "iDisplayLength": -1
		
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
				data:{'action':"Delete",'tblname':'tbl_mjcet_pdf','dltid':'pdfid','dltval':dltid},
				success:function(data){
					location.reload();
				}
			}); 
		} else {
			
		}
		e.preventDefault();
		 
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