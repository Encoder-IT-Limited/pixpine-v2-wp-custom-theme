<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package PixPine
 */

get_header();
$search_keyword = (isset($_GET['s'])) ? $_GET['s'] : '';
$type = (isset($_GET['type'])) ? $_GET['type'] : 'all-categories';
?>
<!-- Header End -->
<main>
      <section class="banner_section">
        <div class="container">
          <!-- Banner search form -->
          <?php include get_template_directory() .'/includes/search-form.php';?>
        </div>
      </section>

      <?php
      if($type == 'all-categories' || $type == 'premium-mockup'){
      ?>
        <section id="premium_mockups" class="recently_added_premium_mockups">
          <div class="container">
            <div class="heading_col text-center">
              <h2 class="section_heading">Recently Added Premium Mockups</h2>
            </div>
            <div class="tab_img_container">
              <div class="tab-content">
                <div
                  class="tab-pane fade show active"
                  id="business_cards"
                  role="tabpanel"
                  aria-labelledby="business_cards_tab"
                >
                  <div class="tab_inner_content">
                    <div class="card_container row_d justify-content-center home-premium-products">
                    <?php
                    $args = array(
                      'post_type' => 'product', // Replace with the name of your CPT
                      'posts_per_page' => -1, // Number of posts to display (adjust as needed)
                      'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
                      's'         => $search_keyword, 
                      'tax_query' => array(
                        array(
                            'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                            'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                            'terms' => 'premium-mockups', // Replace with the slug of the custom category term you want to query
                        ),
                      ),
                    );

                    $custom_query = new WP_Query($args);

                    if ($custom_query->have_posts()) {
                      while ($custom_query->have_posts()) {
                        $custom_query->the_post();
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
                        // $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                      ?>

                      <!-- <div type="button" data-bs-toggle="modal" data-bs-target="#premiumModal" class="card_item" > -->
                        <div type="button" class="card_item premium-mockup-single" p-id="<?php echo get_the_ID();?>">
                          <a href="<?php echo site_url('premium-mockup-single-product');?>?id=<?php echo get_the_ID();?>">
                            <div class="item_a">
                              <div class="inner_col">
                                <div class="img_col pixpine_card_border">
                                  <img src="<?php echo $thumbnail_url;?>" alt="" />
                                </div>
                                <div class="text_col">
                                  <h4 class="default_color">
                                  <?php echo get_the_title();?>
                                  </h4>
                                  <p class="primary_color">Premium</p>
                                </div>
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
                      echo 'No product found.';
                    }
                    ?>
                    </div>
                    <!-- <div class="text-end">
                      <a class="btn_primary _btn" href="<?php echo site_url('premium-mockups');?>"
                        >View All</a
                      >
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php
      }
      if($type == 'all-categories' || $type == 'free-mockup'){
      ?>            
        <section id="free_mockups" class="recently_added_free_mockups">
          <div class="container">
            <div class="heading_col text-center">
              <h2 class="section_heading">Recently Added Free Mockups</h2>
            </div>
            <div class="tab_img_container">
              <div class="tab-content">
                <div
                  class="tab-pane fade show active"
                  id="business_cards_free"
                  role="tabpanel"
                  aria-labelledby="business_cards_tab_free"
                >
                  <div class="tab_inner_content">
                    <div class="card_container row_d justify-content-center home-free-products">
                    <?php
                    $args = array(
                      'post_type' => 'product', // Replace with the name of your CPT
                      'posts_per_page' => -1, // Number of posts to display (adjust as needed)
                      'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
                      's'         => $search_keyword, 
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
                      while ($custom_query->have_posts()) {
                        $custom_query->the_post();
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
                        // $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                      ?>
                      <div class="card_item">
                        <a href="<?php echo site_url('free-mockup-product');?>?id=<?php echo get_the_ID();?>">
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
                    <!-- <div class="text-end">
                      <a class="btn_primary _btn" href="<?php echo site_url('free-mockups');?>">View All</a>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php
      }
      if($type == 'all-categories' || $type == 'bundle-mockups'){
      ?>    
        <section id="bundle_mockups" class="bundle_mockups_yearly_subscription recently_added_free_mockups ">
          <div class="container">
            <div class="heading_col text-center">
              <h2 class="section_heading">Recently Added Bundle Mockups</h2>
            </div>
            <div class="inner_content">
              <div
                class="card_container row_d justify-content-center align-items-stretch"
              >

                <?php
                $args = array(
                  'post_type' => 'product', // Replace with the name of your CPT
                  'posts_per_page' => -1, // Number of posts to display (adjust as needed)
                  'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
                  's'         => $search_keyword, 
                  'tax_query' => array(
                    array(
                        'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                        'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                        'terms' => 'bundle-mockups', // Replace with the slug of the custom category term you want to query
                    ),
                  ),
                );

                $custom_query = new WP_Query($args);

                if ($custom_query->have_posts()) {
                  while ($custom_query->have_posts()) {
                    $custom_query->the_post();
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
                    // $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                  ?>
                    <div class="card_item">
                      <a href="<?php echo site_url('bundle-mockup-single-product');?>?id=<?php echo get_the_ID();?>">
                        <div type="button" >
                        <!-- <div type="button" data-bs-toggle="modal" data-bs-target="#bundleModal"> -->
                          <div class="inner_col pixpine_card_border">
                            <img src="<?php echo $thumbnail_url;?>" alt="" />
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
                  echo 'No product found.';
                }
                ?>
              </div>
              <!-- <div class="text-end">
                <a class="btn_primary _btn" href="<?php echo site_url('bundle-mockups');?>">View All</a>
              </div> -->
            </div>
          </div>
        </section>
      <?php
      }
      ?>  
      <!-- Never miss out form section -->
      <?php include 'includes/never-miss-out-form.php';?>
    </main>

<!-- Footer -->
<?php get_footer();?>
