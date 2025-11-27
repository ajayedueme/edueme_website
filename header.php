<?php if(!isset($page)) { $page = ''; } ?>
<?php
// Compute base URL for header links if not already defined (keeps nav-menu and header consistent)
if (!isset($baseUrl)) {
  $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\\/');
  if ($baseUrl === '' || $baseUrl === '.') {
    $baseUrl = '/';
  } else {
    $baseUrl = $baseUrl . '/';
  }
}
?>
<header>
      <div class="wrapper">
        <div class="tz-t1">
          <div class="tz-r1">
            <div class="tz-c1"><a class="logoOuter" href="<?php echo $baseUrl; ?>index.php"><img src="images/logo.png" class="logo-div" alt="logo" width="170" /></a></div>
            <div class="tz-c1">
            <?php include "nav-menu.php" ?>
            </div>
          </div>
        </div>
      </div>
    </header>