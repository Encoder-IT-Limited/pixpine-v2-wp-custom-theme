<?php
/*
Template Name: User Dashboard Downloads
*/
get_header();
global $wpdb;
$user_id = get_current_user_id();
// order payment detail
$table_name = $wpdb->prefix . 'pixpine_orders';
$order_id = $wpdb->get_col("SELECT id FROM $table_name WHERE user_id = '$user_id'");
$order_id = implode(',', $order_id);
$table_name = $wpdb->prefix . 'pixpine_order_items';
$product_ids = $wpdb->get_results("SELECT * FROM $table_name WHERE pixpine_order_id IN ($order_id)", ARRAY_A);

$active_tab = 1;
if(isset($_GET['type'])){
  if($_GET['type'] == 'new-purchase'){
    $active_tab = 2;
  }
}
?>

<main>
  <section class="banner_section">
    <div class="container">
      <!-- Banner search form -->
      <?php include get_template_directory() . '/includes/search-form.php'; ?>
    </div>
  </section>
  <section class="dashboard_section dashboard__downloads">
    <div class="container">
      <div class="section_width">
        <?php
          if($active_tab == 2){
            echo '
            <div class="alert alert-success" role="alert">
            Your purchase is successful. Thanks!!
            </div>
            ';
          }
        ?>
        <div class="dashboard_main d-flex">
          <div class="dashboard_navbar">
            <!-- Dashboard inner menu -->
            <?php $currentPage = 'dashboard__downloads';
            include get_template_directory() . '/includes/dashboard-menu.php'; ?>
          </div>
          <div class="content__column">
            <div class="tab__container__main">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link <?php echo ($active_tab==1)?'active':'';?>" id="subscription_tab" data-bs-toggle="tab"
                    data-bs-target="#subscription" type="button" role="tab" aria-controls="subscription"
                    aria-selected="true">
                    Subscription
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link <?php echo ($active_tab==2)?'active':'';?>" id="premium_mockup_tab" data-bs-toggle="tab" data-bs-target="#premium_mockup"
                    type="button" role="tab" aria-controls="premium_mockup" aria-selected="false" tabindex="-1">
                    Premium/Bundle Mockup
                  </button>
                </li>
                <!-- <li class="nav-item" role="presentation">
                  <button class="nav-link" id="bundle_mockups_tab" data-bs-toggle="tab" data-bs-target="#bundle_mockups"
                    type="button" role="tab" aria-controls="bundle_mockups" aria-selected="false" tabindex="-1">
                    Bundle Mockups
                  </button>
                </li> -->
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade <?php echo ($active_tab==1)?'show active':'';?>" id="subscription" role="tabpanel"
                  aria-labelledby="subscription_tab">
                  <div class="tab_inner_content">
                    <ul>
                      <?php
                          $active_subscription = $wpdb->get_var("SELECT subscripton_plan FROM " . $wpdb->prefix . "pixpine_subscriptions WHERE user_id='" . $user_id . "' AND status='Active'");
    
                          if ($active_subscription != null) {
                          $results = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "pixpine_subscription_downloaded_items WHERE user_id='$user_id' ", ARRAY_A);
                          if (!empty($results)) {
                              foreach ($results as $sitem) {
                        ?>
                          <li>
                            <p>
                              <a href="<?=get_post_meta($sitem['product_id'], 'download_link', true)?>">
                                <?=get_the_title($sitem['product_id'])?> (ID: <?=$sitem['product_id']?>)
                              </a>
                            </p>
                          </li>
                      <?php 
                            }
                        }else{ ?>
                          <li>
                            <p>
                              No mockup downloaded through subscription.
                            </p>
                          </li>
                      <?php }}else{ ?>
                        <li>
                            <p>
                              You are not subscribed.
                            </p>
                          </li>
                      <?php } ?>

                    </ul>
                  </div>
                </div>
                <div class="tab-pane fade  <?php echo ($active_tab==2)?'show active':'';?>" id="premium_mockup" role="tabpanel" aria-labelledby="premium_mockup_tab">
                  <div class="tab_inner_content">
                    <?php
                    if (!empty($product_ids)) {
                      foreach ($product_ids as $sitem) {
                    ?>
                      <li>
                        <p>
                          <a href="<?=get_post_meta($sitem['product_id'], 'download_link', true)?>">
                            <?=get_the_title($sitem['product_id'])?> (ID: <?=$sitem['product_id']?>)
                          </a>
                        </p>
                      </li>
                    <?php  }
                    }else{ ?>
                      <li>
                        <p>
                          No mockup downloaded through subscription.
                        </p>
                      </li>
                    <?php } ?>
                  </div>
                </div>
                <!-- <div class="tab-pane fade" id="bundle_mockups" role="tabpanel" aria-labelledby="bundle_mockups_tab">
                  <div class="tab_inner_content">
                    <?php
                    $args = array(
                      // 'post_type' => 'product',  // Replace 'your_custom_post_type' with your actual CPT slug
                      'post__in' => $product_ids,
                      'orderby' => 'post__in',  // Preserve the order of the IDs in the post__in array
                    );

                    $query = new WP_Query($args);
                    if ($query->have_posts()):
                      while ($query->have_posts()):
                        $query->the_post();
                        $flag = false;
                        $categories = get_the_terms(get_the_ID(), 'mockup_category');
                        foreach ($categories as $category) {
                          if($category->term_id == $bundle_cat_id){
                            $flag = true;
                          }
                        }
                        if($flag){
                          echo '
                            <li>
                              <p>
                                <a href="' . get_post_meta(get_the_ID(), 'download_link', true) . '">
                                ' . get_the_title() . ' (ID: '.get_the_ID().')
                                </a>
                              </p>
                            </li>
                          ';
                        }
                      endwhile;

                      wp_reset_postdata();  // Reset the post data to the main query
                    else:
                      // No posts found
                      echo '<h6>No data found.</h6>';
                    endif;
                    ?>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- Footer -->
<?php get_footer(); ?>