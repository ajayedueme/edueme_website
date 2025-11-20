<?php 
include "includes/DB.php";

$sqlHomeImages  = "SELECT * FROM tbl_home_images WHERE image_satus ='1' ORDER BY image_order ASC";
$res_sqlHomeImages =  mysqli_query($con,$sqlHomeImages);
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
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
<div class="edueme-header">
  <div class="fix_header">
  <?php include "header.php" ?>
  </div>
  
  <!--Banner Start-->
  <div id="carouselExampleCaptions" class="carousel slide"> 
    <div class="carousel-inner">

    <?php $i=1; while($row_Home_Images = mysqli_fetch_object($res_sqlHomeImages)){?>
      <div class="carousel-item <?php echo $i == 1 ?'active':'';?>">
        <div class="banner-img-1">
          <div class="bc-1">
            <div class="dots"><img src="images/dots-1_03.png"></div>
            <h3>
            <?php echo stripslashes(html_entity_decode($row_Home_Images->title)); ?>      
          </h3>
            <p><?php echo stripslashes(html_entity_decode($row_Home_Images->description)); ?>  </p>
            <a href="Contact.html" class="green-color">Contact us </a><a href="<?php echo stripslashes(html_entity_decode($row_Home_Images->readmore_link)); ?>" >Read more</a> </div>
          <div class="bi-1"><img src="uploades/<?php echo $row_Home_Images->image ?>" alt="banner-1"></div>
        </div>
      </div>
    <?php $i++; } ?>

      <!-- <div class="carousel-item">
        <div class="banner-img-1">
          <div class="bc-1">
            <div class="dots"><img src="images/dots-1_03.png"></div>
            <h3>EDUEME<br>
              Way To Learn<br>
              Anything</h3>
            <p>Learning is a complex process that depends on various factors such as motivation, cognitive ability, and study strategies. Edueme helps youngsters learn more effectively and efficiently.</p>
           <a href="Contact.html" class="green-color">Contact us </a><a href="About.html" >Read more</a>  </div>
          <div class="bi-1"><img src="images/mobile-app-development.gif" alt="banner-1"></div>
        </div>
      </div> -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="visually-hidden">Previous</span> </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="visually-hidden">Next</span> </button>
  </div>  
</div>
<?php
$sel_menu_get_row_fetch_res = "SELECT * FROM tbl_main_menu WHERE  menuName = 'Feautred Services'";
$sel_menu_get_row_fetch_rs =  mysqli_query($con,$sel_menu_get_row_fetch_res);
$sel_menu_get_row_fetch_res_rs = mysqli_fetch_object($sel_menu_get_row_fetch_rs);

?>

<div class="feautred-services-bg">
  <div class="wrapper">
    <div class="feautred-services-section">
      <div class="fss-1">
        <h6>ensuring</h6>
        <h2>Feautred Services</h2>
        <?php echo stripslashes(html_entity_decode($sel_menu_get_row_fetch_res_rs->menuContent))  ?>
        <a href="#" class="button-2">Read more</a> </div>
      <div class="fss-2">
        
        <div class="fss-2-subsection">

          <div class="fss-2-1">

          <?php 
          $num = 0;
$sel_menu_get_row_fetch_rs_short = "SELECT * FROM tbl_pages WHERE  pageMenuId =  $sel_menu_get_row_fetch_res_rs->menuId";
$sel_menu_get_row_fetch_rs_eshort =  mysqli_query($con,$sel_menu_get_row_fetch_rs_short);
while($sel_menu_get_row_fetch_res_rs_short = mysqli_fetch_object($sel_menu_get_row_fetch_rs_eshort)){
   ?>

            <div class="fss-card"> <img src="uploades/<?php echo $sel_menu_get_row_fetch_res_rs_short->pageImage ?>" alt="Awesome Teachers">
              <h4><?php echo $sel_menu_get_row_fetch_res_rs_short->pageHeading ?>:</h4>
              <?php echo stripslashes(html_entity_decode($sel_menu_get_row_fetch_res_rs_short->txtMenuContentShort)) ?>
              <a href="pages.php?mid=4" class="link-2">Read more <img src="images/arrow-1.png" alt="arrow"></a> </div>


    <?php
   if ($num % 2 && $num < 3) {
     echo '</div>';
    echo '<div class="fss-2-1" >';
}
$num++;
  } ?>
            <!-- <div class="fss-card"> <img src="images/best-programme-icon.png" alt="Best Programme">
              <h4>Best Programme</h4>
              <p>Robotics education is divided into two separate tracks: robotics with electronics and robotics with artificial intelligence.</p>
              <a href="Services.html" class="link-2">Read more <img src="images/arrow-1.png" alt="arrow"></a> </div> -->

          
