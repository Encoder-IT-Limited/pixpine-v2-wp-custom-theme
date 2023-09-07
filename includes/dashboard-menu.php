<div class="mobule_nav_tabs_button">
  Account info
  <img src="<?php echo get_template_directory_uri();?>/assets/images/tab_down_arrow.png" alt="">
</div>
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link <?php if($currentPage =='my__account'){echo 'active';}?>" href="user-dashboard-my-account.php">
      My Account
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($currentPage =='billing__information'){echo 'active';}?>" href="user-dashboard-billing-information.php">
      Billing Information
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($currentPage =='dashboard__downloads'){echo 'active';}?>" href="user-dashboard-downloads.php"> Downloads </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($currentPage =='dashboard__subscription'){echo 'active';}?>" href="user-dashboard-subscription-monthly.php">
      Subscription
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($currentPage =='dashboard__likes'){echo 'active';}?>" href="user-dashboard-likes-premium-mockups.php">
      Likes
    </a>
  </li>
</ul>
