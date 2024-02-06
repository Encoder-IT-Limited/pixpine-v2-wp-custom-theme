<?php 
/*
Template Name: User Dashboard Liked Mockups
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
                  <button class="_btn alter-favorite" p-id="*" is-logged-in="1" is-favorite="1" type="*">Dislike All</button>
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
                    <div class="card_container row_d">

                      <?php
                      $user_id = get_current_user_id();
                      $old_ids = get_user_meta($user_id, 'pixpine_favorite_premium', true);
                      $old_ids = explode(',', $old_ids);
                      // Define the query arguments
                      $args = array(
                        // 'post_type'      => 'product', // Replace with your CPT slug
                        'post__in'       => $old_ids, // Include posts with these IDs
                        'post_status'    => 'publish', // Limit to published posts
                        'posts_per_page' => -1, // Retrieve all matching posts
                      );

                      // Create a new WP_Query instance
                      $custom_query = new WP_Query($args);
                      // Check if there are posts
                      if ($custom_query->have_posts()) {
                        while ($custom_query->have_posts()) {
                          $custom_query->the_post();
                          // Access post data here
                          $post_title = get_the_title();
                          $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
                      ?>
                      <div type="button" class="card_item" >
                        <a href="<?php echo get_the_permalink();?>">
                        <div class="item_a">
                          <div class="inner_col">
                            <div class="img_col pixpine_card_border">
                              <img src="<?php echo $thumbnail_url;?>" alt="" />
                            </div>
                            <div class="text_col">
                              <h4 class="default_color">
                                <?php echo $post_title;?>
                              </h4>
                              <p class="primary_color">Premium</p>
                            </div>
                          </div>
                        </div>
                        </a>
                      </div>
                      <?php
                        }
                        // Restore the global post data
                        wp_reset_postdata();
                      }else{
                        echo '<div class="card_item"><div class="inner_col">No liked product</div></div>';
                      }
                      ?>
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
                    <div class="card_container row_d">
                    <?php
                      $user_id = get_current_user_id();
                      $old_ids = get_user_meta($user_id, 'pixpine_favorite_bundle', true);
                      $old_ids = explode(',', $old_ids);
                      // Define the query arguments
                      $args = array(
                        // 'post_type'      => 'product', // Replace with your CPT slug
                        'post__in'       => $old_ids, // Include posts with these IDs
                        'post_status'    => 'publish', // Limit to published posts
                        'posts_per_page' => -1, // Retrieve all matching posts
                      );

                      // Create a new WP_Query instance
                      $custom_query = new WP_Query($args);
                      // Check if there are posts
                      if ($custom_query->have_posts()) {
                        while ($custom_query->have_posts()) {
                          $custom_query->the_post();
                          // Access post data here
                          $post_title = get_the_title();
                          $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
                      ?>
                      <div class="card_item">
                        <div
                          type="button"
                        >
                          <a href="<?php echo get_the_permalink();?>">
                            <div class="inner_col">
                              <div class="img_col pixpine_card_border">
                                <img src="<?php echo $thumbnail_url;?>" alt="" />
                              </div>
                              <div class="text_col">
                                <h4 class="default_color">
                                  <?php echo $post_title;?>
                                </h4>
                                <p class="primary_color">Bundle</p>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <?php
                        }
                        // Restore the global post data
                        wp_reset_postdata();
                      }else{
                        echo '<div class="card_item"><div class="inner_col">No liked product</div></div>';
                      }
                      ?>
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

<!-- Footer -->
<?php get_footer();?>
