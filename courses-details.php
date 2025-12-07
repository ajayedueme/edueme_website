<?php 
include "includes/DB.php";
$eid =  htmlspecialchars($_GET['id']);
$sqlfaq = "SELECT * FROM tbl_courses_details WHERE status ='1' AND courses_id='{$eid }' ORDER BY block_order ASC";
$res_faq =  mysqli_query($con,$sqlfaq);

$sqlfaq_get = "SELECT * FROM tbl_courses WHERE status ='1' AND course_id='{$eid }' ";
$res_faq_get =  mysqli_query($con,$sqlfaq_get);
$res_faq_get_fetch = mysqli_fetch_object($res_faq_get);

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
    <header>
      <div class="wrapper">
        <div class="tz-t1">
          <div class="tz-r1">
            <div class="tz-c1"><a class="logoOuter" href="index.php?pageid=2"><img src="images/logo.png" class="logo-div" alt="logo" width="170" /></a></div>
            <div class="tz-c1">
              <div class="nav-main">
                <div class="nav-button22"></div>
                <nav>
                  <ul>
                    <li><a href="index.php?pageid=2">Home</a></li>
                    <li><a href="About.html">About</a></li>
                    <li><a href="Services.html">Services</a></li>
                    <li><a href="Courses.html" class="active">Courses</a></li>
                    <li><a href="Events.html">Events</a></li>
                    <li><a href="Contact.html">Contact</a></li>
                    <li><a href="under-maintenance.html" class="active-2">Shop NOW</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
  </div>
</div>
<!--Banner Start-->
<div class="inner-banner-main">
  <div class="heading-banner-1">
    <h1>Courses</h1>
    <div class="clear-fix"></div>
    <div class="breadcrumb"> <a href="index.php?pageid=2">Home</a> <a href="Courses.html"><img src="images/bullet-3.svg">Courses</a> <a href="#"><img src="images/bullet-3.svg"><?php echo stripslashes(html_entity_decode($res_faq_get_fetch->courses_name)) ?></a> </div>
  </div>
  <img src="images/courses-banner.jpg" alt="about-banner" class="img-height-1">
  <div class="inner-banner-strip"><img src="images/banner-strip-1.png" alt="banner-strip"></div>
</div>
<div class="about-sec-1 text-style-1">
  <div class="wrapper text-style-1">
    <div class="courses-inner-wrap">
      <div class="courses-inner-1">


      <?php $i=1; while($row_faq = mysqli_fetch_object($res_faq)){?>
        <div class="courses-box-1">
        <?php echo stripslashes(html_entity_decode($row_faq->block_content))?>
        </div>
        <?php } ?>
      </div>
      <div class="courses-inner-2">
        <div class="c-three-card-1">
          <div class="c-three-card-img"><img src="uploades/<?php echo $res_faq_get_fetch->courses_image ?>"></div>
          <div class="c-three-date"><img src="images/calender-icon-1.png" alt="calender"> <?php echo $res_faq_get_fetch->tag_line ?>  </div>
          <h4> <?php echo stripslashes(html_entity_decode($res_faq_get_fetch->courses_name)) ?></h4>
          <a href="#" class="button-2">Enroll now</a> </div>
      </div>
    </div>
  </div>
</div>
<div class="footer-sec-1"><img src="images/footer-bg-1_102.png" alt="footer"></div>
<div class="footer-sec-2">
  <div class="wrapper">
    <div class="footer-section">
      <div class="footer-1">
        <div class="footer-logo"><img src="images/logo.png" alt="logo"></div>
        <p>"At Edueme, we believe in shaping young minds for the future. Our dedicated team of research scientists, innovators, and physicists bring a wealth of knowledge and experience in Robotics, Mechanical Design, Machine Learning, and Artificial Intelligence to provide our students with unparalleled learning opportunities. With a focus on the second half of the 21st century, we are proud to be the pioneers in India to introduce robotics education from as early as third grade, empowering our students to explore the exciting world of robotics with hands-on experience."</p>
      </div>
      <div class="footer-2">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="About.html">About</a></li>
          <li><a href="Services.html">Services</a></li>
          <li><a href="Courses.html">Courses</a></li>
          <li><a href="Events.html">Events</a></li>
          <li><a href="Contact.html">Contact</a></li>
        </ul>
      </div>
      <div class="footer-2">
        <h3>Information</h3>
        <ul>
          <li><a href="under-maintenance.html">Purchase guide</a></li>
          <li><a href="under-maintenance.html">Privacy policy</a></li>
          <li><a href="under-maintenance.html">Terms of service</a></li>
          <li><a href="under-maintenance.html">Membership</a></li>
          <li><a href="under-maintenance.html">Contact Us</a></li>
        </ul>
      </div>
      <div class="footer-2">
        <h3>Contact Us</h3>
        <div class="email-1 email-icon">info@eduemeresearchlabs.com</div>
        <div class="email-1 location-icon">Madhapur, Hyderabad, Telegana</div>
        <div class="email-1 phone-icon">+91 9059508050</div>
        <div class="social-media-1"> <a href="#"><img src="images/facebook-icon.png" alt="facebook-icon"></a> <a href="#"><img src="images/insta-icon.png" alt="insta-icon"></a> <a href="#"><img src="images/twitter-icon.png" alt="twitter-icon"></a> </div>
      </div>
    </div>
  </div>
  <div class="copy-right">&copy; 2022 EDUEME Research Labs. All Rights Reserved</div>
</div>
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