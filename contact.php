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
<script type="text/javascript">
		function validateForm() {
			var name = document.forms["contactForm"]["name"].value;
			var email = document.forms["contactForm"]["email"].value;
			var phone = document.forms["contactForm"]["phone"].value;
			var subject = document.forms["contactForm"]["subject"].value;
			var message = document.forms["contactForm"]["message"].value;

			if (name == "") {
				alert("Please enter your name");
				return false;
			}

			if (email == "") {
				alert("Please enter your email");
				return false;
			}

			if (phone == "") {
				alert("Please enter your phone number");
				return false;
			}

			if (subject == "") {
				alert("Please enter a subject");
				return false;
			}

			if (message == "") {
				alert("Please enter a message");
				return false;
			}
		}
	</script>
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

$sel_contact_get_row = "SELECT * FROM `tbl_contacus`";
$sel_contact_get_row_fetch =  mysqli_query($con,$sel_contact_get_row);
$sel_contact_get_row_fetch_res = mysqli_fetch_object($sel_contact_get_row_fetch);

?>
<div class="inner-banner-main">
  <div class="heading-banner-1">
    <h1><?php echo ucfirst($sel_menu_get_row_fetch_res->menuName)  ?></h1>
    <div class="clear-fix"></div>
    <div class="breadcrumb"> <a href="index.php?pageid=2">Home</a> <a href="#"><img src="images/bullet-3.svg"><?php echo ucfirst($sel_menu_get_row_fetch_res->menuName)?></a> </div>
  </div>
  <img src="images/courses-banner.jpg" alt="about-banner" class="img-height-1">
  <div class="inner-banner-strip"><img src="images/banner-strip-1.png" alt="banner-strip"></div>
</div>
<div class="about-sec-1 text-style-1">
  <div class="wrapper text-style-1">
    <div class="courses-inner-wrap">
      <div class="courses-inner-1">
        <div class="our-customers-2">
          <h2>EDUEME Research Labs</h2>
          <div class="map-sec">
            <div class="map-sec-left">
              <h4>Registered Office</h4>
              <div class="ms-1" style="background-image: url(images/location-on.svg)"><?php echo stripslashes(html_entity_decode( $sel_contact_get_row_fetch_res->addr_r_office))  ?></div>
              <div class="ms-1" style="background-image: url(images/call.svg)"><?php echo $sel_contact_get_row_fetch_res->contact_r_office  ?></div>
              <div class="ms-1" style="background-image: url(images/mail.svg)"><?php echo $sel_contact_get_row_fetch_res->email_r_office  ?></div>
            </div>
            <div class="map-sec-right">
              <h4>Work Office</h4>
              <div class="ms-1" style="background-image: url(images/location-on.svg)"><?php echo stripslashes(html_entity_decode( $sel_contact_get_row_fetch_res->addr_w_office))  ?></div>
              <div class="ms-1" style="background-image: url(images/call.svg)"><?php echo $sel_contact_get_row_fetch_res->contact_w_office  ?></div>
              <div class="ms-1" style="background-image: url(images/mail.svg)"><?php echo $sel_contact_get_row_fetch_res->email_w_office  ?></div>
              
              <!----></div>
          </div>
          <div class="line-1"></div>
          <div class="map-sec">
            <div class="map-sec-right">
            <?php echo stripslashes(html_entity_decode($sel_contact_get_row_fetch_res->addr_map))  ?>
                
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="getintouch-bg">
  <div class="wrapper">
    <div class="popular-courses-wrap-1">
      <h6>Get in touch</h6>
      <h2>Contact Us Now</h2>
    </div>
    <form name="contactForm" onsubmit="return validateForm()" method="post" action="mail-sent.php">
    <div class="form-main">
 

      <input class="f-w-50 input-1" placeholder="Name" type="text" id="name" name="name">
      <input type="email" id="email" name="email" class="f-w-50 input-1" placeholder="Email">
      <input type="tel" id="phone" name="phone" class="f-w-50 input-1" placeholder="Phone">
      <input type="text" id="subject" name="subject" class="f-w-50 input-1" placeholder="Subject">
      <textarea class="f-w-100 text-area-1" id="message" name="message" placeholder="Message"></textarea>
    </div>
    <input type="hidden" name="action" value="contact">
    <!-- <div class="text-center-1"><a href="#" class="button-2">Send Now</a></div> -->
    <div class="text-center-1"><input class="button-2" type="submit" value="Send"></div>
    
	</form>
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
</body>
</html>