<!--           
          <div class="fss-2-1" >
            <div class="fss-card m-t-1"> <img src="images/global-certificate-icon.png" alt="Global Certificate">
              <h4>Global Certificate</h4>
              <p>Students gain a thorough understanding of the newest technology and industry best practises through our widely renowned certification programme in robotics and artificial intelligence. </p>
              <a href="Services.html" class="link-2">Read more <img src="images/arrow-1.png" alt="arrow"></a> </div>
            <div class="fss-card"> <img src="images/business-knowledge-icon.png" alt="Business Knowledge">
              <h4>Business Knowledge</h4>
              <p>We can emphasize that our robotics education services provide children with a unique opportunity to gain hands-on knowledge by learning about the latest technologies..</p>
              <a href="Services.html" class="link-2">Read more <img src="images/arrow-1.png" alt="arrow"></a> </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clients-main">
  <div class="wrapper">
    <div class="clients-main-flex">
    <?php  
       $sel_gal_get_row = "SELECT * FROM tbl_gallery_img WHERE status ='1' AND catSulg = 'Home' ORDER BY catOrder ASC";
      $sel_gal_get_row_fetch =  mysqli_query($con,$sel_gal_get_row);
      while($sel_gal_get_row_fetch_res = mysqli_fetch_object($sel_gal_get_row_fetch)){ 
    ?>
      <div class="clients-flex-1"><img src="uploades/<?php echo $sel_gal_get_row_fetch_res->catImage  ?>" alt="clients"></div>
      <?php } ?>
      <!-- <div class="clients-flex-1"><img src="images/clients-logos-3.png" alt="clients"></div>
      <div class="clients-flex-1"><img src="images/clients-logos-2.png" alt="clients"></div>
      <div class="clients-flex-1"><img src="images/clients-logos-6.png" alt="clients"></div>
      <div class="clients-flex-1"><img src="images/clients-logos-4.png" alt="clients"></div> -->
    </div>
  </div>
</div>

<?php
$sel_menu_get_row_fetch_inv = "SELECT * FROM tbl_main_menu WHERE  menuName = 'Innovative'";
$sel_menu_get_row_fetch_res_inv =  mysqli_query($con,$sel_menu_get_row_fetch_inv);
$sel_menu_get_row_fetch_res_final_inv = mysqli_fetch_object($sel_menu_get_row_fetch_res_inv);

?>
<div class="consequatur-bg">
  <div class="wrapper">
    <div class="consequatur-sec">
      <div class="consequatur-1"> <img src="images/consequatur-img-1.png" alt="consequatur"> </div>
      <div class="consequatur-2">
        <h6>innovative</h6>
          
         
          
          
        <?php echo stripslashes(html_entity_decode($sel_menu_get_row_fetch_res_final_inv->menuContent))  ?>
        <!--<a href="#" class="button-2">Read more</a>--> </div>
    </div>
  </div>
</div>
<div class="popular-courses-bg">
  <div class="blue-strip-2"><img src="images/blue-strip-2.png" alt="blue-strip"></div>
  <div class="wrapper">
    <div class="popular-courses-wrap-1">
      <h6>Development</h6>
      <h2>Popular Courses</h2>
      <p>"Unlock your child's inner innovator with our empowering courses! We believe every child has the potential to create something amazing, and our programs are designed to help them develop the skills and mindset to do so."- [Edueme Research Labs]



