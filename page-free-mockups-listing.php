<?php 
/*
Template Name: Free Mockups Listing
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
  <section class="affiliate_ad">
    <div class="container">
      <div class="section_width">
        <img src="<?php echo get_template_directory_uri();?>/assets/images/affiliate_ad.png" alt="" />
      </div>
    </div>
  </section>
  <section id="free_mockups_page" class="recently_added_free_mockups">
    <div class="container">
      <div class="heading_col text-center">
        <h1 class="section_heading">
          100% free mockups download directly to your desktop
        </h1>
        <p>
          These freebies are exclusively available only on Pixpine.com, you can
          use our free mockups for commercial and personal projects.
        </p>
      </div>
      <div class="separetor_container">
        <div class="separetor"></div>
      </div>
      <div class="tab_img_container">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button
              class="nav-link active"
              id="business_cards_tab_free"
              data-bs-toggle="tab"
              data-bs-target="#business_cards_free"
              type="button"
              role="tab"
              aria-controls="business_cards_free"
              aria-selected="true"
            >
              Business Cards
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="brochure_tab_free"
              data-bs-toggle="tab"
              data-bs-target="#brochure_free"
              type="button"
              role="tab"
              aria-controls="brochure_free"
              aria-selected="false"
            >
              Brochure
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="flyers_tab_free"
              data-bs-toggle="tab"
              data-bs-target="#flyers_free"
              type="button"
              role="tab"
              aria-controls="flyers_free"
              aria-selected="false"
            >
              Flyers
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="stationery_tab_free"
              data-bs-toggle="tab"
              data-bs-target="#stationery_free"
              type="button"
              role="tab"
              aria-controls="stationery_free"
              aria-selected="false"
            >
              Stationery
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="boxes_tab_free"
              data-bs-toggle="tab"
              data-bs-target="#boxes_free"
              type="button"
              role="tab"
              aria-controls="boxes_free"
              aria-selected="false"
            >
              Boxes
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="packaging_tab_free"
              data-bs-toggle="tab"
              data-bs-target="#packaging_free"
              type="button"
              role="tab"
              aria-controls="packaging_free"
              aria-selected="false"
            >
              Packaging
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="books_tab_free"
              data-bs-toggle="tab"
              data-bs-target="#books_free"
              type="button"
              role="tab"
              aria-controls="books_free"
              aria-selected="false"
            >
              Books
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="apparel_tab_free"
              data-bs-toggle="tab"
              data-bs-target="#apparel_free"
              type="button"
              role="tab"
              aria-controls="apparel_free"
              aria-selected="false"
            >
              Apparel
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="billboard_tab_free"
              data-bs-toggle="tab"
              data-bs-target="#billboard_free"
              type="button"
              role="tab"
              aria-controls="billboard_free"
              aria-selected="false"
            >
              Billboard
            </button>
            <div class="dropdown">
              <button
                class="dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <img src="<?php echo get_template_directory_uri();?>/assets/images/tab_down_arrow.png" alt="" />
              </button>

              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="">Cup</a></li>
                <li><a class="dropdown-item" href="">Cosmetic</a></li>
                <li><a class="dropdown-item" href="">Flyers</a></li>
                <li><a class="dropdown-item" href="">Frame</a></li>
                <li><a class="dropdown-item" href="">Packaging</a></li>
                <li><a class="dropdown-item" href="">Poster</a></li>
                <li><a class="dropdown-item" href="">Shopping Bag</a></li>
                <li><a class="dropdown-item" href="">Stationery</a></li>
              </ul>
            </div>
          </li>
        </ul>
        <div class="tab-content">
          <div
            class="tab-pane fade show active"
            id="business_cards_free"
            role="tabpanel"
            aria-labelledby="business_cards_tab_free"
          >
            <div class="tab_inner_content">
              <div class="card_container row_d justify-content-center">
                <?php
                $args = array(
                  'post_type' => 'product', // Replace with the name of your CPT
                  'posts_per_page' => 10, // Number of posts to display (adjust as needed)
                  'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
                  'tax_query' => array(
                    array(
                        'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                        'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                        'terms' => 'free-mockups', // Replace with the slug of the custom category term you want to query
                    ),
                  ),
                );

                $custom_query = new WP_Query($args);

                if ($custom_query->have_posts()) {
                  $count = 0;
                  while ($custom_query->have_posts()) {
                    $custom_query->the_post();
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
                    // $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                  ?>
                    <?php
                    $count++;
                    if($count ==1){
                    ?>
                      <div class="card_item get_off">
                        <div class="inner_col">
                          <div class="get_premium_mockups_section">
                            <div
                              class="premium_mockups_inner d-flex justify-content-between align-items-center"
                            >
                              <div class="premium_text">
                                <h2
                                  class="section_heading section_heading_primary section_heading_bold"
                                >
                                  Get 96% Off
                                  <span class="section_heading_medium default_color"
                                    >on premium mockups</span
                                  >
                                </h2>
                                <span class="primary_color"
                                  >As low as $0.14 a mockup</span
                                >
                                <a href="<?php echo site_url('get-subscription');?>" class="btn_primary _btn"
                                  >Get premium</a
                                >
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php }elseif($count==7){ ?>
                      <div class="card_item ad">
                        <div class="inner_col">
                          <img src="<?php echo get_template_directory_uri();?>/assets/images/google_ad.png" alt="" />
                        </div>
                      </div>
                    <?php }elseif($count==12){ ?>
                      <div class="card_item ad">
                        <div class="inner_col">
                          <img src="<?php echo get_template_directory_uri();?>/assets/images/affiliate_ad_second.png" alt="" />
                        </div>
                      </div>
                    <?php } ?>
      
                    <div class="card_item">
                      <a href="<?php echo site_url('free-mockup-product');?>">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo $thumbnail_url;?>" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color"><?php echo get_the_title();?></h4>
                            <p class="primary_color">Free</p>
                          </div>
                        </div>
                      </a>
                    </div>

                <?php
                    }
                    // Restore the global post object
                    wp_reset_postdata();
                  } else {
                    // No posts found
                    echo 'No posts found.';
                  }
                  ?>
              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item left_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_left_icon.png" alt="" />
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">4</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">5</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">...100</a>
                  </li>
                  <li class="page-item right_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_right_icon.png" alt="" />
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="brochure_free"
            role="tabpanel"
            aria-labelledby="brochure_tab_free"
          >
            <div class="tab_inner_content">
              <div class="card_container row_d justify-content-center">
                <div class="card_item get_off">
                  <div class="inner_col">
                    <div class="get_premium_mockups_section">
                      <div
                        class="premium_mockups_inner d-flex justify-content-between align-items-center"
                      >
                        <div class="premium_text">
                          <h2
                            class="section_heading section_heading_primary section_heading_bold"
                          >
                            Get 96% Off
                            <span class="section_heading_medium default_color"
                              >on premium mockups</span
                            >
                          </h2>
                          <span class="primary_color"
                            >As low as $0.56 a mockup</span
                          >
                          <a href="<?php echo site_url('get-subscription');?>" class="btn_primary _btn"
                            >Get premium</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item ad">
                  <div class="inner_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/google_ad.png" alt="" />
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item ad">
                  <div class="inner_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/affiliate_ad_second.png" alt="" />
                  </div>
                </div>
              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item left_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_left_icon.png" alt="" />
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">4</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">5</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">...100</a>
                  </li>
                  <li class="page-item right_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_right_icon.png" alt="" />
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="flyers_free"
            role="tabpanel"
            aria-labelledby="flyers_tab_free"
          >
            <div class="tab_inner_content">
              <div class="card_container row_d justify-content-center">
                <div class="card_item get_off">
                  <div class="inner_col">
                    <div class="get_premium_mockups_section">
                      <div
                        class="premium_mockups_inner d-flex justify-content-between align-items-center"
                      >
                        <div class="premium_text">
                          <h2
                            class="section_heading section_heading_primary section_heading_bold"
                          >
                            Get 96% Off
                            <span class="section_heading_medium default_color"
                              >on premium mockups</span
                            >
                          </h2>
                          <span class="primary_color"
                            >As low as $0.56 a mockup</span
                          >
                          <a href="<?php echo site_url('get-subscription');?>" class="btn_primary _btn"
                            >Get premium</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item ad">
                  <div class="inner_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/google_ad.png" alt="" />
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item ad">
                  <div class="inner_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/affiliate_ad_second.png" alt="" />
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item left_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_left_icon.png" alt="" />
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">4</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">5</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">...100</a>
                  </li>
                  <li class="page-item right_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_right_icon.png" alt="" />
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="stationery_free"
            role="tabpanel"
            aria-labelledby="stationery_tab_free"
          >
            <div class="tab_inner_content">
              <div class="card_container row_d justify-content-center">
                <div class="card_item get_off">
                  <div class="inner_col">
                    <div class="get_premium_mockups_section">
                      <div
                        class="premium_mockups_inner d-flex justify-content-between align-items-center"
                      >
                        <div class="premium_text">
                          <h2
                            class="section_heading section_heading_primary section_heading_bold"
                          >
                            Get 96% Off
                            <span class="section_heading_medium default_color"
                              >on premium mockups</span
                            >
                          </h2>
                          <span class="primary_color"
                            >As low as $0.56 a mockup</span
                          >
                          <a href="<?php echo site_url('get-subscription');?>" class="btn_primary _btn"
                            >Get premium</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item ad">
                  <div class="inner_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/google_ad.png" alt="" />
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item ad">
                  <div class="inner_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/affiliate_ad_second.png" alt="" />
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item left_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_left_icon.png" alt="" />
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">4</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">5</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">...100</a>
                  </li>
                  <li class="page-item right_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_right_icon.png" alt="" />
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="boxes_free"
            role="tabpanel"
            aria-labelledby="boxes_tab_free"
          >
            <div class="tab_inner_content">
              <div class="card_container row_d justify-content-center">
                <div class="card_item get_off">
                  <div class="inner_col">
                    <div class="get_premium_mockups_section">
                      <div
                        class="premium_mockups_inner d-flex justify-content-between align-items-center"
                      >
                        <div class="premium_text">
                          <h2
                            class="section_heading section_heading_primary section_heading_bold"
                          >
                            Get 96% Off
                            <span class="section_heading_medium default_color"
                              >on premium mockups</span
                            >
                          </h2>
                          <span class="primary_color"
                            >As low as $0.56 a mockup</span
                          >
                          <a href="<?php echo site_url('get-subscription');?>" class="btn_primary _btn"
                            >Get premium</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item ad">
                  <div class="inner_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/google_ad.png" alt="" />
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item ad">
                  <div class="inner_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/affiliate_ad_second.png" alt="" />
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item left_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_left_icon.png" alt="" />
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">4</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">5</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">...100</a>
                  </li>
                  <li class="page-item right_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_right_icon.png" alt="" />
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="packaging_free"
            role="tabpanel"
            aria-labelledby="packaging_tab_free"
          >
            <div class="tab_inner_content">
              <div class="card_container row_d justify-content-center">
                <div class="card_item get_off">
                  <div class="inner_col">
                    <div class="get_premium_mockups_section">
                      <div
                        class="premium_mockups_inner d-flex justify-content-between align-items-center"
                      >
                        <div class="premium_text">
                          <h2
                            class="section_heading section_heading_primary section_heading_bold"
                          >
                            Get 96% Off
                            <span class="section_heading_medium default_color"
                              >on premium mockups</span
                            >
                          </h2>
                          <span class="primary_color"
                            >As low as $0.56 a mockup</span
                          >
                          <a href="<?php echo site_url('get-subscription');?>" class="btn_primary _btn"
                            >Get premium</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item left_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_left_icon.png" alt="" />
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">4</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">5</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">...100</a>
                  </li>
                  <li class="page-item right_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_right_icon.png" alt="" />
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="books_free"
            role="tabpanel"
            aria-labelledby="books_tab_free"
          >
            <div class="tab_inner_content">
              <div class="card_container row_d justify-content-center">
                <div class="card_item get_off">
                  <div class="inner_col">
                    <div class="get_premium_mockups_section">
                      <div
                        class="premium_mockups_inner d-flex justify-content-between align-items-center"
                      >
                        <div class="premium_text">
                          <h2
                            class="section_heading section_heading_primary section_heading_bold"
                          >
                            Get 96% Off
                            <span class="section_heading_medium default_color"
                              >on premium mockups</span
                            >
                          </h2>
                          <span class="primary_color"
                            >As low as $0.56 a mockup</span
                          >
                          <a href="<?php echo site_url('get-subscription');?>" class="btn_primary _btn"
                            >Get premium</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item ad">
                  <div class="inner_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/google_ad.png" alt="" />
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item ad">
                  <div class="inner_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/affiliate_ad_second.png" alt="" />
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item left_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_left_icon.png" alt="" />
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">4</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">5</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">...100</a>
                  </li>
                  <li class="page-item right_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_right_icon.png" alt="" />
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="apparel_free"
            role="tabpanel"
            aria-labelledby="apparel_tab_free"
          >
            <div class="tab_inner_content">
              <div class="card_container row_d justify-content-center">
                <div class="card_item get_off">
                  <div class="inner_col">
                    <div class="get_premium_mockups_section">
                      <div
                        class="premium_mockups_inner d-flex justify-content-between align-items-center"
                      >
                        <div class="premium_text">
                          <h2
                            class="section_heading section_heading_primary section_heading_bold"
                          >
                            Get 96% Off
                            <span class="section_heading_medium default_color"
                              >on premium mockups</span
                            >
                          </h2>
                          <span class="primary_color"
                            >As low as $0.56 a mockup</span
                          >
                          <a href="<?php echo site_url('get-subscription');?>" class="btn_primary _btn"
                            >Get premium</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item ad">
                  <div class="inner_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/google_ad.png" alt="" />
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item ad">
                  <div class="inner_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/affiliate_ad_second.png" alt="" />
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item left_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_left_icon.png" alt="" />
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">4</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">5</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">...100</a>
                  </li>
                  <li class="page-item right_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_right_icon.png" alt="" />
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="billboard_free"
            role="tabpanel"
            aria-labelledby="billboard_tab_free"
          >
            <div class="tab_inner_content">
              <div class="card_container row_d justify-content-center">
                <div class="card_item get_off">
                  <div class="inner_col">
                    <div class="get_premium_mockups_section">
                      <div
                        class="premium_mockups_inner d-flex justify-content-between align-items-center"
                      >
                        <div class="premium_text">
                          <h2
                            class="section_heading section_heading_primary section_heading_bold"
                          >
                            Get 96% Off
                            <span class="section_heading_medium default_color"
                              >on premium mockups</span
                            >
                          </h2>
                          <span class="primary_color"
                            >As low as $0.56 a mockup</span
                          >
                          <a href="<?php echo site_url('get-subscription');?>" class="btn_primary _btn"
                            >Get premium</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item ad">
                  <div class="inner_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/google_ad.png" alt="" />
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item ad">
                  <div class="inner_col">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/affiliate_ad_second.png" alt="" />
                  </div>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="card_item">
                  <a href="<?php echo site_url('free-mockup-product');?>">
                    <div class="inner_col">
                      <div class="img_col pixpine_card_border">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                      </div>
                      <div class="text_col">
                        <h4 class="default_color">Business Card Mockup</h4>
                        <p class="primary_color">Free</p>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <li class="page-item left_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_left_icon.png" alt="" />
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">4</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">5</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">...100</a>
                  </li>
                  <li class="page-item right_button">
                    <a class="page-link" href="#">
                      <img src="<?php echo get_template_directory_uri();?>/assets/images/pagination_right_icon.png" alt="" />
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Never miss out form section -->
  <?php include get_template_directory() .'/includes/never-miss-out-form.php';?>
</main>

<!-- Footer -->
<?php get_footer();?>
