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
        
        <?php
        $sqlfaq_nav_footer = "SELECT * FROM tbl_main_menu WHERE status ='1' AND menu_display_header='1' ORDER BY menuOrder ASC";
        $sqlfaq_nav_footer_s =  mysqli_query($con,$sqlfaq_nav_footer);
        $i=1; while($row_faq_nav_footer = mysqli_fetch_object($sqlfaq_nav_footer_s)){ 
            if($row_faq_nav_footer->pageCheck == '1'){
                $pagelink="pages.php?mid=$row_faq_nav_footer->menuId";
          }else{
                $pagelink="$row_faq_nav_footer->menuSulg?pageid=$row_faq_nav_footer->menuId";
          }
            ?>
          <li><a href="<?php echo $pagelink ?>""><?php echo $row_faq_nav_footer->menuName ?></a></li>
        <?php } ?>
          <!-- <li><a href="Services.html">Services</a></li>
          <li><a href="Courses.html">Courses</a></li>
          <li><a href="Events.html">Events</a></li>
          <li><a href="Contact.html">Contact</a></li> -->
        </ul>
      </div>
      <div class="footer-2">
        <h3>Information</h3>
        <ul>
        <?php
        $sqlfaq_nav_footer_one = "SELECT * FROM tbl_main_menu WHERE status ='1' AND menu_display_footer='1' ORDER BY menuOrder ASC";
        $sqlfaq_nav_footer_s_one =  mysqli_query($con,$sqlfaq_nav_footer_one);
        $i=1; while($row_faq_nav_footer_one = mysqli_fetch_object($sqlfaq_nav_footer_s_one)){ 
          //   if($row_faq_nav_footer_one->pageCheck == '1'){
          //       $pagelink_one="page-footer.php?mid=$row_faq_nav_footer_one->menuId";
          // }else{
          //       $pagelink_one="$row_faq_nav_footer_one->menuSulg?pageid=$row_faq_nav_footer_one->menuId";
          // }
            ?>
          <li><a href="page-footer.php?pageid=<?php echo $row_faq_nav_footer_one->menuId ?>"><?php echo $row_faq_nav_footer_one->menuName ?></a></li>

        <?php } ?>
          <!-- <li><a href="under-maintenance.html">Privacy policy</a></li>
          <li><a href="under-maintenance.html">Terms of service</a></li>
          <li><a href="under-maintenance.html">Membership</a></li>
          <li><a href="under-maintenance.html">Contact Us</a></li> -->
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