</p>
    </div>
    <div class="three-card-main">
    <?php
     $sqlfaq_pop = "SELECT * FROM tbl_courses WHERE status ='1' and popular='1'";
      $res_faq_pop =  mysqli_query($con,$sqlfaq_pop); 
      $i=1; while($row_faq_pop = mysqli_fetch_object($res_faq_pop)){
      ?>

      <div class="three-card-1">
        <div class="three-card-img"><img src="uploades/<?php echo $row_faq_pop->courses_image  ?>"></div>
        <div class="three-date"><img src="images/calender-icon-1.png" alt="calender"> <?php echo $row_faq_pop->tag_line  ?></div>
        <h4><?php echo stripslashes(html_entity_decode($row_faq_pop->courses_name))?></h4>
        <?php echo stripslashes(html_entity_decode($row_faq_pop->about_courses)) ?>
        <a href="courses-details.php?id=<?php echo stripslashes($row_faq_pop->course_id) ?>" class="button-2">Enroll now</a> </div>
      <?php } ?>

      <!-- <div class="three-card-1">
        <div class="three-card-img"><img src="images/robotics-with-electronics.png"></div>
        <div class="three-date"><img src="images/calender-icon-1.png" alt="calender">  Starts at 10 March, 2023</div>
        <h4>Robotics with electronics</h4>
        <p>Electronics are used to design, build, and programme robots to perceive and interact with their environment.</p>
        <a href="Robotics-with-embedded.html" class="button-2">Enroll now</a> </div>


      <div class="three-card-1">
        <div class="three-card-img"><img src="images/iot.png"></div>
        <div class="three-date"><img src="images/calender-icon-1.png" alt="calender">  Starts at 10 March, 2023</div>
        <h4>The Internet of Things (IoT)</h4>
        <p>The Internet of Things (IoT) allows physical things to interact and remotely monitor, control, and automate processes and systems.</p>
        <a href="IoT.html" class="button-2">Enroll now</a> </div> -->
    </div>
  </div>
</div>
<?php
$sel_menu_get_row_fetch_occu= "SELECT * FROM tbl_main_menu WHERE  menuName = 'Occurrence'";
$sel_menu_get_row_fetch_res_occu =  mysqli_query($con,$sel_menu_get_row_fetch_occu);
$sel_menu_get_row_fetch_res_final_occu = mysqli_fetch_object($sel_menu_get_row_fetch_res_occu);

?>
<div class="popular-courses-bottom">
  <div class="blue-strip-1"><img src="images/blue-strip-1.png" alt="blue-strip"></div>
  <img src="images/popular-courses-bg-1.png"> </div>
<div class="wrapper">
  <div class="sapiente-main">
    <div class="consequatur-sec">
      <div class="consequatur-2">
        <h6>occurrence</h6>
        <?php echo stripslashes(html_entity_decode($sel_menu_get_row_fetch_res_final_occu->menuContent))  ?>
        <!--<ul>
          <li>Labore et dolore magnam aliuam ruaerat como</li>
          <li>Quam nihil molestiae consequatur vel illum eius</li>
          <li>Earue iosa nuae ab ilvlo inventore veritatis labore</li>
        </ul>-->
        <!--<a href="#" class="button-2">Read more</a>--> </div>
      <div class="consequatur-1"> <img src="images/sapiente-img-1.png" alt="sapiente"> </div>
    </div>
  </div>
</div>

<?php 
$sel_menu_get_row_fetch_tms= "SELECT * FROM tbl_Testimonials WHERE  status = '1'";
$sel_menu_get_row_fetch_res_tms =  mysqli_query($con,$sel_menu_get_row_fetch_tms);
// $sel_menu_get_row_fetch_res_final_tms = mysqli_fetch_object($sel_menu_get_row_fetch_res_tms);

