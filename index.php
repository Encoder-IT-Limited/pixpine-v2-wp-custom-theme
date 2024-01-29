<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pixpine</title>
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri();?>/assets/images/favicon.ico" />

    <?php wp_head();?>
  </head>
  <body>
    <!-- Home page header is different and all other pages have different headers -->
    <div class="home">
      <header>
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid container">
            <a class="navbar-brand" href="<?php echo site_url();?>">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/home_logo.png" alt="" />
            </a>
            <div id="mobile_cart_btn">
              <ul class="d-flex align-items-center">
                <li class="nav-item">
                  <a class="nav-link cart_icon" href="<?php echo site_url('cart');?>">
                    <img
                      class="cart_img"
                      src="<?php echo get_template_directory_uri();?>/assets/images/home_cart_icon.png"
                      alt=""
                    />
                  </a>
                </li>
                <li class="nav-item dropdown">
                <?php if(is_user_logged_in()){ ?> 
                  <a
                      class="nav-link user_icon"
                      type="button" data-bs-toggle="dropdown" aria-expanded="false" href="#"
                    >
                      <?php 
                      $profile_image_id = get_user_meta(get_current_user_id(), 'profile_image_id', true);
                      if(!empty($profile_image_id)){
                        $class_name = 'user_img_custom';
                        $menu_user_img = wp_get_attachment_url($profile_image_id);
                      }else{
                        $class_name = 'user_img';
                        $menu_user_img = get_template_directory_uri()."/assets/images/user_icon-white.png";
                      }
                      ?>
                      <img class="<?php echo $class_name;?>" src="<?php echo $menu_user_img;?>" alt="" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?php echo site_url('my-account');?>">Profile</a></li>
                        <li><a class="dropdown-item" href="<?php echo wp_logout_url(home_url()); ?>">Log out</a></li>
                    </ul>
                <?php }else{ ?> 
                  <a type="button" data-bs-toggle="modal" data-bs-target="#signupModal" class="nav-link">
                    Sign up
                  </a>
                <?php } ?> 
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
                  <a class="nav-link" href="<?php echo site_url('premium-mockups');?>"
                    >Premium Mockups</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('bundle-mockups');?>">Bundle Mockups</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('customized-mockup-request');?>"
                    >Customise Mockups</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('about-us');?>"
                    >About</a
                  >
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
                  <?php if(!is_user_logged_in()){ ?> 
                  <li class="nav-item">
                    <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">
                      Log in
                    </a>
                  </li>
                  <?php } ?> 
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
                      <img
                        class="cart_img"
                        src="<?php echo get_template_directory_uri();?>/assets/images/home_cart_icon.png"
                        alt=""
                      />
                    </a>
                  </li>
                  <?php if(is_user_logged_in()){ ?> 
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link user_icon"
                      type="button" data-bs-toggle="dropdown" aria-expanded="false" href="#"
                    >
                      <?php 
                      $profile_image_id = get_user_meta(get_current_user_id(), 'profile_image_id', true);
                      if(!empty($profile_image_id)){
                        $class_name = 'user_img_custom';
                        $menu_user_img = wp_get_attachment_url($profile_image_id);
                      }else{
                        $class_name = 'user_img';
                        $menu_user_img = get_template_directory_uri()."/assets/images/user_icon-white.png";
                      }
                      ?>
                      <img class="<?php echo $class_name;?>" src="<?php echo $menu_user_img;?>" alt="" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="<?php echo site_url('my-account');?>">Profile</a></li>
                        <li><a class="dropdown-item" href="<?php echo wp_logout_url(home_url()); ?>">Log out</a></li>
                    </ul>
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
    </div>

    <main>
      <section class="home banner_section">
        <div class="container">
          <div class="heading_col text-center">
            <h1 class="page_heading">
              Visualize your design with our Premium PSD Mockups
            </h1>
            <p class="sub_heading">
              A growing online market for Photoshop Templates at an unbelievable
              price
            </p>
          </div>

          <!-- Banner search form -->
          <?php include 'includes/search-form.php';?>

          <div class="trending_col">
            <p>Explore Trending Products on Pixpine.com</p>
            <div class="trending_item_container">
              <?php
              $home_cats = get_option('home_cat');
              $pixpine_home_cat = explode(',', $home_cats);
              foreach($pixpine_home_cat as $term_id){
                $image_id = get_term_meta($term_id, '_custom_product_gallery', true);
                $image_url = wp_get_attachment_image_src($image_id, 'full')[0];
                $term = get_term($term_id);
              ?>
                <div class="trending_item">
                  <a href="<?php echo site_url().'?cat=all-categories&type=category&term-name='.$term->name.'&hide=free&s=';?>" >
                    <div class="img_col">
                      <img src="<?php echo $image_url;?>" alt="" />
                    </div>
                    <span><?php echo $term->name;?></span>
                  </a>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </section>
      <section class="get_mockup_section">
        <div class="container">
          <div class="get_mockup text-center">
            <h6>Get 96% off, as low as $0.14 a mockup</h6>
            <a class="btn_black _btn btn_black_small" href="<?php echo site_url('get-subscription');?>"
              >Get Premium</a
            >
          </div>
        </div>
      </section>
      <section class="explore_creative_section">
        <div class="container">
          <div class="heading_col">
            <h2
              class="section_heading section_heading_bold section_heading_primary"
            >
              Explore your creative side
            </h2>
            <p class="sub_heading">
              with these carefully crafted mockups that stand out your work like a pro.
            </p>
          </div>
          <div class="card_container">
            <?php
              for($i=1; $i<=8; $i++){
                $p_id = get_option('home_special_product_'.$i.'_product_id', 'No product selected');
                if($p_id != 'No product selected'){
                  $img_url = get_option('home_special_product_'.$i.'_image_url', '');
              ?>
                <div class="card_item">
                  <a href="<?php echo get_the_permalink($p_id);?>" >
                    <div class="inner_col pixpine_card_border">
                      <img src="<?php echo $img_url;?>" alt="" />
                    </div>
                  </a>
                </div>
              <?php
                }
              }
            ?>



          </div>
        </div>
      </section>
      <section class="get_premium_mockups_section">
        <div class="container">
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
              <p class="sub_heading">
                With a yearly subscription, you can get each mockup for only
                <span class="primary_color"
                  >$0.14 with unlimited downloads.</span
                >
              </p>
              <a href="<?php echo site_url('get-subscription');?>" class="btn_primary _btn"
                >Get premium</a
              >
            </div>
            <div class="premium_img">
              <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
            </div>
          </div>
        </div>
      </section>
      <section id="premium_mockups" class="recently_added_premium_mockups">
        <div class="container">
          <div class="heading_col text-center">
            <h2 class="section_heading">Recently Added Premium Mockups</h2>
          </div>
          <div class="tab_img_container">
            <?php 
            $parent_category_slug = 'premium-mockups';
            $js_class = 'get-product-home-premium';
            echo show_sub_cats_in_listing_page($parent_category_slug, $js_class); 
            ?>
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
                    // 'post_type' => 'product', // Replace with the name of your CPT
                    'posts_per_page' => 10, // Number of posts to display (adjust as needed)
                    'orderby'=>'ID',
                    'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
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
                      $_custom_product_gallery = get_post_meta(get_the_ID(), '_custom_product_gallery', true);
                      $_custom_product_gallery = !empty($_custom_product_gallery) ? explode(',', $_custom_product_gallery) : array();
                      $thumbnail_url2 = wp_get_attachment_image_url( $_custom_product_gallery[0],'full');
                    ?>

                    <!-- <div type="button" data-bs-toggle="modal" data-bs-target="#premiumModal" class="card_item" > -->
                      <div type="button" class="card_item premium-mockup-single" p-id="<?php echo get_the_ID();?>">
                        <div class="item_a">
                          <div class="inner_col">
                              <a href="<?php echo get_the_permalink();?>">
                                <div class="img_col pixpine_card_border">
                                  <img src="<?php echo $thumbnail_url;?>" 
                                  img1="<?php echo $thumbnail_url;?>" 
                                  img2="<?php echo $thumbnail_url2;?>" 
                                  class="premium-img-hover-effect"
                                  alt="" />
                                </div>
                              <div class="text_col">
                                  <h4 class="default_color">
                                    <?php echo get_the_title();?>
                                  </h4>
                                </a>
                                <a href="<?php echo site_url('premium-mockups');?>">
                                  <p class="primary_color">
                                    Premium
                                  </p>
                                </a>
                              </div>
                            </div>
                          </div>
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
                  <div class="text-end">
                    <a class="btn_primary _btn" href="<?php echo site_url('premium-mockups');?>">
                    View All
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="free_mockups" class="recently_added_free_mockups">
        <div class="container">
          <div class="heading_col text-center">
            <h2 class="section_heading">Recently Added Free Mockups</h2>
          </div>
          <div class="tab_img_container">

            <?php 
            $parent_category_slug = 'free-mockups';
            $js_class = 'get-product-home-free';
            echo show_sub_cats_in_listing_page($parent_category_slug, $js_class); 
            ?>
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
                    // 'post_type' => 'product', // Replace with the name of your CPT
                    'posts_per_page' => 12, // Number of posts to display (adjust as needed)
                    'orderby'=>'ID',
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
                    while ($custom_query->have_posts()) {
                      $custom_query->the_post();
                      $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
                      // $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                    ?>
                    <div class="card_item">
                      <a href="<?php echo get_the_permalink();?>">
                        <div class="inner_col">
                          <div class="img_col pixpine_card_border">
                            <img src="<?php echo $thumbnail_url;?>" alt="" />
                          </div>
                          <div class="text_col">
                            <h4 class="default_color"><?php echo get_the_title();?></h4>
                          </a>
                            <a href="<?php echo site_url('free-mockups');?>">
                            <p class="primary_color">Free</p>
                            </a>
                          </div>
                        </div>
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
                  <div class="text-end">
                    <a class="btn_primary _btn" href="<?php echo site_url('free-mockups');?>">View All</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="bundle_mockups" class="bundle_mockups_yearly_subscription">
        <div class="container">
          <div class="top__heading__col">
            <div class="get_premium_mockups_section">
              <div
                class="premium_mockups_inner d-flex justify-content-between align-items-center"
              >
                <div class="premium_text">
                  <h2
                    class="section_heading section_heading_primary section_heading_bold"
                  >
                    Get 50% Off
                    <span class="section_heading_medium default_color">
                      on bundle mockups
                    </span>
                  </h2>
                  <p class="sub_heading">
                    <span class="primary_color">
                      Save big with our yearly subscription
                    </span>
                  </p>
                  <a href="<?php echo site_url('get-subscription');?>" class="btn_primary _btn"
                    >Get premium</a
                  >
                </div>
                <div class="premium_img">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/premium_img.png" alt="" />
                </div>
              </div>
            </div>
          </div>
          <div class="inner_content">
            <div
              class="card_container row_d justify-content-center align-items-stretch"
            >

              <?php
              $args = array(
                // 'post_type' => 'product', // Replace with the name of your CPT
                'posts_per_page' => 10, // Number of posts to display (adjust as needed)
                'orderby'=>'ID',
                'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
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
                    <a href="<?php echo get_the_permalink();?>">
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
            <div class="text-end">
              <a class="btn_primary _btn" href="<?php echo site_url('bundle-mockups');?>">View All</a>
            </div>
          </div>
        </div>
      </section>

      <!-- Never miss out form section -->
      <?php include 'includes/never-miss-out-form.php';?>

      <script>
        jQuery(document).ready(function(){
          localStorage.setItem('redirect_url', window.location.href);
        })
      </script>
    </main>
    <!-- Footer -->
    <?php include 'includes/footer.php';?>
