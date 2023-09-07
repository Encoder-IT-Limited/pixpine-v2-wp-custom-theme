<?php 
/*
Template Name: Free Mockups Download
*/
get_header();
?>

<main>
      <section class="banner_section">
        <div class="container">
          
          <!-- Banner search form -->
          <?php include get_template_directory() .'/includes/search-form.php';?>

          
        </div>
      </section>
      <section class="free_download_page_main_section free_product_section">
        <div class="container">
          <div class="row_d">
            <div class="free_product_main_col left_col">
              <div class="inner_col">
                <div class="google_ad_download_btn_container">
                  <div class="google_ad">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/google_ad_h117.png" alt="" />
                  </div>
                  <div class="free_download_btn_contianer text-center">
                    <p>Your download link should be ready in 10 second</p>
                    <button class="_btn btn_primary">DOWNLOAD</button>
                  </div>
                  <div class="google_ad">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/google_ad_h117.png" alt="" />
                  </div>
                </div>
                
                <!-- Never miss out form section -->
                <?php include get_template_directory() .'/includes/never-miss-out-form.php';?>

                <div class="related_mockups_col">
                  <div class="section_heading_container">
                    <h2 class="section_heading">Related Mockups</h2>
                  </div>
                  <div class="related_inner_col">
                    <div class="row_d">
                      <div class="card_item">
                        <a href="">
                          <div class="card_inner pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                        </a>
                      </div>
                      <div class="card_item">
                        <a href="">
                          <div class="card_inner pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                        </a>
                      </div>
                      <div class="card_item">
                        <a href="">
                          <div class="card_inner pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                        </a>
                      </div>
                      <div class="card_item">
                        <a href="">
                          <div class="card_inner pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                        </a>
                      </div>
                      <div class="card_item">
                        <a href="">
                          <div class="card_inner pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                        </a>
                      </div>
                      <div class="card_item">
                        <a href="">
                          <div class="card_inner pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                        </a>
                      </div>
                      <div class="card_item">
                        <a href="">
                          <div class="card_inner pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                        </a>
                      </div>
                      <div class="card_item">
                        <a href="">
                          <div class="card_inner pixpine_card_border">
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="free_business_card_col right_col">
              <div class="content_col sticky-top">
                <div class="google_add">
                  <img
                    id="desktop_ad"
                    src="<?php echo get_template_directory_uri();?>/assets/images/google_ad_long_height.png"
                    alt=""
                  />
                  <img id="mobile_ad" src="<?php echo get_template_directory_uri();?>/assets/images/google_ad_h117.png" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<!-- Footer -->
<?php get_footer();?>