?>
<div class="testimonials-bg">
  <div class="wrapper">
    <div class="testimonials-section">
      <div class="testimonials-wrap-1">
        <h6>commendation</h6>
        <h2>Success Testimonials</h2>
        
        <!--Start-->
        
        <section class="testimonials-slider">
          <ul class="testimonialsslider">
          <?php $i=1; while($row_faq_tms = mysqli_fetch_object($sel_menu_get_row_fetch_res_tms)){?>
            <li class="m-items main-pos" id="<?php echo $i ?>">
              <div class="testimonial-box">
                <div class="testimonials-thumb"><img src="uploades/<?php echo $row_faq_tms->profile ?>" alt="Thumb"></div>
                <h4><?php echo ucfirst($row_faq_tms->uname) ?> - <?php echo ucfirst($row_faq_tms->designation) ?></h4>
                <?php echo stripslashes(html_entity_decode($row_faq_tms->content))  ?>
                <div class="rating-1">
                  <img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"></div>
              </div>
            </li>
          <?php $i++; } ?>
            <!--<li class="m-items main-pos" id="1">
              <div class="testimonial-box">
                <div class="testimonials-thumb"><img src="images/testimonials-thumb.png" alt="Student" loading="lazy" decoding="async"></div>
                <h4>Dr Sanjeev Nampally - Principal, Fortune Butterfly school</h4>
                <p>“We are amazed by the impact Edueme Research Lab has had on our children! The trainers are passionate, patient, and truly dedicated to helping students learn through creativity and fun. Watching them build and program real robots with such excitement is incredible. Edueme’s positive and encouraging environment has boosted their confidence and curiosity — turning learning into a joyful adventure. Truly one of the best educational experiences we’ve seen!”</p>
                <div class="rating-1"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"></div>
              </div>
            </li>
            <li class="m-items right-pos" id="2">
              <div class="testimonial-box">
                <div class="testimonials-thumb"><img src="images/lady.png" alt="Instructor" loading="lazy" decoding="async"></div>
                <h4>Divya Marru - Principal, Arka International school</h4>
                <p>“Our experience with Edueme Research Lab over the past three years has been truly exceptional. The instructors are highly skilled and make even the most complex robotics concepts easy to understand. Students get hands-on training with real robots, which has greatly enhanced their practical learning. The team maintains a friendly and supportive environment where students feel encouraged to explore, create, and innovate. Edueme Research Lab has consistently provided excellent coaching, practical exposure, and a positive learning atmosphere throughout our journey.”</p>
                <div class="rating-1"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"></div>
              </div>
            </li>
            <li class="m-items back-pos" id="3">
              <div class="testimonial-box">
                <div class="testimonials-thumb"><img src="images/lady.png" alt="Instructor" loading="lazy" decoding="async"></div>
                <h4>Tanupreet Kaur - Principal, Takshashila Public School</h4>
                <p>“We adore Edueme Research Lab's robotics teaching. Good lecturers simplify complicated ideas. Pupils practise with real robots. Students are friendly, and instructors answer questions. This robotics education service has exceptional coaching, hands-on learning, and a welcoming community.”</p>
                <div class="rating-1"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"></div>
              </div>
            </li>
            <li class="m-items back-pos" id="4">
              <div class="testimonial-box">
                <div class="testimonials-thumb"><img src="images/testimonials-thumb.png" alt="Student" loading="lazy" decoding="async"></div>
                <h4>Mr. Raja Reddy - Principal, Genesis International School</h4>
                <p>“Edueme Research Lab's robotics education program has been instrumental in creating the future's youngest innovators. The instructors are knowledgeable, experienced, and passionate, engaging students of all ages and making learning fun and exciting. The program emphasizes empowering young minds to think creatively and innovate, encouraging them to take risks and push boundaries, resulting in students developing a sense of confidence and a can-do attitude that will serve them well in their future endeavors.”</p>
                <div class="rating-1"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"></div>
              </div>
            </li>
            <li class="m-items back-pos" id="5">
              <div class="testimonial-box">
                <div class="testimonials-thumb"><img src="images/testimonials-thumb.png" alt="Student" loading="lazy" decoding="async"></div>
                <h4>Mr. Rajashekhar Reddy - Director, Gateway International School</h4>
                <p>“Edueme Research Lab has truly redefined the way our students experience learning. Their robotics and AI training programs go far beyond textbooks — they ignite curiosity, critical thinking, and creativity in every child. The trainers are exceptionally skilled, ensuring that even the most complex concepts are taught in an engaging and practical manner. We’ve witnessed remarkable growth in our students’ confidence and problem-solving abilities since partnering with Edueme. Their commitment to innovation and quality education makes them an invaluable partner in shaping future-ready learner.”</p>
                <div class="rating-1"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"></div>
              </div>
            </li>
            <li class="m-items back-pos" id="6">
              <div class="testimonial-box">
                <div class="testimonials-thumb"><img src="images/lady.png" alt="Instructor" loading="lazy" decoding="async"></div>
                <h4>B Jayashree, Principal of International Delhi Public School</h4>
                <p>“Partnering with Edueme Research Lab has been one of the best decisions for our school. Their robotics and AI programs bring a perfect balance of innovation, creativity, and real-world application into our classrooms. The Edueme team’s passion and professionalism are evident in every session — our students are not just learning technology, they’re developing leadership, collaboration, and problem-solving skills for the future. We are proud to be associated with an organization that truly empowers young minds to innovate and excel.”</p>
                <div class="rating-1"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"><img src="images/star.png" alt="star"></div>
              </div>
            </li>-->
          </ul>
          <span>
          <input type="button" value="" id="prev">
          <input type="button" value="" id="next">
          </span> </section>
      </div>
    </div>
  </div>
