
<?php 
include "includes/DB.php";
  
 $sqlfaq = "SELECT * FROM tbl_courses WHERE status ='1'";
$res_faq =  mysqli_query($con,$sqlfaq);

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
<script src="js/filter-gallery.js"></script>
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
<div class="inner-banner-main">
  <div class="heading-banner-1">
    <h1>Courses</h1>
    <div class="clear-fix"></div>
    <div class="breadcrumb"> <a href="index.php?pageid=2">Home</a> <a href="#"><img src="images/bullet-3.svg">Courses</a> </div>
  </div>
  <img src="images/courses-banner.jpg" alt="about-banner" class="img-height-1"/>
  <div class="inner-banner-strip"><img src="images/banner-strip-1.png" alt="banner-strip"></div>
</div>
<div class="about-sec-1">
  <div class="wrapper">
    <div class="portfolio div">
      <div class="container">
        <div class="filters">
        <?php
$sel_ccat= "SELECT * FROM tbl_course_categories WHERE status ='1' ORDER BY cat_order ASC";
$sel_ccat_row =  mysqli_query($con,$sel_ccat);


?>
          <!--<ul>
            <li class="active" data-filter="*">All</li>
            <?php $i=1; while($sel_ccat_row_fertch = mysqli_fetch_object($sel_ccat_row)){?>
            <li data-filter=".<?php echo $sel_ccat_row_fertch->id ?>"><?php echo $sel_ccat_row_fertch->title ?></li>
          
            <?php } ?>
          </ul>-->
        </div>
        <div class="">  <!--"filters-content"-->
          <div class="three-card-main grid">
          <?php $i=1; while($row_faq = mysqli_fetch_object($res_faq)){?>
            <div class="n-three-card-1 all <?php echo $row_faq->courses_cat_id ?>">
              <div class="n-three-card-img"><img src="uploades/<?php echo $row_faq->courses_image  ?>"></div>
              <div class="n-three-date"><img src="images/calender-icon-1.png" alt="calender"> <?php echo $row_faq->tag_line ?></div>
              <h4><?php echo stripslashes(html_entity_decode($row_faq->courses_name))?> </h4>
              <p><?php echo stripslashes(html_entity_decode($row_faq->about_courses)) ?><p>
              <a href="courses-details.php?id=<?php echo stripslashes($row_faq->course_id) ?>" class="button-2">Enroll now</a> 
              </div>
          <?php } ?>
            
              
              

              
              
          </div>
        </div><br><br><br>
      </div>
    </div>
  </div>
</div>
<div class="footer-sec-1"><img src="images/footer-bg-1_102.png" alt="footer"></div>
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
<script>
    $('.filters ul li').click(function(){
  $('.filters ul li').removeClass('active');
  $(this).addClass('active');
  
  var data = $(this).attr('data-filter');
  $grid.isotope({
    filter: data
  })
});

var $grid = $(".grid").isotope({
  itemSelector: ".all",
  percentPosition: true,
  masonry: {
    columnWidth: ".all"
  }
})
    </script>
</body>
</html>