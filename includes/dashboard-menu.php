<div class="mobule_nav_tabs_button">
  Account info
  <img src="<?php echo get_template_directory_uri();?>/assets/images/tab_down_arrow.png" alt="">
</div>
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link <?php if($currentPage =='my__account'){echo 'active';}?>" href="<?php echo site_url('my-account');?>">
      My Account
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($currentPage =='billing__information'){echo 'active';}?>" href="<?php echo site_url('billing-information');?>">
      Billing Information
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($currentPage =='dashboard__downloads'){echo 'active';}?>" href="<?php echo site_url('downloads');?>"> Downloads </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($currentPage =='dashboard__subscription'){echo 'active';}?>" href="<?php echo site_url('subscription-monthly');?>">
      Subscription
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($currentPage =='dashboard__likes'){echo 'active';}?>" href="<?php echo site_url('liked-mockups');?>">
      Likes
    </a>
  </li>
</ul>