</div>
<?php
$sel_menu_get_row_fetch_hblog= "SELECT * FROM tbl_main_menu WHERE  menuSulg = 'home-blog'";
$sel_menu_get_row_fetch_res_hblog =  mysqli_query($con,$sel_menu_get_row_fetch_hblog);
$sel_menu_get_row_fetch_res_final_hblog = mysqli_fetch_object($sel_menu_get_row_fetch_res_hblog);

?>

<div class="ourblog-bg">
  <div class="blue-strip-2"><img src="images/blue-strip-2.png" alt="blue-strip"></div>
  <div class="wrapper">
    <div class="ourblog-sec">
      <div class="ourblog-1">
        <div class="ourblog-2-subsection">
          <div class="ourblog-2-1">
          <?php 
          $num = 0;
$sel_menu_get_row_fetch_rs_sblog = "SELECT * FROM tbl_pages WHERE  pageMenuId =  $sel_menu_get_row_fetch_res_final_hblog->menuId";
$sel_menu_get_row_fetch_rs_esblog=  mysqli_query($con,$sel_menu_get_row_fetch_rs_sblog);
while($sel_menu_get_row_fetch_res_rs_esblog = mysqli_fetch_object($sel_menu_get_row_fetch_rs_esblog)){
   ?>
            <div class="blog-card-1">
              <div class="blog-card-img"><img src="uploades/<?php echo $sel_menu_get_row_fetch_res_rs_esblog->pageImage ?>" alt="Exercitationem ulla cororis aboriosam"></div>
              <div class="blog-card-data">
                <h4><?php echo $sel_menu_get_row_fetch_res_rs_esblog->pageHeading ?></h4>
                <div class="blog-date"><img src="images/calender-icon-1.png" alt="calender"><?php echo $sel_menu_get_row_fetch_res_rs_esblog->tagline ?></div>
              </div>
            </div>
      <?php 
      if($num % 2){
        echo '</div>';
        echo '<div class="ourblog-2-1">';
      }
      $num++;
     }  ?>
            <!-- <div class="blog-card-1">
              <div class="blog-card-img"><img src="images/blog-thumb-1b.png" alt="Nihil molestiae cose atu vel illum sui"></div>
              <div class="blog-card-data">
                <h4>How Artificial Intelligence helps changing our daily lives?</h4>
                <div class="blog-date"><img src="images/calender-icon-1.png" alt="calender"> Starts on 18 march 2023</div>
              </div>
            </div> -->
          <!-- </div> -->
          
          <!-- <div class="ourblog-2-1">
            <div class="blog-card-1">
              <div class="blog-card-img"><img src="images/ai.png" alt="Suscipit laboriosa nisi ut aliuid exea"></div>
              <div class="blog-card-data">
                <h4>How Edueme helps building Young generations towards greater Innovators?</h4>
                <div class="blog-date"><img src="images/calender-icon-1.png" alt="calender"> Starts on 02 April 2023</div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <?php
