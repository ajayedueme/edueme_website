<div id="top" class="clearfix">
	<div class="applogo">
        <a href="dashboard.php" class="logo"><img src="../images/logo.png" alt="icon" width="75%"></a>
    </div>
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <ul class="top-right">
		<li class="dropdown link">
		  <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="img/placeholder-img.png" alt="img"><b><?php echo $_SESSION['admin_rquest_name'];?></b><span class="caret"></span></a>
			<ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
			  <li><a href="changepassword.php"><i class="fa falist fa-key"></i> Change Password</a></li>
			  <li><a href="logout.php"><i class="fa falist fa-power-off"></i> Logout</a></li>
			</ul>
		</li>
	</ul>
</div>