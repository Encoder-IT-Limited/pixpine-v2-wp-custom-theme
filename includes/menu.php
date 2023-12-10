<header>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid container">
      <a class="navbar-brand" href="<?php echo site_url();?>">
        <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" alt="" />
      </a>
      <div id="mobile_cart_btn">
        <ul class="d-flex align-items-center">
          <li class="nav-item">
            <a class="nav-link cart_icon" href="<?php echo site_url('cart');?>">
              <img class="cart_img" src="<?php echo get_template_directory_uri();?>/assets/images/cart_icon.png" alt="" />
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link user_icon" href="<?php echo site_url('my-account');?>">
              <img class="user_img" src="<?php echo get_template_directory_uri();?>/assets/images/user_icon.png" alt="" />
            </a>
          </li>
        </ul>
      </div>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar_mobile_icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('free-mockups');?>">Free Mockups</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('premium-mockups');?>">Premium Mockups</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('bundle-mockups');?>">Bundle Mockups</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('customized-mockup-request');?>">Customise Mockups</a>
          </li>

          <div id="mobile__btn__container">
            <li class="nav-item">
              <a
                class="_btn get_premium_btn btn_black_small btn_primary"
                href="<?php echo site_url('get-subscription');?>"
              >
                Get Premium
              </a>
            </li>
            <li class="nav-item">
              <a
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#signupModal"
                class="nav-link"
                >Sign up</a
              >
            </li>
          </div>
        </ul>
        <div id="login_signup">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a
                class="_btn get_premium_btn btn_black_small btn_primary"
                href="<?php echo site_url('get-subscription');?>"
              >
                Get Premium
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link cart_icon" href="<?php echo site_url('cart');?>">
                <img class="cart_img" src="<?php echo get_template_directory_uri();?>/assets/images/cart_icon.png" alt="" />
              </a>
            </li>
            <?php if(is_user_logged_in()){ ?>
            <li class="nav-item">
              <a
                class="nav-link user_icon"
                href="<?php echo site_url('my-account');?>"
              >
                <img class="user_img" src="<?php echo get_template_directory_uri();?>/assets/images/user_icon.png" alt="" />
              </a>
            </li>
            <?php }else{ ?>
              <li class="nav-item">
                <a
                type="button"
                class="nav-link"
                data-bs-toggle="modal"
                data-bs-target="#loginModal"
                >Log in</a
                >
              </li>
              <li class="nav-item">
                <a
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#signupModal"
                class="nav-link"
                >Sign up</a
                >
              </li>
              <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