$sel_menu_get_row_fetch_chr= "SELECT * FROM tbl_main_menu WHERE  menuSulg = 'home-Chronicle'";
$sel_menu_get_row_fetch_res_chr =  mysqli_query($con,$sel_menu_get_row_fetch_chr);
$sel_menu_get_row_fetch_res_final_chr = mysqli_fetch_object($sel_menu_get_row_fetch_res_chr);

?>
      
  </div>
  <div class="ourblog-2">
        <h6>chronicle</h6>
        <?php echo stripslashes(html_entity_decode($sel_menu_get_row_fetch_res_final_chr->menuContent))  ?>
        <!--<a href="#" class="button-2">View all blogs</a>--> </div>
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
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script> 
<script src="js/bootstrap.bundle.min.js"></script> 
<script src="js/scripts.js"></script> 
<script src="js/jquery.touchSwipe.min.js"></script> 
<script id="rendered-js" >
//slideshow style interval
var autoSwap = setInterval(swap, 3500);

//pause slideshow and reinstantiate on mouseout
$('section.testimonials-slider ul, section.testimonials-slider span').hover(
function () {
  clearInterval(autoSwap);
},
function () {
  autoSwap = setInterval(swap, 3500);
});

//global variables
var items = [];
var startItem = 1;
var position = 0;
var itemCount = $('.testimonialsslider li.m-items').length;
var leftpos = itemCount;
var resetCount = itemCount;

//unused: gather text inside items class
$('section.testimonials-slider li.m-items').each(function (index) {
  items[index] = $(this).text();
});

//swap images function
function swap(action) {
  var direction = action;

  //moving testimonialsslider backwards
  if (direction == 'counter-clockwise') {
    var leftitem = $('.left-pos').attr('id') - 1;
    if (leftitem == 0) {
      leftitem = itemCount;
    }

    $('.right-pos').removeClass('right-pos').addClass('back-pos');
    $('.main-pos').removeClass('main-pos').addClass('right-pos');
    $('.left-pos').removeClass('left-pos').addClass('main-pos');
    $('#' + leftitem + '').removeClass('back-pos').addClass('left-pos');

    startItem--;
    if (startItem < 1) {
      startItem = itemCount;
    }
  }

  //moving testimonialsslider forward
  if (direction == 'clockwise' || direction == '' || direction == null) {
    function pos(positionvalue) {
      if (positionvalue != 'leftposition') {
        //increment image list id
        position++;

        //if final result is greater than image count, reset position.
        if (startItem + position > resetCount) {
          position = 1 - startItem;
        }
      }

      //setting the left positioned item
      if (positionvalue == 'leftposition') {
        //left positioned image should always be one left than main positioned image.
        position = startItem - 1;

        //reset last image in list to left position if first image is in main position
        if (position < 1) {
          position = itemCount;
        }
      }

      return position;
    }

    $('#' + startItem + '').removeClass('main-pos').addClass('left-pos');
    $('#' + (startItem + pos()) + '').removeClass('right-pos').addClass('main-pos');
    $('#' + (startItem + pos()) + '').removeClass('back-pos').addClass('right-pos');
    $('#' + pos('leftposition') + '').removeClass('left-pos').addClass('back-pos');

    startItem++;
    position = 0;
    if (startItem > itemCount) {
      startItem = 1;
    }
  }
}

//next button click function
$('#next').click(function () {
  swap('clockwise');
});

//prev button click function
$('#prev').click(function () {
  swap('counter-clockwise');
});

//if any visible items are clicked
$('section.testimonials-slider li').click(function () {
  if ($(this).attr('class') == 'm-items left-pos') {
    swap('counter-clockwise');
  } else
  {
    swap('clockwise');
  }
});
//# sourceURL=pen.js
    </script>
</body>
</html>