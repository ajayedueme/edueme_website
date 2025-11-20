<?php 
include "includes/DB.php";
$mid =  htmlspecialchars($_GET['mid']);
// $sqlfaq = "SELECT * FROM tbl_courses_details WHERE status ='1' AND courses_id='{$eid }' ORDER BY block_order ASC";
// $res_faq =  mysqli_query($con,$sqlfaq);

$sqlfaq_get = "SELECT * FROM tbl_pages WHERE status ='1' AND pageMenuId='{$mid }' ";
$res_faq_get =  mysqli_query($con,$sqlfaq_get);


?>
<!doctype html>
<html lang="en" class="nav-no-js">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>EDUEME</title>
<link rel="shortcut icon" href="images/fav.png">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/styles.css">
<link rel="stylesheet" href="styles/navigation.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript">
</script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style>
.div .top-side .title {
    font-weight: 500;
    font-size: 15px;
    display: inline-block;
}
.div .top-side .title:after {
    content: "";
    display: block;
    width: 50%;
    border-bottom: 1px solid #494949;
    margin: 8px auto;
}
.div .top-side h2 {
    font-weight: 700;
}
.div.portfolio .filters {
    text-align: center;
    margin-top: 50px;
}
.div.portfolio .filters ul {
    padding: 0;
}
.div.portfolio .filters ul li {
    list-style: none;
    display: inline-block;
    padding: 20px 30px;
    cursor: pointer;
    position: relative;
}
.div.portfolio .filters ul li:after {
    content: "";
    display: block;
    width: calc(0% - 60px);
    position: absolute;
    height: 2px;
    background: #333;
    transition: width 350ms ease-out;
}
.div.portfolio .filters ul li:hover:after {
    width: calc(100% - 60px);
    transition: width 350ms ease-out;
}
.div.portfolio .filters ul li.active:after {
    width: calc(100% - 60px);
}
.div.portfolio .filters-content {
    margin-top: 50px;
}
.div.portfolio .filters-content .show {
    opacity: 1;
    visibility: visible;
    transition: all 350ms;
}
.div.portfolio .filters-content .hide {
    opacity: 0;
    visibility: hidden;
    transition: all 350ms;
}
.div.portfolio .filters-content .item {
    text-align: center;
    cursor: pointer;
    margin-bottom: 30px;
}
.div.portfolio .filters-content .item .p-inner {
    padding: 20px 30px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}
.div.portfolio .filters-content .item .p-inner h5 {
    font-size: 15px;
}
.div.portfolio .filters-content .item .p-inner .cat {
    font-size: 13px;
}
.div.portfolio .filters-content .item img {
    width: 100%;
}
</style>
</head>
<body>
<div class="">
  <div class="fix_header">
  <?php include "header.php" ?>
  </div>
</div>
<!--Banner Start-->
<?php
$sel_menu_get_row = "SELECT * FROM tbl_main_menu WHERE status ='1' AND menuId = '{$pageid}'";
$sel_menu_get_row_fetch =  mysqli_query($con,$sel_menu_get_row);
$sel_menu_get_row_fetch_res = mysqli_fetch_object($sel_menu_get_row_fetch);

?>
<div class="inner-banner-main">
  <div class="heading-banner-1">
    <h1><?php echo ucfirst($sel_menu_get_row_fetch_res->menuName)  ?></h1>
      <div class="clear-fix"></div>
      <div class="breadcrumb">
          <a href="#">Home</a>
          <a href="#"><img src="images/bullet-3.svg"><?php echo ucfirst($sel_menu_get_row_fetch_res->menuName)  ?></a>
      </div>
  </div>
  <img src="images/courses-banner.jpg" alt="about-banner" class="img-height-1"/>
  <div class="inner-banner-strip"><img src="images/banner-strip-1.png" alt="banner-strip"></div>
</div>
<div class="about-sec-1">
  <div class="wrapper">
    <div class="portfolio div">
      <div class="container">
       <?php echo stripslashes(html_entity_decode( $sel_menu_get_row_fetch_res->menuContent )) ?>
        <div class="n-three-card-main wp ">
        <?php $i=1; while($res_faq_get_fetch = mysqli_fetch_object($res_faq_get)){?>

          <div class="n-three-card-1">
            <div class="n-three-card-img"><img src="uploades/<?php echo $res_faq_get_fetch->pageImage;  ?>"></div>
            <h4><?php echo stripslashes(html_entity_decode($res_faq_get_fetch->pageHeading)) ?></h4>
            <?php echo stripslashes(html_entity_decode($res_faq_get_fetch->txtMenuContentShort)) ?>
            <a href="#" class="button-2"  data-bs-toggle="modal" data-bs-target="#popupone<?php echo  $i; ?>">Read More</a> 
            <!-- Modal Start-->
            <div class="modal fade bd-example-modal-lg" id="popupone<?php echo  $i; ?>" tabindex="-1" >
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5"><?php echo stripslashes(html_entity_decode($res_faq_get_fetch->pageHeading)) ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="popup-content"> <img src="uploades/<?php echo $res_faq_get_fetch->pageImage;  ?>" alt="Year-End-Programs" class="popup-img">
                    <?php echo stripslashes(html_entity_decode($res_faq_get_fetch->pageContent)) ?>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <h5>  <?php echo stripslashes(html_entity_decode($res_faq_get_fetch->tagline)) ?></h5>
                  </div>
                </div>
              </div>
            </div>
          <!-- Modal End-->
          </div>

        <?php $i++; } ?>


        
          
            
            
          
            
            
          
            
            
          
            
            
          
            
            
          
            
            
          
            
            
            
        </div>
      </div>
    </div>
  </div>
</div>
<div class="footer-sec-1"><img src="images/footer-bg-1_102.png" alt="footer"></div>
<?php include "footer.php" ?>
<script src="js/bootstrap.bundle.min.js"></script> 
<script src="js/scripts.js"></script> 
<script>

    const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
    </script>
</body>
</html>