<?php 
/*
Template Name: User Dashboard Likes Premium Mockups
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
  <section class="dashboard_section dashboard__likes">
    <div class="container">
      <div class="section_width">
        <div class="dashboard_main d-flex">
          <div class="dashboard_navbar">
            <!-- Dashboard inner menu -->
            <?php $currentPage = 'dashboard__likes'; include get_template_directory() .'/includes/dashboard-menu.php';?>
          </div>
          <div class="content__column">
            <div class="tab__container__main">
              <div class="dislike_nav_container d-flex justify-content-between">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link active"
                      id="premium_mockup_tab"
                      data-bs-toggle="tab"
                      data-bs-target="#premium_mockup"
                      type="button"
                      role="tab"
                      aria-controls="premium_mockup"
                      aria-selected="true"
                    >
                      Premium Mockup
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link"
                      id="bundle_mockups_tab"
                      data-bs-toggle="tab"
                      data-bs-target="#bundle_mockups"
                      type="button"
                      role="tab"
                      aria-controls="bundle_mockups"
                      aria-selected="false"
                      tabindex="-1"
                    >
                      Bundle Mockups
                    </button>
                  </li>
                </ul>
                <div class="dislike__btn__container">
                  <button class="_btn">Dislike All</button>
                </div>
              </div>
              <div class="tab-content">
                <div
                  class="tab-pane fade show active"
                  id="premium_mockup"
                  role="tabpanel"
                  aria-labelledby="premium_mockup_tab"
                >
                  <div class="tab_inner_content">
                    <div class="card_container row_d justify-content-center">
                      <div
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#premiumModal"
                        class="card_item"
                      >
                        <div class="item_a">
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Premium</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#premiumModal"
                        class="card_item"
                      >
                        <div class="item_a">
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Premium</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#premiumModal"
                        class="card_item"
                      >
                        <div class="item_a">
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Premium</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#premiumModal"
                        class="card_item"
                      >
                        <div class="item_a">
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Premium</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#premiumModal"
                        class="card_item"
                      >
                        <div class="item_a">
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Premium</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#premiumModal"
                        class="card_item"
                      >
                        <div class="item_a">
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Premium</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#premiumModal"
                        class="card_item"
                      >
                        <div class="item_a">
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Premium</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#premiumModal"
                        class="card_item"
                      >
                        <div class="item_a">
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Premium</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#premiumModal"
                        class="card_item"
                      >
                        <div class="item_a">
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Premium</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#premiumModal"
                        class="card_item"
                      >
                        <div class="item_a">
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Premium</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#premiumModal"
                        class="card_item"
                      >
                        <div class="item_a">
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Premium</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#premiumModal"
                        class="card_item"
                      >
                        <div class="item_a">
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Premium</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="likes__bundle__mockups tab-pane fade"
                  id="bundle_mockups"
                  role="tabpanel"
                  aria-labelledby="bundle_mockups_tab"
                >
                  <div class="tab_inner_content">
                    <div class="card_container row_d justify-content-center">
                      <div class="card_item">
                        <div
                          type="button"
                          data-bs-toggle="modal"
                          data-bs-target="#bundleModal"
                        >
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup te
                              </h4>
                              <p class="primary_color">Bundle</p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="card_item">
                        <div
                          type="button"
                          data-bs-toggle="modal"
                          data-bs-target="#bundleModal"
                        >
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Bundle</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card_item">
                        <div
                          type="button"
                          data-bs-toggle="modal"
                          data-bs-target="#bundleModal"
                        >
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Bundle</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card_item">
                        <div
                          type="button"
                          data-bs-toggle="modal"
                          data-bs-target="#bundleModal"
                        >
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Bundle</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card_item">
                        <div
                          type="button"
                          data-bs-toggle="modal"
                          data-bs-target="#bundleModal"
                        >
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Bundle</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card_item">
                        <div
                          type="button"
                          data-bs-toggle="modal"
                          data-bs-target="#bundleModal"
                        >
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Bundle</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card_item">
                        <div
                          type="button"
                          data-bs-toggle="modal"
                          data-bs-target="#bundleModal"
                        >
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Bundle</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card_item">
                        <div
                          type="button"
                          data-bs-toggle="modal"
                          data-bs-target="#bundleModal"
                        >
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                Business Card Mockup
                              </h4>
                              <p class="primary_color">Bundle</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- Bundle Modal -->
<?php include get_template_directory() .'/includes/bundle-modal.php';?>

<!-- Premium Modal -->
<?php include get_template_directory() .'/includes/premium-modal.php';?>

<!-- Footer -->
<?php get_footer();?>
