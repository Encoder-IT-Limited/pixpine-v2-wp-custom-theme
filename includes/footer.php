<!-- Log in Modal -->
<?php include get_template_directory() .'/includes/login.php';?>


<!-- Signup Modal -->
<?php include get_template_directory() .'/includes/signup.php';?>


<footer>
      <div class="footer_menu_col">
        <div class="container">
          <div class="menu_inner_col">
            <div class="item">
              <h3>Legal</h3>
              <ul>
                <li><a href="terms-and-conditions.php">Terms & Conditions</a></li>
                <li><a href="policy.php">Privacy Policy</a></li>
                <li><a href="license.php">Licenses</a></li>
              </ul>
            </div>
            <div class="item">
              <h3>Mockups Categories</h3>
              <ul>
                <li><a href="free-mockups.php">Free Mockups</a></li>
                <li><a href="premium-mockups.php">Premium Mockup</a></li>
                <li><a href="bundle-mockups.php">Bundle Mockups</a></li>
              </ul>
            </div>
            <div class="item">
              <h3>Support</h3>
              <ul>
                <li><a href="contact-us.php">Tutorials</a></li>
                <li><a href="contact-us.php">Contact us</a></li>
                <li><a href="subscription.php#faq">FAQ</a></li>
              </ul>
            </div>
            <div class="item subscribe_col">
              <div class="inner_col">
                <h2>Download Unlimited Mockups</h2>
                <p>As low as $0.14 a mockup</p>
                <div
                  class="btn_subscribe_cont d-flex justify-content-between align-items-center"
                >
                  <span>$14.00/mo</span>
                  <a class="btn_primary _btn" href="subscription.php">
                    Get premium
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer_last_col">
        <div class="container">
          <div class="last_inner_container d-flex justify-content-between">
            <div class="copyright_text d-flex">
              <a id="desktop_footer_logo" href="index.php">
                <img class="footer_logo" src="<?php echo get_template_directory_uri();?>/assets/images/footer_logo.png" alt="" />
              </a>
              <p>
                ©2019 - 2023 <a href="index.php">Pixpine</a> - All rights
                reserved
              </p>
            </div>
            <ul class="d-flex social_link">
              <li>
                <a target="_blank" href="https://www.youtube.com/">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/youtube.png" alt="" />
                </a>
              </li>
              <li>
                <a target="_blank" href="https://www.pinterest.com/">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/pinterest.png" alt="" />
                </a>
              </li>
              <li>
                <a target="_blank" href="https://www.instagram.com/">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/instagram.png" alt="" />
                </a>
              </li>
              <li>
                <a target="_blank" href="https://twitter.com/">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/twitter.png" alt="" />
                </a>
              </li>
              <li>
                <a target="_blank" href="https://www.behance.net/">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/behance.png" alt="" />
                </a>
              </li>
              <li>
                <a target="_blank" href="https://www.facebook.com/">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/facebook.png" alt="" />
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>