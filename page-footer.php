<?php 
include "includes/DB.php";

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
<script src="js/jquery.flexisel.js"></script>
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
    <div class="breadcrumb"> <a href="index.php">Home</a> <a href="#"><img src="images/bullet-3.svg"> <?php echo ucfirst($sel_menu_get_row_fetch_res->menuName)  ?></a> </div>
  </div>
  <img src="images/courses-banner.jpg" alt="about-banner" class="img-height-1">
  <div class="inner-banner-strip"><img src="images/banner-strip-1.png" alt="banner-strip"></div>
</div>
<div class="about-sec-1 text-style-1">
  <div class="wrapper text-style-1">
    <div class="about-sec-1-1">
      <?php if($sel_menu_get_row_fetch_res->menuImage){ ?>
    <img src="uploades/<?php echo $sel_menu_get_row_fetch_res->menuImage ?>" alt="about-img">
<?php } ?>
      <h6><?php echo ucfirst($sel_menu_get_row_fetch_res->menuName)  ?></h6>
      <?php echo stripslashes(html_entity_decode($sel_menu_get_row_fetch_res->menuContent))  ?>
    </div>
    
  </div>
</div>

<div class="footer-sec-1 footer-gray-bg-1"><img src="images/footer-bg-1_102.png" alt="footer"></div>
<?php include "footer.php" ?>
<script src="js/bootstrap.bundle.min.js"></script> 
<script src="js/scripts.js"></script> 
<script>
    $(window).load(function() {
    $("#toppic_1").flexisel({
        visibleItems: 4,
        itemsToScroll: 1,
        animationSpeed: 400,
        infinite: false,
        navigationTargetSelector: null,
        autoPlay: {
            enable: false,
            interval: 5000,
            pauseOnHover: true
        },
        responsiveBreakpoints: {
            portrait: {
                changePoint: 480,
                visibleItems: 1,
                itemsToScroll: 1
            },
            landscape: {
                changePoint: 640,
                visibleItems: 2,
                itemsToScroll: 1
            },
            tablet: {
                changePoint: 980,
                visibleItems: 3,
                itemsToScroll: 1
            }
        }
    });
});
</script>
</body>
</html>