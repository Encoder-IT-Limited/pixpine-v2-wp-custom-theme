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
$cat = (isset($_GET['cat'])) ? $_GET['cat'] : 'all-categories';
$type = (isset($_GET['type'])) ? $_GET['type'] : 'search';
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$current_link = (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if($type == 'search'){
  $current_link_without_page_no = explode('?', $current_link)[0].'?type='.$type.'&cat='.$cat.'&s='.$search_keyword.'&page=';
}elseif($type == 'category'){
  $term_name = $_GET['term-name'];
  $current_link_without_page_no = explode('?', $current_link)[0].'?type='.$type.'&cat='.$cat.'&s=&term-name='.$term_name.'&page=';
}elseif($type == 'tag'){
  $tag_name = $_GET['tag-name'];
  $current_link_without_page_no = explode('?', $current_link)[0].'?type='.$type.'&cat='.$cat.'&s=&tag-name='.$tag_name.'&page=';
}

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
      if($cat == 'all-categories' || $cat == 'premium-mockup'){
        $post_per_page = 15;
      ?>
        <section id="premium_mockups" class="recently_added_premium_mockups">
          <div class="container">
            <div class="heading_col text-center">
              <h2 class="section_heading">Premium Mockups</h2>
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
                    if($type == 'search'){
                      $args = array(
                        // 'post_type' => 'product', // Replace with the name of your CPT
                        'posts_per_page' => $post_per_page, // Number of posts to display (adjust as needed)
                        'paged' => $page,
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
                    }elseif($type == 'category'){
                      $term_name = $_GET['term-name'];
                      $args = array(
                        // 'post_type' => 'product', // Replace with the name of your CPT
                        'posts_per_page' => $post_per_page, // Number of posts to display (adjust as needed)
                        'paged' => $page,
                        'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
                        'tax_query' => array(
                          'relation' => 'AND',
                          array(
                            'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                            'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                            'terms' => 'premium-mockups', // Replace with the slug of the custom category term you want to query
                          ),
                          array(
                              'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                              'field' => 'name', // You can use 'term_id', 'name', or 'slug'
                              'terms' => $term_name, // Replace with the name of the custom category term you want to query
                          ),
                        ),
                      );     
                    }elseif($type == 'tag'){
                      $tag = $_GET['tag-name'];
                      $args = array(
                        // 'post_type' => 'product', // Replace with the name of your CPT
                        'posts_per_page' => $post_per_page, // Number of posts to display (adjust as needed)
                        'paged' => $page,
                        'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
                        'tax_query' => array(
                          'relation' => 'AND',
                          array(
                            'taxonomy' => 'post_tag', // The built-in 'post_tag' taxonomy for tags
                            'field' => 'name', // You can use 'name' or 'slug' as needed
                            'terms' => $tag, // Replace with the tag name
                          ),
                          array(
                              'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                              'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                              'terms' => 'premium-mockups', // Replace with the slug of the custom category term you want to query
                          ),
                        ),
                      );  
                    }


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
                    <div class="text-end">
                      <?php 
                      if($cat == 'all-categories'){
                      ?>
                        <a class="btn_primary _btn" href="<?php echo str_replace("all-categories","premium-mockup",$current_link);?>">View All</a>
                      <?php
                      }else{
                        $current_page = $page;
                        $total_page = $custom_query->max_num_pages;
                        if($total_page > 1){
                          show_pagination_search_page($current_page, $total_page, $current_link_without_page_no);
                        } 
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php
      }
      if($cat == 'all-categories' || $cat == 'free-mockup'){
        $post_per_page = 12;
      ?>            
        <section id="free_mockups" class="recently_added_free_mockups">
          <div class="container">
            <div class="heading_col text-center">
              <h2 class="section_heading">Free Mockups</h2>
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
                    if($type == 'search'){
                      $args = array(
                        // 'post_type' => 'product', // Replace with the name of your CPT
                        'posts_per_page' => $post_per_page, // Number of posts to display (adjust as needed)
                        'paged' => $page,
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
                    }elseif($type == 'category'){
                      $term_name = $_GET['term-name'];
                      $args = array(
                        // 'post_type' => 'product', // Replace with the name of your CPT
                        'posts_per_page' => $post_per_page, // Number of posts to display (adjust as needed)
                        'paged' => $page,
                        'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
                        'tax_query' => array(
                          'relation' => 'AND',
                          array(
                            'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                            'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                            'terms' => 'free-mockups', // Replace with the slug of the custom category term you want to query
                          ),
                          array(
                              'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                              'field' => 'name', // You can use 'term_id', 'name', or 'slug'
                              'terms' => $term_name, // Replace with the name of the custom category term you want to query
                          ),
                        ),
                      );     
                    }elseif($type == 'tag'){
                      $tag = $_GET['tag-name'];
                      $args = array(
                        // 'post_type' => 'product', // Replace with the name of your CPT
                        'posts_per_page' => $post_per_page, // Number of posts to display (adjust as needed)
                        'paged' => $page,
                        'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
                        'tax_query' => array(
                          'relation' => 'AND',
                          array(
                              'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                              'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                              'terms' => 'free-mockups', // Replace with the slug of the custom category term you want to query
                          ),
                          array(
                            'taxonomy' => 'post_tag', // The built-in 'post_tag' taxonomy for tags
                            'field' => 'name', // You can use 'name' or 'slug' as needed
                            'terms' => $tag, // Replace with the tag name
                          ),
                        ),
                      );  
                    }

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

                    <div class="text-end">
                      <?php 
                      if($cat == 'all-categories'){
                      ?>
                        <a class="btn_primary _btn" href="<?php echo str_replace("all-categories","free-mockup",$current_link);?>">View All</a>
                      <?php
                      }else{
                        $current_page = $page;
                        $total_page = $custom_query->max_num_pages;
                        if($total_page > 1){
                          show_pagination_search_page($current_page, $total_page, $current_link_without_page_no);
                        } 
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php
      }
      if($cat == 'all-categories' || $cat == 'bundle-mockup'){
        $post_per_page = 10;
      ?>    
        <section id="bundle_mockups" class="bundle_mockups_yearly_subscription recently_added_free_mockups ">
          <div class="container">
            <div class="heading_col text-center">
              <h2 class="section_heading">Bundle Mockups</h2>
            </div>
            <div class="inner_content">
              <div
                class="card_container row_d justify-content-center align-items-stretch"
              >

                <?php
                if($type == 'search'){
                  $args = array(
                    // 'post_type' => 'product', // Replace with the name of your CPT
                    'posts_per_page' => $post_per_page, // Number of posts to display (adjust as needed)
                    'paged' => $page,
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
                }elseif($type == 'category'){
                  $term_name = $_GET['term-name'];
                  $args = array(
                    // 'post_type' => 'product', // Replace with the name of your CPT
                    'posts_per_page' => $post_per_page, // Number of posts to display (adjust as needed)
                    'paged' => $page,
                    'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
                    'tax_query' => array(
                      'relation' => 'AND',
                      array(
                        'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                        'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                        'terms' => 'bundle-mockups', // Replace with the slug of the custom category term you want to query
                      ),
                      array(
                          'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                          'field' => 'name', // You can use 'term_id', 'name', or 'slug'
                          'terms' => $term_name, // Replace with the name of the custom category term you want to query
                      ),
                    ),
                  );     
                }elseif($type == 'tag'){
                  $tag = $_GET['tag-name'];
                  $args = array(
                    // 'post_type' => 'product', // Replace with the name of your CPT
                    'posts_per_page' => $post_per_page, // Number of posts to display (adjust as needed)
                    'paged' => $page,
                    'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
                    'tax_query' => array(
                      'relation' => 'AND',
                      array(
                        'taxonomy' => 'post_tag', // The built-in 'post_tag' taxonomy for tags
                        'field' => 'name', // You can use 'name' or 'slug' as needed
                        'terms' => $tag, // Replace with the tag name
                      ),
                      array(
                          'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                          'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                          'terms' => 'bundle-mockups', // Replace with the slug of the custom category term you want to query
                      ),
                    ),
                  );  
                }

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

              <div class="text-end">
                <?php 
                if($cat == 'all-categories'){
                ?>
                  <a class="btn_primary _btn" href="<?php echo str_replace("all-categories","bundle-mockup",$current_link);?>">View All</a>
                <?php
                }else{
                  $current_page = $page;
                  $total_page = $custom_query->max_num_pages;
                  if($total_page > 1){
                    show_pagination_search_page($current_page, $total_page, $current_link_without_page_no);
                  } 
                }
                ?>
              </div>
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
