<?php
$sqlfaq_nav = "SELECT * FROM tbl_main_menu WHERE status ='1' AND menu_display_header='1' ORDER BY menuOrder ASC";
$res_faq_nav =  mysqli_query($con,$sqlfaq_nav);
if (isset($_GET['pageid'])){
  $pageid = htmlspecialchars($_GET['pageid']);
}elseif(isset($_GET['mid'])){
  $pageid = htmlspecialchars($_GET['mid']);
}else{
  $pageid = "";
}


?>
<div class="nav-main">
                <div class="nav-button22"></div>
                <nav>
                  <ul>
                  <?php $i=1; while($row_faq_nav = mysqli_fetch_object($res_faq_nav)){?>
                    <?php
                     if($row_faq_nav->pageCheck == '1'){
                          $pagelink="pages.php?mid=$row_faq_nav->menuId";
                    }else{
                          $pagelink="$row_faq_nav->menuSulg?pageid=$row_faq_nav->menuId";
                    }
                    // determine active state: by menuId/pageid, fallback to Home when no pageid,
                    // and also allow pages to set $page (e.g. $page='contact') to match menuName
                    $isActive = false;
                    if ($row_faq_nav->menuId == $pageid) {
                        $isActive = true;
                    } elseif ($pageid == "" && $row_faq_nav->menuName == 'Home') {
                        $isActive = true;
                    } elseif (isset($page) && strtolower($page) == strtolower($row_faq_nav->menuName)) {
                        $isActive = true;
                    }

                    $liClass = $isActive ? 'active' : '';
                    $aClass = $isActive ? 'active' : '';
                    ?>
                    <li class="<?php echo $liClass ?>"><a href="<?php echo $pagelink ?>" class="<?php echo $aClass ?>"><?php echo ucfirst($row_faq_nav->menuName) ?></a></li>

                  <?php $i++; } ?>
                    <!-- <li><a href="About.html">About</a></li>
                    <li><a href="Services.html">Services</a></li>
                    <li><a href="Courses.html">Courses</a></li>
                    <li><a href="Events.html">Events</a></li>
                    <li><a href="Contact.html">Contact</a></li> -->
                    <li class="<?php echo ($page=='shop' ? 'active' : ''); ?> ctawrap">
                      <a href="under-maintenance.html" class="nav-link <?php echo ($page=='shop' ? 'active' : ''); ?> cta-shop">Shop NOW</a>
                    </li>
                  </ul>
                </nav>
              </div>